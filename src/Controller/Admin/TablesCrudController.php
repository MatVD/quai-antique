<?php

namespace App\Controller\Admin;

use App\Entity\Tables;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class TablesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tables::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'Numéro de la Table')
                ->setDisabled(),
            AssociationField::new('user', 'Nom de la personne'),
            NumberField::new('seats', 'Nombre de personnes'),
            BooleanField::new('free', 'Table libre ?'),
            DateField::new('date', 'Date'),
            TimeField::new('arrival_time'),
        ];
    }

}
