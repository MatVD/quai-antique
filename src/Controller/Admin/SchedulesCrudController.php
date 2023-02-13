<?php

namespace App\Controller\Admin;

use App\Entity\Schedules;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class SchedulesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Schedules::class;
    }

    public function configureCrud(Crud $crud): Crud
    {

        return $crud
            ->setEntityLabelInPlural('Horaires')
            ->setEntityLabelInSingular('Horaires');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),
            TextField::new('days', 'Jour de la semaine'),
            TimeField::new('openingHours', 'Horaires d\'ouverture'),
            TimeField::new('closingHours', 'Horaires de fermeture')

        ];
    }

}
