<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Services\Paginator;
use App\Controller\MainController;
use App\Form\SearchArticleAllType;
use App\Services\Filter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends MainController
{
    private $filter;

    public function __construct(Filter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @Route("/all", name="all_article")
     */
    public function allArticle(Request $request, Paginator $paginator): Response
    {
        $criteria = [];

        $filters = ['categorie', 'marque', 'genre', 'age'];
        $criteria = $this->filter->getFromQueryString($criteria, $filters, $request);
        $form = $this->createForm(SearchArticleAllType::class, null, ['searchdatas'=> $this->filter->getSearchDatas()]);
        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $criteria = $this->filter->getFromForm($criteria, $filters, $search, $request);
        }
        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, $criteria, 8),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/article/{slug}", name="article")
     */
    public function index(string $slug): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepository->findOneBy(['slug' => $slug]);
        if($article === null){
            // $this->addFlash('error', 'Cet article n\'existe pas');
            return $this->redirectToRoute('error_article_404');
        }

        return $this->render('article/index.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/article/list/{slug}", name="article_list_categ")
     */
    public function listeProduitsParCateg(Request $request, Paginator $paginator, string $slug): Response
    {
        $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);

        $criteria = ['categorie' => $categorieRepository->findOneBy(['slug' => $slug])];
        $filters = ['marque', 'genre', 'age'];

        $criteria = $this->filter->getFromQueryString($criteria, $filters, $request);
        $form = $this->createForm(SearchArticleAllType::class, null, [
            'searchdatas'=> $this->filter->getSearchDatas(),
            'filters'=> $filters,
        ]);

        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $criteria = $this->filter->getFromForm($criteria, $filters, $search, $request);
        }

        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, $criteria, 8),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/nouveaute}", name="article_list_nouveaute")
     */
    public function listePageNouveaute(Request $request,Paginator $paginator): Response
    {
        $criteria = ['new' => 1];
        $filters = ['categorie', 'marque', 'genre', 'age'];

        $criteria = $this->filter->getFromQueryString($criteria, $filters, $request);
        $form = $this->createForm(SearchArticleAllType::class, null, ['searchdatas'=> $this->filter->getSearchDatas()]);
        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $criteria = $this->filter->getFromForm($criteria, $filters, $search, $request);
        }
        
        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, $criteria, 8),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/selection", name="article_list_selection")
     */
    public function listePageSelection(Request $request, Paginator $paginator): Response
    {
        $criteria = ['selection' => 1];
        $filters = ['categorie', 'marque', 'genre', 'age'];

        $criteria = $this->filter->getFromQueryString($criteria, $filters, $request);
        $form = $this->createForm(SearchArticleAllType::class, null, ['searchdatas'=> $this->filter->getSearchDatas()]);
        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $criteria = $this->filter->getFromForm($criteria, $filters, $search, $request);
        }

        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, $criteria, 8),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/404article", name="error_article_404")
     */
    public function ErrorPageArticle(Paginator $paginator): Response
    {
        $criteria = ['selection' => 1];

        return $this->render('error/404article.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, $criteria, 5),
        ]);
    }

}
