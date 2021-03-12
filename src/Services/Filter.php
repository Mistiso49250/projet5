<?php

namespace App\Services;

use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;



class Filter
{
    private $request;
    private $em;

    public function __construct(RequestStack $request, EntityManagerInterface $em)
    {
        $this->request = $request->getCurrentRequest();
    }

    public function getFromForm(array $criteria, array $filters, Form $search ): array
    {
        if ($this->request->getMethod() === 'POST') {
            foreach ($filters as $filter) {
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
            foreach ($filters as $filter) {
                if ($this->request->query->has($filter)) {
                    $dataFilter = $this->request->query->get($filter);
                    $data = $this->em->getRepository('App\Entity\\' . $filter)->findOneBy(['slug' => $dataFilter]);
                    if ($data !== null) {
                        $criteria[$filter] = $data;
                    }
                }
            }
        }

        return $criteria;
    }



}
