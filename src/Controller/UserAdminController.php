<?php


namespace App\Controller;


use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Security\Core\User\UserInterface;

class UserAdminController extends EasyAdminController
{

   // Creates the Doctrine query builder used to get all the items. Override it
    // to filter the elements displayed in the listing
    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
    {
        $dqlFilter = sprintf('entity.cantine = %s', $this->getUser->getCantine()->getId());
        return parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);
    }




    // Performs the actual database query to get all the items (using the query
    // builder created with the previous method). You can override this method
    // to filter the results before sending them to the template

    //protected function findAll($entityClass, $page = 1, $maxPerPage = 15, $sortField = null, $sortDirection = null, $dqlFilter = null);
}




