<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
class MailerController extends AbstractController
{
    /*
        #[Route('/mailer', name: 'app_mailer')]
        public function index(): Response
        {
            return $this->render('mailer/index.html.twig', [
                'controller_name' => 'MailerController',
            ]);
        }
    */

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/send-email', name: 'app_send_email')]
    public function index(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('amine.betari@gmail.com')
            ->to('a.betari@inforca.mc')
            ->subject('Email Test')
            ->text('A sample email using mailtrap.');

        $mailer->send($email);
        return new Response(
            'Email sent successfully'
        );
    }
}
