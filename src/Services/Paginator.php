<?php

namespace App\Services;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class Paginator
{
    private $count;
    private $offset;
    private $limit;
    private $page;
    private $lastPage;
    private $em;
    private $datas;

    // public function __construct(RequestStack $request, ParameterBagInterface $parameterBag, ArticleRepository $articleRepository)
    public function __construct(RequestStack $request, ParameterBagInterface $parameterBag, EntityManagerInterface $entityManager)
    {
        // Request n'est utiliser que pour les controller, pour construct RequestStack
        // RequestStack getCurrentRequest
        // Em gere les repos
        $this->em = $entityManager;
        $this->page = $request->getCurrentRequest()->query->getInt('page', 1);
        // $this->count = count($articleRepository->findBy(['new'=>1]));
        $this->offset = 0;
        $this->limit = $parameterBag->get('maxitemsperpage');
    }
    // recupère la page dans l'url avec $request->query,
    // getInt :  ne recupère que la partie int, 1 => si rien prend page defaut

    private function paginate(): void
    {

        if ($this->count !== 0) {
            $this->lastPage = (int)ceil($this->count / $this->limit);
            // 
            $this->page = $this->page < 1 ? 1 : $this->page;
            // determine le nombre total de pages
            $this->page = $this->page > $this->lastPage ? $this->lastPage : $this->page;
            // obtenir la page courante
            $this->offset = $this->limit * ($this->page - 1);
        }

    }

    public function getDatas(): ?array
    {
        return $this->datas;
    }

    public function createPagination(string $entityClass, array $criteria): self
    {
        $repo = $this->em->getRepository($entityClass);
        $this->count = count($repo->findBy($criteria));

        $this->paginate();

        $this->datas = $repo->findBy($criteria, [], $this->limit, $this->offset);

        return $this;
    }


    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getLastPage(): ?int
    {
        return $this->lastPage;
    }

    public function getCurrentPage(): ?int
    {
        return $this->page;
    }

    public function getPreviousPage(): ?int
    {
        $previous = $this->page -1;
        return $previous > 0 ? $previous : null;
    }

    public function getNextPage(): ?int
    {
        $next = $this->page +1;
        return $next <= $this->lastPage ? $next : null;
    }
}