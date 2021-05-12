<?php

namespace App\Controller\Admin;

use App\Entity\Artwork;
use App\Entity\ArtworkStorage;
use App\Entity\Category;
use App\Entity\Gallery;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());

    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle("Crypt'Art");
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Users'),
            MenuItem::linkToCrud('User', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Gallery', 'fa fa-file-text', Gallery::class),
            MenuItem::linkToCrud('ArtworkStorage', 'fas fa-hdd', ArtworkStorage::class),

            MenuItem::section('Artworks'),
            MenuItem::LinkToCrud('Artwork', 'fas fa-images', Artwork::class),

            MenuItem::section('Category'),
            MenuItem::linkToCrud('Category', 'fas fa-list', Category::class)
        ];

        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
