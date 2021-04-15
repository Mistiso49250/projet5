<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Entity\Article;
use App\Services\Paginator;
use App\Form\SearchArticleAllType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MarqueController extends AbstractController
{
    /**
     * @Route("/marque", name="marque_list")
     */
    public function index(Request $request, Paginator $paginator, string $slug): Response
    {
        $marqueRepository = $this->getDoctrine()->getRepository(Marque::class);

        $criteria = ['marque' => $marqueRepository->findOneBy(['slug'=>$slug])];
        $filters = ['categorie', 'genre', 'age'];

        $criteria = $this->filter->getFromQueryString($criteria, $filters, $request);
        $form = $this->createForm(SearchArticleAllType::class, null, [
            'searchdatas'=> $this->filter->getSearchDatas(),
            'filters'=> $filters,
        ]);

        $search = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $criteria = $this->filter->getFromForm($criteria, $filters, $search, $request);
        }

        return $this->render('marque/index.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, $criteria, 8),
            'form' => $form->createView(),
        ]);
    }
}
