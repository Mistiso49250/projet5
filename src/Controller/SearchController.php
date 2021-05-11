<?php

namespace App\Controller;

use App\Controller\MainController;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class SearchController extends MainController
{

    /**
     * @Route("/search", name="app_search")
     */

    public function index(Request $request, ArticleRepository $articleRepository): Response
    {
        $recherche = $request->query->get('q');
        $recherche = trim($recherche);
        if($recherche === null || $recherche === ''){
            return $this->redirectToRoute('error_article_404');
        }
        
        $produits = $articleRepository->search($recherche);
        if(count($produits) === 0){
            return $this->redirectToRoute('error_article_404', [
                'q'=>$recherche,
            ]);
        }
        dump($produits, $recherche);
        return $this->render('home/search.html.twig', [
            'produits'=> $produits,
            'recherche'=> $recherche,
        ]);
    }
}