<?php

namespace App\Controller;

use App\Entity\Article;
use App\Manager\SliderManager;
use App\Manager\ArticleManager;
use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, SliderManager $sliderManager): Response
    {
        $slider = $sliderManager->generateHomePage();


        $page = $request->query->getInt('page', 1);
        // recupère la page dans l'url, ne recupère que la partie int, 1= si rien prend page defaut
        $list = $this->articleManager->AllNouveaute($page);

        $selection = $this->articleManager->findSelectionArticle();
        $marque = $sliderManager->generateSilderMarque();
        return $this->render('home/index.html.twig', [
            'slider' => $slider,
            'list' => $list,
            'selection' => $selection,
            'marque' => $marque,
        ]);
        // $slider = $sliderManager->generateHomePage();
        // $list = $this->articleManager->AllNouveaute();
        // return $this->render('home/index.html.twig', [
        //     'list'=>$list,
        //     'slider'=>$slider,
        // ]);
    }
}