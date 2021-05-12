<?php

namespace App\Controller\Admin;

use App\Entity\ArtworkStorage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArtworkStorageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArtworkStorage::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
