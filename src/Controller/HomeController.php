<?php

namespace App\Controller;

use App\Entity\Article;
use App\Manager\SliderManager;
use App\Manager\ArticleManager;
use App\Controller\MainController;
use App\Services\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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
    public function index(Request $request, SliderManager $sliderManager, Paginator $paginator): Response
    {
        $slider = $sliderManager->generateHomePage();
        $paginator->paginate();

        $list = $this->articleManager->AllNouveaute($paginator);

        $selection = $this->articleManager->findSelectionArticle();
        $marque = $sliderManager->generateSilderMarque();
        return $this->render('home/index.html.twig', [
            'slider' => $slider,
            'list' => $list,
            'selection' => $selection,
            'marque' => $marque,
            'paginator' => $paginator,
        ]);
        // $slider = $sliderManager->generateHomePage();
        // $list = $this->articleManager->AllNouveaute();
        // return $this->render('home/index.html.twig', [
        //     'list'=>$list,
        //     'slider'=>$slider,
        // ]);
    }
}