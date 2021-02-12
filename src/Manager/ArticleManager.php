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
    public function Article(string $slugArticle) : ?Article
    {
        return $this->articleRepository->find($slugArticle);
    }

    // recupère les nouveaux articles pour la homePage
    public function AllNouveaute() : array
    {
        return $this->articleRepository->findBy(['new'=> 1]);
    }

    public function ArticleByCategorie(string $slugCategorie): ?array
    {
        $categorie = $this->categorieRepository->findOneBy(['slug'=>$slugCategorie]);
       
        return $this->articleRepository->findBy(['categorie'=>$categorie]);
    }
}
