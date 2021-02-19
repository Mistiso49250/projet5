<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends MainController
{
    private $articleManager;

    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function index(string $slug): Response
    {
        $article = $this->articleManager->findArticle($slug);
        return $this->render('article/index.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/article/list/{slug}", name="article_list_categ")
     */
    public function listeProduitsParCateg(string $slug): Response
    {
        $articles = $this->articleManager->articleByCategorie($slug);
        return $this->render('article/listeproduits.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/nouveaute}", name="article_list_nouveaute")
     */
    public function listePageNouveaute(): Response
    {
        $nouveau = $this->articleManager->allNouveaute();
        return $this->render('article/nouveauarticle.html.twig', [
            'nouveau' => $nouveau,
        ]);
    }

    /**
     * @Route("selection", name="article_list_selection")
     */
    public function listePageSelection(): Response
    {
        $selection = $this->articleManager->findSelectionArticle();
        return $this->render('article/selectionarticle.html.twig', [
            'selection' => $selection,
        ]);
    }
}