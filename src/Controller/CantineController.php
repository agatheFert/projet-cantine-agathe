<?php


namespace App\Controller;


use App\Entity\Cantine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CantineController extends AbstractController
{


    /**
     * @Route("list-cantines")
     * @return Response
     */

    public function listCantines():Response
    {


        // Récupération du Repository
        $repository = $this->getDoctrine()
            ->getRepository(Cantine::class)
        ;
        // Récupération de toutes les Cantines
        $cantines = $repository->findAll();
        // Renvoi des articles à la vue
        return $this->render('cantines.html.twig', [
            'cantines'=>$cantines
        ]);


    }






}