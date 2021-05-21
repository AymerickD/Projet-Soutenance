<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{

    /**
     * @Route ("/panier", name="cart")
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

        $session_total = $session->get('total', $total);

        return $this->render("cart/index.html.twig", [
            'items' => $panierWithdata,
            'total' => $total,
        ]);

    }

    /**
     * @Route ("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session)
    {

        $panier = $session->get('panier', []);

        $panier[$id] = 1;

        $session->set('panier', $panier);

        return $this->redirectToRoute("cart");

    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("cart");
    }

}
