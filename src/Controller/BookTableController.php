<?php

namespace App\Controller;

use App\Repository\TablesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookTableController extends AbstractController
{
    #[Route('/reservation', name: 'app_book_table')]
    public function index(TablesRepository $tablesRepository): Response
    {
        $tables = $tablesRepository->findAll();

        $tablesFree = $tablesRepository->findByTableFree(1);

        return $this->render('book_table/index.html.twig', [
            'controller_name' => 'BookTableController',
            'tables_libre' => $tablesFree,
        ]);
    }
}
