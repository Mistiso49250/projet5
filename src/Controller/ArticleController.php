<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    private $articleManager;

    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function index(int $id): Response
    {
        $article = $this->articleManager->Article($id);
        return $this->render('article/index.html.twig', [
            'article'=>$article,
        ]);
    }
}
