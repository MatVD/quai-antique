<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookTableController extends AbstractController
{
    #[Route('/reservation', name: 'app_book_table')]
    public function index(): Response
    {
        return $this->render('book_table/index.html.twig', [
            'controller_name' => 'BookTableController',
        ]);
    }
}
