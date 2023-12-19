<?php

namespace App\Controller\Admin;

use App\Entity\Developer;
use App\Entity\Projects;
use App\Entity\Skills;
use App\Entity\Langages;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PortFolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Developpeur', 'fas fa-list', Developer::class);
        yield MenuItem::linkToCrud('Skills', 'fas fa-list', Skills::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-list', Projects::class);
        yield MenuItem::linkToCrud('Langages', 'fas fa-list', Langages::class);
    }
}
