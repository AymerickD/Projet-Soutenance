<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route ("/", name="home")
     */
    public function home(): Response
    {
        $artworks = $this->getDoctrine()->getRepository(Artwork::class)->findAll();
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render("home.html.twig", [
            'artworks' => $artworks,
            'users' => $users
        ]);
    }


    /**
     * @Route ("/show/artwork/{artwork_id}", name="show_artwork")
     */
    public function showArtwork (int $artwork_id)
    {
        $artwork =  $this->getDoctrine()->getRepository(Artwork::class)->find($artwork_id);

        return $this->render('show_artwork.html.twig', [
            'artwork' => $artwork
        ]);
    }


    /**
     * @Route ("/follow/{user_id}", name="addFollow")
     */
    public function addFollow(int $user_id)
    {
        /**
         * @var User
         */
        $follower = $this->getUser();

        $followed = $this->getDoctrine()->getRepository(User::class)->find($user_id);

        dd($follower);
        $followed->addFollower($follower);

        return $this->redirectToRoute('home');
    }
}