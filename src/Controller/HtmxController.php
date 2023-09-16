<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HtmxController extends AbstractController
{
    #[Route('/htmx', name: 'app_htmx')]
    public function index(): Response
    {
        return $this->render('htmx/index.html.twig', [
            'controller_name' => 'HtmxController',
        ]);
    }

    #[Route('/messages', name: 'messages_htmx')]
    public function test1(): Response
    {
        return new Response('<p>OK</p>');
    }

    #[Route('/mouse_entered', name: 'mouse_entered')]
    public function test2(Request $request): Response
    {
        return new Response('<p>FYI</p>');
    }

    /**
     * @throws \Exception
     */
    #[Route('/news', name: 'news')]
    public function test3(Request $request): Response
    {
        $faker = \Faker\Factory::create();

        $nom = $faker->name;

        $compteur = random_int(1, 10000);
        return new Response('<p>NEWS</p>'.$compteur. ' <==Facker===> '. $nom);
    }
}
