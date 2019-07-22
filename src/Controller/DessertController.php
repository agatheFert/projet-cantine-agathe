<?php


namespace App\Controller;


use App\Entity\Dessert;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DessertController extends AbstractController
{


    /**
     * @Route("list-desserts")
     * @return Response
     */

    public function listDesserts() :Response
    {
        // Récupération du Repository
        $repository = $this->getDoctrine()
            ->getRepository(Dessert::class)
        ;

        // Récupération de tous les Desserts
        $desserts = $repository->findAll();
        // Renvoi des articles à la vue
        return $this->render('desserts.html.twig', [
            'desserts'=>$desserts
        ]);





    }



}