<?php

namespace App\Controller;

use App\Controller\MainController;
use App\Form\EditProfilType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends MainController
{
    /**
     * @Route("/utilisateur", name="utilisateur")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/utilisateur/modifier", name="utilisateur_modifier")
     */
    public function editprofil(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfilType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Votre profil a bien été mis à jour');

            return $this->redirectToRoute('utilisateur');
        }

        return $this->render('user/editprofil.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
