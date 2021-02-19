<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\SliderRepository;


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
    public function allNouveaute(int $page): array
    {
        $count = 12;
        $offset = 0;
        $limit = 4;
        if ($count !== 0) {
            $page = $page < 1 ? 1 : $page;
            $page = $page > ceil($count / $limit) ? ceil($count / $limit) : $page;
            $offset = $limit * ($page - 1);
        }
        return $this->articleRepository->findBy(['new' => 1], [], $limit, $offset);
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