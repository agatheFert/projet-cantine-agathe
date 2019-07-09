<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class HomeController
{

    public function home():Response
    {


      return new Response('<h1>Réponse Symfony : page accueil</h1>');

    }





}