<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    /**
     * @Route("/", name="app_home", methods={"GET"})
     * @return Response
     *
     */
    public function home():Response
    {
      // return new Response('<h1>Réponse Symfony : page accueil</h1>');
        return $this->render("home.html.twig");
    }


    /**
     * @Route("/contact")
     * @return Response
     */
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }



}