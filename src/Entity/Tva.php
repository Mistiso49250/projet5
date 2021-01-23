<?php

namespace App\Entity;

use App\Repository\TvaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TvaRepository::class)
 */
class Tva
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $valeurTVA;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeurTVA(): ?string
    {
        return $this->valeurTVA;
    }

    public function setValeurTVA(string $valeurTVA): self
    {
        $this->valeurTVA = $valeurTVA;

        return $this;
    }
}
