<?php

namespace App\Controller\Admin;

use App\Entity\Menus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;



use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menus::class;
    }

    public function configureCrud(Crud $crud): Crud
    {

        return $crud
            ->setEntityLabelInPlural('Menus')
            ->setEntityLabelInSingular('Menu');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),
            AssociationField::new('admin', 'Nom de l\'admin'),
            TextField::new('title', 'Titre'),
            TextareaField::new('description', 'Description'),
            NumberField::new('price', 'Prix')->setNumDecimals('2'),
        ];
    }

}
