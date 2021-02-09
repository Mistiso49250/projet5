<?php

namespace App\Controller;

use App\Entity\Article;
use App\Manager\ArticleManager;
use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends MainController
{

    private $articleManager;
   
    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * @Route("/home", name="home")
     * @Route("/", name="homeroot")
     */
    public function index(): Response
    {

        $list = $this->articleManager->AllNouveaute();
        return $this->render('home/index.html.twig', [
            'list'=>$list,
        ]);
    }
}
