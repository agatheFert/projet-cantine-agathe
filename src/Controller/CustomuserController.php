<?php


namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomuserController extends AbstractController
{


    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function pageAvecUnUtilisateur(UserInterface $user)
    {

        $CantineUSerLogged = $user->getCantine();
        //return new Response(sprintf('Hello %s!', $user->getCantine()));
        return new Response($CantineUSerLogged);
    }


    /**
     * @Route("/dashboard2", name="dashboard2")
     */
    public function pageAvecPeutEtreUnUtilisateur(?UserInterface $user)
    {
        if ($user) {
            return new Response(sprintf('Hello %s!', $user->getUsername()));
        }
        return new Response('Hello anonyme!');
    }








}