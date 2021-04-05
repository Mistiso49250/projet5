<?php

namespace App\Controller\Backoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeAdminController extends AbstractController
{
    /**
     * @Route("/home/admin", name="home_admin")
     */
    public function index(): Response
    {
        return $this->render('backoffice/home_admin/index.html.twig', [
            'controller_name' => 'HomeAdminController',
        ]);
    }
}
