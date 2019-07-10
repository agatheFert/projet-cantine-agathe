<?php


namespace App\Controller;


use App\Entity\Plat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatController extends AbstractController
{

    /**
     * @Route("list-plats")
     * @return Response
     */


    public function listPlats():Response
    {


        // Récupération du Repository
        $repository = $this->getDoctrine()
                            ->getRepository(Plat::class)
        ;


        // Récupération de tous les Plats
        $plats = $repository->findAll();
        // Renvoi des articles à la vue
        return $this->render('plats.html.twig', [
            'plats'=>$plats
        ]);



    }

}



