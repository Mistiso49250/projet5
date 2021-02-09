<?php

namespace App\Controller;

use App\Entity\CategoriePrincipal;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters['menu'] = $this->getDoctrine()->getRepository(CategoriePrincipal::class)->findAll();
        return parent::render($view, $parameters);
    }
}
