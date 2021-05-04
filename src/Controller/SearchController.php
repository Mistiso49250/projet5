<?php

namespace App\Controller;

use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class SearchController extends MainController
{

    /**
     * @Route("/search", name="app_search")
     */

    public function index(Request $request): Response
    {
        $recherche = $request->query->get('q');
        $recherche = trim($recherche);
        if($recherche === null || $recherche === ''){
            return $this->redirectToRoute('home');
        }
        dd($recherche);
    }
}