<?php

namespace App\Controller\Backoffice;

use App\Entity\Slider;
use App\Form\Backoffice\SliderType;
use App\Repository\SliderRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/slider")
 */
class SliderController extends AbstractController
{
    /**
     * @Route("/", name="slider_index", methods={"GET"})
     */
    public function index(SliderRepository $sliderRepository): Response
    {
        return $this->render('backoffice/slider/index.html.twig', [
            'sliders' => $sliderRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="slider_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $slider = new Slider();
        $form = $this->createForm(SliderType::class, $slider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();
            $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalFilename . '-' . uniqid() . '.' . $image->guessExtension();
            $image->move($this->getParameter('image_slider_directory'), $fileName);
            $slider->setImage($fileName);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($slider);
            $entityManager->flush();

            $this->addFlash('success', 'L\'image a été crée avec succés.');


            return $this->redirectToRoute('slider_index');
        }

        return $this->render('backoffice/slider/new.html.twig', [
            'slider' => $slider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Route("/{id}", name="slider_show", methods={"GET"})
     */
    // public function show(Slider $slider): Response
    // {
    //     return $this->render('backoffice/slider/show.html.twig', [
    //         'slider' => $slider,
    //     ]);
    // }

    /**
     * Route("/{id}/edit", name="slider_edit", methods={"GET","POST"})
     */
    // public function edit(Request $request, Slider $slider): Response
    // {
    //     $form = $this->createForm(SliderType::class, $slider);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('slider_index');
    //     }

    //     return $this->render('backoffice/slider/edit.html.twig', [
    //         'slider' => $slider,
    //         'form' => $form->createView(),
    //     ]);
    // }

    /**
     * @Route("/{id}", name="slider_delete", methods={"POST"})
     */
    public function delete(Request $request, Slider $slider): Response
    {
        if ($this->isCsrfTokenValid('delete'.$slider->getId(), $request->request->get('_token'))) {
            $filenamefullpath = join(DIRECTORY_SEPARATOR, [
                $this->getParameter('image_slider_directory'),
                $slider->getImage(),
            ]); 

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($slider);
            $entityManager->flush();
            $fileSystem = new Filesystem();
            $fileSystem->remove($filenamefullpath);
        }

        return $this->redirectToRoute('slider_index');
    }
}
