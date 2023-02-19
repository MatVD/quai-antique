<?php

namespace App\Controller;

use App\Entity\Tables;
use App\Repository\TablesRepository;
use App\Repository\TablesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookTableController extends AbstractController
{
    #[Route('/reservation', name: 'app_book_table', methods: ['GET', 'POST'])]
    public function index(TablesRepository $tablesRepository, ManagerRegistry $doctrine, Request $request): Response
    {

        // Récupération en bbd de la 1ère table libre
        $table = $tablesRepository->findOneBy(['free' => 1]);

        if (!$table) {
            throw $this->createNotFoundException(
                'Il n\'y a plus de table de libre. Veuillez s\'il vous plait réessayer d\'ici quelques minutes'
            );
        }

        // Création du form sur la base de cette table libre
        $form = $this->createForm(TablesType::class, $table);
        $form->handleRequest($request);

        // Récupération des données du form pour les inclure en bbd
        if ($form->isSubmitted() && $form->isValid() ) {
            $table = $form->getData();
            $doctrine->getManager()->persist($table);
            $doctrine->getManager()->flush();

            // TO DO: return $this->redirectToRoute('success')
        }

        return $this->render('book_table/index.html.twig', [
            'table' => $table,
            'form' => $form->createView()
        ]);

    }


    // API permettant la récupération en asynchrone du nombre de table libre
    // le fichier fetchNbFreeTables.js fait un fetch sur cette route
    #[Route('/freeTableCount')]
    public function getFreeTableId(TablesRepository $tablesRepository): JsonResponse
    {
        // Récupération async du nombre de tables et de couvrets de libres
        $tablesFree = $tablesRepository->findAllTableFree(1);
        $nbTableFree = count($tablesFree);

        return $this->json(["TablesFree" => $nbTableFree]);
    }
}
