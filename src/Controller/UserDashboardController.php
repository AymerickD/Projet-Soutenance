<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Entity\User;
use App\Form\Type\ArtworkType;
use App\Form\Type\UserType;
use App\Repository\ArtworkRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserDashboardController extends AbstractController
{
    /**
     * @var EntityMagerInterface
     */
    private $manager;

    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @Route("/home/userdashboard", name="user_dashboard", requirements={"id"="\d+"})
     */
    public function showDashboard(EntityManagerInterface $manager, UserRepository $userRepository)
    {
        $this->manager = $manager;
        $this->userRepository = $userRepository;

        //return $this->render('UserDashboard/dashboard.html.twig');

        return $this->render('UserDashboard/dashboard.html.twig');
    }

    /**
     * @Route("/home/createNewUser", name="create_user")
     */
    public function createUser(Request $request, UserRepository $userRepository, EntityManagerInterface $manager)
    {

        $user = new User;
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getDoctrine()->getManager();
            $this->manager->persist($user);
            $this->manager->flush();
            return $this->$user;
        }

        return $this->render('UserDashboard/create.html.twig', ['form_user' => $form->createView()]);
    }

    /**
     * @Route("/home/editprofils", name="edit_profils")
     */
    public function editProfils(Request $request, UserRepository $user, EntityManagerInterface $manager)
    {

        $userRepository = $this->getDoctrine()->getRepository(User::class);

        $user = $this->getUser();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getDoctrine()->getManager();
            $this->manager->persist($user);
            $this->manager->flush();
            return $this->$user;
        }


        return $this->render('UserDashboard/editProfils.html.twig', ['form_editProfils' => $form->createView()]);
    }

    /*public function editProfils(UserRepository $userRepository,)
    {
        $this->manager = $manager;
        $this->userRepository = $userRepository;
        //$this->getUser();
        //return $this->render('UserDashboard/dashboard.html.twig');

        return $this->render('UserDashboard/dashboard.html.twig', ['user' => $this->getUser()]);
    }*/


    /**
     * @Route("/home/addartwork", name="add_artwork")
     * 
     * @return Response
     */

    public function addArtwork(Request $request, ?File $imageFile, ArtworkRepository $artworkRepository, EntityManagerInterface $manager)
    {


        $artwork = new Artwork();
        //$imageFile = new ;
        $form = $this->createForm(ArtworkType::class, $artwork);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($artwork);
            $artwork = $this->getDoctrine()->getManager();
            $this->manager->persist($artwork);
            $this->manager->persist($imageFile);
            $this->manager->flush();
        }

        return $this->render('userdashboard/addartwork.html.twig', ['form_addArtwork' => $form->createView()]);
    }
}
