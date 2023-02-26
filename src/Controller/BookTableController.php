<?php

namespace App\Controller;

use App\Entity\Schedules;
use App\Repository\SchedulesRepository;
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

    // API permettant la récupération en asynchrone du nombre de table libre
    // le fichier fetchNbFreeTables.js fait un fetch sur cette route
    #[Route('/freeTableCount', methods: ['GET'])]
    public function getFreeTablesCount(TablesRepository $tablesRepository): JsonResponse
    {
        // Récupération async du nombre de tables et de couvrets de libres
        $tablesFree = $tablesRepository->findAllTablesFree(1);
        $nbTableFree = count($tablesFree);

        return $this->json(["TablesFree" => $nbTableFree]);
    }


    #[Route('/reservation', name: 'app_book_table', methods: ['GET', 'POST'])]
    public function bookTable(TablesRepository $tablesRepository, ManagerRegistry $doctrine, Request $request): Response
    {
        // Récupération en bbd de la 1ère table libre
        $table = $tablesRepository->findOneBy(['free' => 1]);

        // Création du form sur la base de la 1ère table de libre en bdd
        $form = $this->createForm(TablesType::class, $table);
        $form->handleRequest($request);

        // Message si pas de table libre
        if (!$table) {
            $this->addFlash('warning',
                'Il n\'y a plus de table de libre. Veuillez s\'il vous plait réessayer d\'ici quelques minutes'
            );
        }

        // Si réservation 1h avant la fin du service
        if ((date('H:i:s') >= "12:00:00" && date('H:i:s') <= "15:00:00")
            || (date('H:i:s') >= "21:00:00" && date('H:i:s') <= "22:59:59")) {

            // Non acceptation des réservations 1h avant fin du service
            $this->addFlash('warning',
                'Nous sommes désolés ! Nous n\'acceptons plus de réservation après 13h00 le midi et après 22h00 le soir'
            );
        } else {

            // Récupération des données du form pour les inclure en bbd
            if ($form->isSubmitted() && $form->isValid() ) {
                $table->setFree(false);
                $table = $form->getData();
                $doctrine->getManager()->persist($table);
                $doctrine->getManager()->flush();

                $this->addFlash('notice',
                    'Votre réservation a bien été prise en compte'
                );

                return $this->redirectToRoute('app_book_table');
            }
        }

        return $this->render('book_table/index.html.twig', [
            'table' => $table,
            'form' => $form->createView()
        ]);

    }


}
