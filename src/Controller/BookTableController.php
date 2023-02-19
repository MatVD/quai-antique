<?php

namespace App\Controller;

use App\Entity\Tables;
use App\Repository\TablesRepository;
use App\Repository\TablesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookTableController extends AbstractController
{

    #[Route('/reservation', name: 'app_book_table', methods: ['GET', 'POST'])]
    public function index(TablesRepository $tablesRepository): Response
    {
        $table = new Tables();
        $form = $this->createForm(TablesType::class, $table);


        return $this->render('book_table/index.html.twig', [
            'controller_name' => 'BookTableController',
            'table' => $table,
            'form' => $form->createView()
        ]);

    }

    #[Route('/freeTableCount')]
    public function getFreeTableId(TablesRepository $tablesRepository): JsonResponse
    {
        // Récupération du nombre de tables et de couvrets de libres
        $tablesFree = $tablesRepository->findAllTableFree(1);
        $nbTableFree = count($tablesFree);

        return $this->json(["TablesFree" => $nbTableFree]);
    }
}
