<?php

namespace App\Controller\Admin;

use App\Entity\Tables;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
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
            IdField::new('id', 'Table n°')->setDisabled(true),
            TextField::new('user', 'Réservation au nom de :')->setRequired(false),
            NumberField::new('seats', 'Nombre de personnes')->setRequired(false),
            Field::new('allergies', 'Allergies')->setRequired(false),
            BooleanField::new('free', 'Table libre ?')->setRequired(false),
            DateField::new('date', 'Date')->setRequired(false),
            TimeField::new('arrival_time')->setRequired(false),
        ];
    }

}
