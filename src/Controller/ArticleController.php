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
        $categorie = $categorieRepository->findOneBy(['slug' => $slug]);

        $criteria = [];
        $form = $this->createForm(SearchArticleAllType::class);
        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categ = $search->get('categorie')->getData();
            if ($categ !== null) {
                $criteria['categorie'] = $categ;
            }
            $marque = $search->get('marque')->getData();
            if ($marque !== null) {
                $criteria['marque'] = $marque;
            }
            $genre = $search->get('genre')->getData();
            if ($genre !== null) {
                $criteria['genre'] = $genre;
            }
            $age = $search->get('age')->getData();
            if ($age !== null) {
                $criteria['age'] = $age;
            }
        }

        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, ['categorie' => $categorie]),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/nouveaute}", name="article_list_nouveaute")
     */
    public function listePageNouveaute(Request $request, Paginator $paginator): Response
    {
        // $nouveau = $this->articleManager->allNouveaute();
        $criteria = [];
        $form = $this->createForm(SearchArticleAllType::class);
        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categ = $search->get('categorie')->getData();
            if ($categ !== null) {
                $criteria['categorie'] = $categ;
            }
            $marque = $search->get('marque')->getData();
            if ($marque !== null) {
                $criteria['marque'] = $marque;
            }
            $genre = $search->get('genre')->getData();
            if ($genre !== null) {
                $criteria['genre'] = $genre;
            }
            $age = $search->get('age')->getData();
            if ($age !== null) {
                $criteria['age'] = $age;
            }
        }
        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, ['new' => 1]),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/selection", name="article_list_selection")
     */
    public function listePageSelection(Request $request, Paginator $paginator): Response
    {
        $criteria = [];
        $form = $this->createForm(SearchArticleAllType::class);
        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categ = $search->get('categorie')->getData();
            if ($categ !== null) {
                $criteria['categorie'] = $categ;
            }
            $marque = $search->get('marque')->getData();
            if ($marque !== null) {
                $criteria['marque'] = $marque;
            }
            $genre = $search->get('genre')->getData();
            if ($genre !== null) {
                $criteria['genre'] = $genre;
            }
            $age = $search->get('age')->getData();
            if ($age !== null) {
                $criteria['age'] = $age;
            }
        }

        return $this->render('article/listeproduits.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, ['selection' => 1]),
            'form' => $form->createView(),
        ]);
    }
}
