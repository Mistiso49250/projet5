<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\RequestStack;

class Paginator
{
    private $count;
    private $offset;
    private $limit;
    private $page;
    private $lastPage;

    public function __construct(RequestStack $request)
    {
        // Request n'est utiliser que pour les controller, pour construct RequestStack
        // RequestStack getCurrentRequest
        $this->page = $request->getCurrentRequest()->query->getInt('page', 1);
        $this->count = 12;
        $this->offset = 0;
        $this->limit = 4;
    }
    // recupère la page dans l'url avec $request->query,
    // getInt :  ne recupère que la partie int, 1 => si rien prend page defaut

    public function paginate(): void
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
}