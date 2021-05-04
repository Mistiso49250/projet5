<?php

namespace App\Controller\Backoffice;

use App\Entity\Article;
use App\Form\Backoffice\ArticleType;
use App\Repository\ArticleRepository;
use App\Services\Paginator;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository, Paginator $paginator): Response
    {
        $criteria = [];

        return $this->render('backoffice/article/index.html.twig', [
            'paginator' => $paginator->createPagination(Article::class, $criteria, 8),
        ]);
    }

    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();
            $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalFilename . '-' . uniqid() . '.' . $image->guessExtension();
            $image->move($this->getParameter('image_article_directory'), $fileName);
            $article->setImage($fileName);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            $this->addFlash('success', 'L\'article a été crée avec succés.');

            return $this->redirectToRoute('article_index');
        }
       

        return $this->render('backoffice/article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('backoffice/article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $oldImage = $article->getImage();

            $image = $form->get('image')->getData();
            $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalFilename . '-' . uniqid() . '.' . $image->guessExtension();
            $image->move($this->getParameter('image_article_directory'), $fileName);
            $article->setImage($fileName);

            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($article);
            // $entityManager->flush();

            $this->getDoctrine()->getManager()->flush();

            $filenamefullpath = join(DIRECTORY_SEPARATOR, [
                $this->getParameter('image_article_directory'),
                $oldImage,
            ]); 
            
            $fileSystem = new Filesystem();
            $fileSystem->remove($filenamefullpath);

            $this->addFlash('success', 'L\'article a été modifié avec succés.');

            // return $this->redirectToRoute('article_index');
        }

        return $this->render('backoffice/article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_delete", methods={"POST"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $filenamefullpath = join(DIRECTORY_SEPARATOR, [
                $this->getParameter('image_article_directory'),
                $article->getImage(),
            ]); 
            
            $fileSystem = new Filesystem();
            $fileSystem->remove($filenamefullpath);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }
}
