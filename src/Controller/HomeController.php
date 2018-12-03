<?php

namespace App\Controller;

use App\Service\GrafoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(GrafoService $grafoService) {
        $em = $this->getDoctrine()->getManager();
        $pedidosProntos = $em->getRepository('App:Pedido')
            ->findByStatusPedido('pronto');

        $pedidosElaboracao = $em->getRepository('App:Pedido')
            ->findByStatusPedido('em elaboração');

        return $this->render('home/index.html.twig', [
            'prontos' => $grafoService->welshPowell($pedidosProntos),
            'elaboracao' => $grafoService->welshPowell($pedidosElaboracao),
        ]);
    }
}
