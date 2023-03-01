<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    public function configureCrud(Crud $crud): Crud
    {

        return $crud
            ->setEntityLabelInPlural('Images')
            ->setEntityLabelInSingular('Image')
            ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm(),
            AssociationField::new('admin', 'Nom de l\'admin'),
            TextField::new('title', 'Titre de l\'image'),
            TextField::new('imageFile', 'Fichier')
                ->setFormType(VichImageType::class)
                ->hideOnIndex(),
            ImageField::new('file', 'Image')
                ->setBasePath('/uploads/images')
                ->onlyOnIndex()
        ];
    }

}
