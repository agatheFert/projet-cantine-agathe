<?php


namespace App\Controller;


use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class UserAdminController extends EasyAdminController
{


    // Creates the Doctrine query builder used to get all the items. Override it
    // to filter the elements displayed in the listing
    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $dqlFilter = sprintf('entity.cantine = %s', $user->getCantine()->getId());
        return parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);
    }



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
        return new Response('Well hi there '.$user->getCantine());
    }



    // Performs the actual database query to get all the items (using the query
    // builder created with the previous method). You can override this method
    // to filter the results before sending them to the template

    //protected function findAll($entityClass, $page = 1, $maxPerPage = 15, $sortField = null, $sortDirection = null, $dqlFilter = null);
}




