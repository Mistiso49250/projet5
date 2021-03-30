<?php

namespace App\Controller\Backoffice;

use App\Entity\Age;
use App\Form\Backoffice\AgeType;
use App\Repository\AgeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/age")
 */
class AgeController extends AbstractController
{
    /**
     * @Route("/", name="age_index", methods={"GET"})
     */
    public function index(AgeRepository $ageRepository): Response
    {
        return $this->render('backoffice/age/index.html.twig', [
            'ages' => $ageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="age_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $age = new Age();
        $form = $this->createForm(AgeType::class, $age);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($age);
            $entityManager->flush();

            return $this->redirectToRoute('age_index');
        }

        return $this->render('backoffice/age/new.html.twig', [
            'age' => $age,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="age_show", methods={"GET"})
     */
    public function show(Age $age): Response
    {
        return $this->render('backoffice/age/show.html.twig', [
            'age' => $age,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="age_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Age $age): Response
    {
        $form = $this->createForm(AgeType::class, $age);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('age_index');
        }

        return $this->render('backoffice/age/edit.html.twig', [
            'age' => $age,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="age_delete", methods={"POST"})
     */
    public function delete(Request $request, Age $age): Response
    {
        if ($this->isCsrfTokenValid('delete'.$age->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($age);
            $entityManager->flush();
        }

        return $this->redirectToRoute('age_index');
    }
}
