<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Services\Paginator;
use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends MainController
{

    public function __construct()
    {
    }

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function index(string $slug): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepository->findOneBy(['slug'=>$slug]);
        return $this->render('article/index.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/article/list/{slug}", name="article_list_categ")
     */
    public function listeProduitsParCateg(Paginator $paginator, string $slug): Response
    {
        $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
        $categorie = $categorieRepository->findOneBy(['slug'=>$slug]);
        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class,['categorie'=>$categorie]),
        ]);
    }

    /**
     * @Route("/nouveaute}", name="article_list_nouveaute")
     */
    public function listePageNouveaute(Paginator $paginator): Response
    {
        // $nouveau = $this->articleManager->allNouveaute();
        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class,['new'=>1]),
        ]);
    }

    /**
     * @Route("/selection", name="article_list_selection")
     */
    public function listePageSelection(Paginator $paginator): Response
    {
        
        return $this->render('article/listeproduits.html.twig', [
            'paginator'=> $paginator->createPagination(Article::class,['selection'=>1]),
        ]);
    }

    /**
     * @Route("/all", name="all_article")
     */
    public function allArticle(Paginator $paginator): Response
    {
        return $this->render('article/listeproduits.html.twig', [
            'paginator'=> $paginator->createPagination(Article::class,[], 8),
        ]);
    }

}