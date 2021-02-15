<?php

namespace App\Controller;

use App\Entity\Article;
use App\Manager\ArticleManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\MainController;
use App\Manager\SliderManager;

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
    public function index(SliderManager $sliderManager): Response
    {
        $slider = $sliderManager->generateHomePage();
        $list = $this->articleManager->AllNouveaute();
        $selection = $this->articleManager->findSelectionArticle();
        return $this->render('home/index.html.twig', [
            'slider'=>$slider,
            'list'=>$list,
            'selection'=>$selection,
        ]);
        // $slider = $sliderManager->generateHomePage();
        // $list = $this->articleManager->AllNouveaute();
        // return $this->render('home/index.html.twig', [
        //     'list'=>$list,
        //     'slider'=>$slider,
        // ]);
    }
}
