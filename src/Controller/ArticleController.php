<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Services\Paginator;
use Symfony\Component\Form\Form;
use App\Controller\MainController;
use App\Form\SearchArticleAllType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends MainController
{
    private function getFromForm(array $criteria, array $filters, Form $search, Request $request): array
    {
        if ($request->getMethod() === 'POST') {
            foreach ($filters as $filter) {
                if ($search->has($filter)) {
                    $data = $search->get($filter)->getData();
                    if ($data !== null) {
                        $criteria[$filter] = $data;
                        $request->query->add([
                            $filter => $data->getSlug()
                        ]);
                    }
                }
            }
        }

        return $criteria;
    }

    private function getFromQueryString(array $criteria, array $filters, Request $request): array
    {
        if ($request->getMethod() === 'GET') {
            foreach ($filters as $filter) {
                if ($request->query->has($filter)) {
                    $dataFilter = $request->query->get($filter);
                    $data = $this->getDoctrine()->getRepository('App\Entity\\' . $filter)->findOneBy(['slug' => $dataFilter]);
                    if ($data !== null) {
                        $criteria[$filter] = $data;
                    }
                }
            }
        }

        return $criteria;
    }

    public function __construct()
    {
    }

    /**
     * @Route("/all", name="all_article")
     */
    public function allArticle(Request $request, Paginator $paginator): Response
    {
        $criteria = [];
        $form = $this->createForm(SearchArticleAllType::class);
        $search = $form->handleRequest($request);
        $filters = ['categorie', 'marque'];
        $criteria = $this->getFromQueryString($criteria, $filters, $request);
        if ($form->isSubmitted() && $form->isValid()) {
            $criteria = $this->getFromForm($criteria, $filters, $search, $request);
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
