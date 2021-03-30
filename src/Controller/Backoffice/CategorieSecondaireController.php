<?php

namespace App\Controller\Backoffice;

use App\Entity\CategorieSecondaire;
use App\Form\Backoffice\CategorieSecondaireType;
use App\Repository\CategorieSecondaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/categorie/secondaire")
 */
class CategorieSecondaireController extends AbstractController
{
    /**
     * @Route("/", name="categorie_secondaire_index", methods={"GET"})
     */
    public function index(CategorieSecondaireRepository $categorieSecondaireRepository): Response
    {
        return $this->render('backoffice/categorie_secondaire/index.html.twig', [
            'categorie_secondaires' => $categorieSecondaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorie_secondaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categorieSecondaire = new CategorieSecondaire();
        $form = $this->createForm(CategorieSecondaireType::class, $categorieSecondaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorieSecondaire);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_secondaire_index');
        }

        return $this->render('backoffice/categorie_secondaire/new.html.twig', [
            'categorie_secondaire' => $categorieSecondaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_secondaire_show", methods={"GET"})
     */
    public function show(CategorieSecondaire $categorieSecondaire): Response
    {
        return $this->render('backoffice/categorie_secondaire/show.html.twig', [
            'categorie_secondaire' => $categorieSecondaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorie_secondaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategorieSecondaire $categorieSecondaire): Response
    {
        $form = $this->createForm(CategorieSecondaireType::class, $categorieSecondaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorie_secondaire_index');
        }

        return $this->render('backoffice/categorie_secondaire/edit.html.twig', [
            'categorie_secondaire' => $categorieSecondaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_secondaire_delete", methods={"POST"})
     */
    public function delete(Request $request, CategorieSecondaire $categorieSecondaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieSecondaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorieSecondaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorie_secondaire_index');
    }
}
