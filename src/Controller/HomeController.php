<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ImageRepository $imageRepository): Response
    {
        $images = $imageRepository->findAll();

        $imageBanner = $imageRepository->findOneBySomeField('imageBanner');

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'images' => $images,
            'imageBanner' => $imageBanner,
        ]);
    }
}
