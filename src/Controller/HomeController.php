<?php

namespace App\Controller;

use App\Entity\Article;
use App\Manager\ArticleManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
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
        $i = 99;
        $article = new Article();
        $article->setTitre("Titre de l'article n°$i")
                ->setContenu("Contenu de l'article n°$i")
                ->setImage("http://placehold.it/150x150")
                ->setExtrait("Extrait de l'article n°$i")
                ->setDetail("Détatil de l'article n°$i")
                ->setPrixTTC(10.25)
                // ->setSlug("titre_de_l_article_n_$i")
                ->setNew(1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        $list = $this->articleManager->AllNouveaute();
        return $this->render('home/index.html.twig', [
            'list'=>$list,
        ]);
    }
}
