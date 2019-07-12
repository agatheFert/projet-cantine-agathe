<?php


namespace App\Controller;
use App\Entity\Entree;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EntreeController extends AbstractController
{
    /**
     * @Route("list-entrees")
     * @return Response
     */

    public function listEntrees():Response
    {


        // Récupération du Repository
        $repository = $this->getDoctrine()
            ->getRepository(Entree::class)
        ;


        // Récupération de tous les Plats
        $entrees = $repository->findAll();
        // Renvoi des articles à la vue
        return $this->render('entrees.html.twig', [
            'entrees'=>$entrees
        ]);



    }






}