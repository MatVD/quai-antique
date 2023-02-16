<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\DishRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuCardController extends AbstractController
{
    #[Route('/carte', name: 'app_menu_card')]
    public function index(MenuRepository $menuRepository, DishRepository $dishRepository): Response
    {

        $dishes = $dishRepository->findAll();


        return $this->render('menu_card/index.html.twig', [
            'dishes' => $dishes
        ]);
    }
}
