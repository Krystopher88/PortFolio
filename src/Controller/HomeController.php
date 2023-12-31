<?php

namespace App\Controller;

use App\Repository\DeveloperRepository;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(DeveloperRepository $developerRepository, ProjectsRepository $projectsRepository): Response
    {   
        $developer = $developerRepository->find(1);
        $projects = $projectsRepository->findBy([], ['created_at' => 'DESC'], 5);

        // dd($projects);


        return $this->render('home/index.html.twig', [
            'developer' => $developer,
            'projects' => $projects,            
        ]);
    }
}
