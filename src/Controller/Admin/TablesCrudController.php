<?php

namespace App\Controller\Admin;

use App\Entity\Tables;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TablesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tables::class;
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
