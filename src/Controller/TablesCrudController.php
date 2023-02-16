<?php

namespace App\Controller;

use App\Entity\Tables;
use App\Form\TablesType;
use App\Repository\TablesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reservation')]
class TablesCrudController extends AbstractController
{
    #[Route('/', name: 'app_book_table', methods: ['GET', 'POST'])]
    public function index(TablesRepository $tablesRepository, Request $request): Response
    {
        $table = new Tables();
        $form = $this->createForm(TablesType::class, $table);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tablesRepository->save($table, true);
        }

        if ($this->isCsrfTokenValid('delete'.$table->getId(), $request->request->get('_token'))) {
            $tablesRepository->remove($table, true);
        }

        return $this->render('tables_crud/index.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
