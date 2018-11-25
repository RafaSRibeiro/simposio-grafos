<?php

namespace App\Controller;

use App\GrafoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(GrafoService $grafoService) {
        $vertices = $grafoService->welshPowell();
        return $this->render('home/index.html.twig', [
            'vertices' => $vertices,
        ]);
    }
}
