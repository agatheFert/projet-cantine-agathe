<?php


namespace App\Controller;


use Psr\Log\LoggerInterface;
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
    /**
     * @Route("/coucou", name="app_coucou", methods={"GET"})
     * @return Response
     *
     */

    public function index()
    {
        // usually you'll want to make sure the user is authenticated first
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // returns your User object, or null if the user is not authenticated
        // use inline documentation to tell your editor your exact User class
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        // Call whatever methods you've added to your User class
        // For example, if you added a getFirstName() method, you can use that.
        return new Response('Well hi there, <b>votre Email : </b>'.$user->getEmail(). '<br/> Et <b>Cantine à laquelle vous êtes inscrit : </b>' .$user->getCantine());
    }
    /**
     * @Route("/testservice", name="testservice", methods={"GET"})
     * @return Response
     *
     */

    public function list(LoggerInterface $logger):Response
    {
       return new Response ($logger->info('Look! I just used a service'));

        // ...
    }


}