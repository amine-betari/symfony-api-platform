<?php

namespace App\Controller;

use App\Services\HandlerCache;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CspController extends AbstractController
{

    #[Route('/csp', name: 'app_csp')]
    public function index(HandlerCache $handlerCache): Response
    {
        $item = $handlerCache->getData('test');
        dump($item);

        return $this->render('csp/index.html.twig', [
            'controller_name' => 'CspController',
        ]);
    }
}
