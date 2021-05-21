<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     * @Route ("/payment", name="payment")
     */
    public function index(SessionInterface $session, ArtworkRepository $artworkRepository)
    {
        $panier = $session->get('panier', []);

        $panierWithdata = [];

        foreach ($panier as $id => $id) {
            $panierWithdata[] =
                [
                    'artworks' => $artworkRepository->find($id),
                ];
        }

        $total = 0;

        foreach ($panierWithdata as $item) {
            $totalItem = $item['artworks']->getPrice();
            $total += $totalItem;
        }

        return $this->render("Payment/cart.html.twig", [
            'total' => $total
        ]);
    }

}
