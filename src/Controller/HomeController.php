<?php

namespace App\Controller;

use App\Entity\Developer;
use App\Repository\DeveloperRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(DeveloperRepository $developerRepository): Response
    {   
        $developer = $developerRepository->find(5);


        return $this->render('home/index.html.twig', [
            'developer' => $developer,
            
        ]);
    }
}
