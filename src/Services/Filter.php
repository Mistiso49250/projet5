<?php

namespace App\Services;

use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;



class Filter
{
    private $request;
    private $em;
    private $searchDatas = [];

    public function __construct(RequestStack $request, EntityManagerInterface $em)
    {
        $this->request = $request->getCurrentRequest();
        $this->em = $em;
    }

    public function getFromForm(array $criteria, array $filters, Form $search ): array
    {
        if ($this->request->getMethod() === 'POST') {
            $this->searchDatas=[];
            foreach ($filters as $filter) {
                dump($filter, $this->request->query->has($filter));
                if($this->request->query->has($filter))
                {
                    $this->request->query->remove($filter);
                    dump($this->request->query);
                }
                if ($search->has($filter)) {
                    $data = $search->get($filter)->getData();
                    if ($data !== null) {
                        $criteria[$filter] = $data;
                        $this->request->query->add([
                            $filter => $data->getSlug()
                        ]);
                    }
                }
            }
        }

        return $criteria;
    }

    public function getFromQueryString(array $criteria, array $filters): array
    {
        if ($this->request->getMethod() === 'GET') {
            $this->searchDatas = [];
            foreach ($filters as $filter) {
                if ($this->request->query->has($filter)) {
                    $dataFilter = $this->request->query->get($filter);
                    $data = $this->em->getRepository('App\Entity\\' . ucfirst($filter))->findOneBy(['slug' => $dataFilter]);
                    if ($data !== null) {
                        $criteria[$filter] = $data;
                        $this->searchDatas[$filter] = $data;
                    }
                }
            }
        }

        return $criteria;
    }

    public function getSearchDatas(): array
    {
        return $this->searchDatas;
    }

}
