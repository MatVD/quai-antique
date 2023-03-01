<?php

namespace App\Controller\Admin;

use App\Entity\Dishes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dishes::class;
    }
    public function configureCrud(Crud $crud): Crud
    {

        return $crud
            ->setEntityLabelInPlural('Plats')
            ->setEntityLabelInSingular('Plat');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm()
            ,
            AssociationField::new('admin', 'Nom de l\'admin'),
            AssociationField::new('category', 'Categorie'),
            TextField::new('title', 'Titre'),
            TextareaField::new('description', 'Description'),
            NumberField::new('price', 'Prix')->setNumDecimals('2'),
        ];

    }

}
