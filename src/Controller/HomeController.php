<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ImageRepository $imageRepository, SchedulesRepository $schedulesRepository): Response
    {
        $images = $imageRepository->findAll();

        $schedules = $schedulesRepository->findAll();

        $imageBanner = $imageRepository->findOneBySomeField('imageBanner');

        return $this->render('home/index.html.twig', [
            'images' => $images,
            'imageBanner' => $imageBanner,
            'schedules' => $schedules
        ]);
    }
}
