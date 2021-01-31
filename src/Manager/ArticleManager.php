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
        $articles = $this->articleRepository->findBy(['new'=> 1]);
        foreach($articles as $article){
            dump($article->getCategorie()->getCode());
        }
        return $this->articleRepository->findBy(['new'=> 1]);
    }
}
