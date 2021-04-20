<?php

namespace App\Controller;

use App\Entity\Article;
use App\Controller\MainController;
use App\Entity\Marque;
use App\Entity\Slider;
use App\Services\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends MainController
{


    public function __construct()
    {
    
    }

    /**
     * @Route("/home", name="home")
     * @Route("/", name="homeroot")
     */
    public function index(Request $request, Paginator $paginator): Response
    {
        $sliderRepository = $this->getDoctrine()->getRepository(Slider::class);
        $slider = $sliderRepository->findAll();
        
        $marqueRepository = $this->getDoctrine()->getRepository(Marque::class);
        $marque = $marqueRepository->findAll();

        $selectionRepository = $this->getDoctrine()->getRepository(Article::class);
        $selection = $selectionRepository->findBy(['selection'=>1]);

        return $this->render('home/index.html.twig', [
            'slider' => $slider,
            'selection' => $selection,
            'marque' => $marque,
            'paginator' => $paginator->createPagination(Article::class,['new'=>1]),
            // Article::class  sert a récuperer les info dans la class article pour l' EntityManagerInterface
        ]);
       
    }
}