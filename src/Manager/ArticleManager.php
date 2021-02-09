<?php
declare(strict_types=1);

namespace App\Manager;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;

use function Symfony\Component\DependencyInjection\Loader\Configurator\ref;

class ArticleManager
{
    private $articleRepository;
    private $categorieRepository;

    public function __construct(ArticleRepository $articleRepository, CategorieRepository $categorieRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categorieRepository = $categorieRepository;
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

    public function ArticleByCategorie(string $slugCategorie): ?array
    {
        $categorie = $this->categorieRepository->findOneBy(['slug'=>$slugCategorie]);
       
        return $this->articleRepository->findBy(['categorie'=>$categorie]);
    }
}
