<?php


namespace App\Controller;


use App\Entity\Accompagnement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccompagnementController extends AbstractController
{


    /**
     * @Route("list-accompagnements")
     * @return Response
     */


    public function listAccompagnements():Response
    {


        // Récupération du Repository
        $repository = $this->getDoctrine()
            ->getRepository(Accompagnement::class)
        ;


        // Récupération de tous les Plats
        $plats = $repository->findAll();
        // Renvoi des articles à la vue
        return $this->render('accompagnements.html.twig', [
            'accompagnements'=>$plats
        ]);



    }












}