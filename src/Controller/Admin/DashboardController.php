<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Dish;
use App\Entity\Image;
use App\Entity\Menu;
use App\Entity\Schedules;
use App\Entity\Tables;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/AdMiN_58C', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig', [
            'user' => $this->getUser()
        ]);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Quai Antique - Admin')
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('--------');
        yield MenuItem::linkToCrud('Menus', 'fa-solid fa-book-open', Menu::class);
        yield MenuItem::linkToCrud('Plats', 'fa-solid fa-bowl-rice', Dish::class);
        yield MenuItem::linkToCrud('Catégories', 'fa-solid fa-list-ul', Categories::class);
        yield MenuItem::linkToCrud('Horaires', 'fa-solid fa-calendar-days', Schedules::class);
        yield MenuItem::linkToCrud('Images', 'fa-regular fa-image', Image::class);
        yield MenuItem::linkToCrud('Tables','fa-solid fa-utensils',Tables::class);
        yield MenuItem::section('--------');
        yield MenuItem::linkToRoute('Accueil du site', 'fa-solid fa-eye', 'app_home');
    }
}
