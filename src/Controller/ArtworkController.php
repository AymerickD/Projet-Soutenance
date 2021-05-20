<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtworkController extends AbstractController
{
    /**
     * @Route("/", name="artwork_index")
     */
    public function index(ArtworkRepository $artworkRepository)
    {
        return $this->render('artwork/index.html.twig', [
            'artworks' => $artworkRepository->findAll(),
        ]);
    }
}
