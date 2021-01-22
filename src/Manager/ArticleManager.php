<?php
declare(strict_types=1);

namespace App\Manager;

use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticleManager
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    // récupère les informations d'un article
    public function Article(int $idArticle) : ?Article
    {
        return $this->articleRepository->find($idArticle);
    }

    // recupère les nouveaux articles pour la homePage
    public function AllNouveaute() : array
    {
        return $this->articleRepository->findBy(['new'=> 1]);
    }
}
