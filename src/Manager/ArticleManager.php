<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\Article;
use App\Services\Paginator;
use App\Repository\SliderRepository;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;


class ArticleManager
{
    private $articleRepository;
    private $categorieRepository;

    public function __construct(ArticleRepository $articleRepository, CategorieRepository $categorieRepository, SliderRepository $sliderRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categorieRepository = $categorieRepository;
        $this->sliderRepository = $sliderRepository;
    }

    // récupère les informations d'un article
    public function findArticle(string $slugArticle): ?Article
    {
        return $this->articleRepository->findOneBy(['slug' => $slugArticle]);
    }

    // recupère les nouveaux articles pour la homePage
    public function allNouveaute(Paginator $paginator): array
    {
        return $this->articleRepository->findBy(['new' => 1], [], $paginator->getLimit(), $paginator->getOffset());
    }

    // recupère la selection d'article
    public function findSelectionArticle(): array
    {
        return $this->articleRepository->findBy(['selection' => 1]);
    }

    public function articleByCategorie(string $slugCategorie): ?array
    {
        $categorie = $this->categorieRepository->findOneBy(['slug' => $slugCategorie]);

        return $this->articleRepository->findBy(['categorie' => $categorie]);
    }
}