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
        $article = $this->articleManager->Article($slug);
        return $this->render('article/index.html.twig', [
            'article'=>$article,
        ]);
    }

    /**
     * @Route("/article/list/{slug}", name="article_list_categ")
     */
    public function listeProduitsParCateg(string $slug): Response
    {
        $articles = $this->articleManager->ArticleByCategorie($slug);
        return $this->render('article/listeproduits.html.twig', [
            'articles'=>$articles,
        ]);
    }
}
