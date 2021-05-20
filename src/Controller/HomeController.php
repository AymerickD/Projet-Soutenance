<?php

namespace App\Controller;

use App\Entity\Artwork;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route ("/", name="home")
     */
    public function home(): Response
    {
        $artworks = $this->getDoctrine()->getRepository(Artwork::class)->findAll();

        return $this->render("home.html.twig", [
            'artworks' => $artworks
        ]);
    }
}