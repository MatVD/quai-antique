<?php

namespace App\Controller\Admin;

use App\Entity\Tables;
use App\Repository\TablesRepository;
use Doctrine\Persistence\ManagerRegistry;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\HttpFoundation\Response;

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

    public function configureActions(Actions $actions): Actions
    {
        $resetTablesAction = Action::new('reset', 'Reset tables')
            ->displayAsLink()
            ->setCssClass('btn btn-warning')
            ->linkToCrudAction('resetAllTablesOnfree')
            ->createAsGlobalAction()
        ;

        return $actions
            ->add(Crud::PAGE_INDEX, $resetTablesAction)
            ;
    }

    // Fonction reset des tables pour les remmettre à zéro après le service
    public function resetAllTablesOnfree(TablesRepository $tablesRepository, ManagerRegistry $doctrine): Response
    {
        // Récupération async du nombre de tables et de couvrets de libres
        $tables = $tablesRepository->findAll();

        foreach ($tables as $table) {
            $table->setUser(null);
            $table->setSeats(0);
            $table->setAllergies("");
            $table->setDate(null);
            $table->setArrivalTime(null);
            $table->setFree(true);
            $doctrine->getManager()->persist($table);
            $doctrine->getManager()->flush();
        }

        return $this->redirectToRoute('admin');
    }
}
