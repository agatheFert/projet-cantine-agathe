<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function home():Response
    {
      // return new Response('<h1>Réponse Symfony : page accueil</h1>');
        return $this->render("home.html.twig");
    }





}