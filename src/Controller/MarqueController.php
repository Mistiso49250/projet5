<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Services\Paginator;
use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MarqueController extends MainController
{
    /**
     * @Route("/marque/{slug}", name="marque")
     */
    public function index(string $slug): Response
    {
        $marqueRepository = $this->getDoctrine()->getRepository(Marque::class);
        $marque = $marqueRepository->findOneBy(['slug' => $slug]);
        if($marque === null){
            // $this->addFlash('error', 'Cet article n\'existe pas');
            return $this->redirectToRoute('error_marque_404');
        }

        return $this->render('marque/index.html.twig', [
            'marque' => $marque,
        ]);
    }

     /**
     * @Route("/404marque", name="error_marque_404")
     */
    public function ErrorPageMarque(Paginator $paginator): Response
    {
        $criteria = [];

        $marqueRepository = $this->getDoctrine()->getRepository(Marque::class);
        $marque = $marqueRepository->findAll();

        return $this->render('error/404marque.html.twig', [
            'marque' => $marque,
            'paginator' => $paginator->createPagination(Marque::class, $criteria, 5),
        ]);
    }
}
