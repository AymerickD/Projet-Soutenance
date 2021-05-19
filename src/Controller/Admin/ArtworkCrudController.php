<?php

namespace App\Controller\Admin;

use App\Entity\Artwork;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use phpDocumentor\Reflection\Types\Integer;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArtworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Artwork::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextField::new('description'),
            VichImageField::new('imageFile')->onlyOnForms(),
            VichImageField::new('imageName')->hideOnForm(),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            BooleanField::new('is_sold', 'Vendu ?'),
            IntegerField::new('view_count', 'Nombre de vues'),
            ArrayField::new('tags'),
            AssociationField::new('gallery')
        ];
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
