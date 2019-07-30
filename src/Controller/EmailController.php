<?php


namespace App\Controller;


use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{

    /**
     * @Route("/email", name="email")
     * @param Swift_Mailer $mailer
     * @return Response
     */
    public function index( \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('info@pulsar-informatique.com')
            ->setTo('agathe@pulsar-informatique.com')
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'emails/registration.html.twig'),
                'text/html'
            );



        $mailer->send($message);

        // Envoi du mail
        $mailer->send($message);
        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
        ]);
    }





}