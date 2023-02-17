<?php

namespace App\Controller;

use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FooterController extends AbstractController
{
    public function index(SchedulesRepository $schedulesRepository): Response
    {
        $schedules = $schedulesRepository->findAll();

        return $this->render('footer/_footer.html.twig', [
            'schedules' => $schedules
        ]);
    }
}
