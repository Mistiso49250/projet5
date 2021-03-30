<?php

namespace App\Controller\Backoffice;

use App\Entity\CategoriePrincipal;
use App\Form\Backoffice\CategoriePrincipalType;
use App\Repository\CategoriePrincipalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/categorie/principal")
 */
class CategoriePrincipalController extends AbstractController
{
    /**
     * @Route("/", name="categorie_principal_index", methods={"GET"})
     */
    public function index(CategoriePrincipalRepository $categoriePrincipalRepository): Response
    {
        return $this->render('backoffice/categorie_principal/index.html.twig', [
            'categorie_principals' => $categoriePrincipalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorie_principal_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoriePrincipal = new CategoriePrincipal();
        $form = $this->createForm(CategoriePrincipalType::class, $categoriePrincipal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoriePrincipal);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_principal_index');
        }

        return $this->render('backoffice/categorie_principal/new.html.twig', [
            'categorie_principal' => $categoriePrincipal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_principal_show", methods={"GET"})
     */
    public function show(CategoriePrincipal $categoriePrincipal): Response
    {
        return $this->render('backoffice/categorie_principal/show.html.twig', [
            'categorie_principal' => $categoriePrincipal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorie_principal_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoriePrincipal $categoriePrincipal): Response
    {
        $form = $this->createForm(CategoriePrincipalType::class, $categoriePrincipal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorie_principal_index');
        }

        return $this->render('backoffice/categorie_principal/edit.html.twig', [
            'categorie_principal' => $categoriePrincipal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_principal_delete", methods={"POST"})
     */
    public function delete(Request $request, CategoriePrincipal $categoriePrincipal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoriePrincipal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoriePrincipal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorie_principal_index');
    }
}
