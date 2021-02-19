<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $garçon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mixte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGarçon(): ?string
    {
        return $this->garçon;
    }

    public function setGarçon(string $garçon): self
    {
        $this->garçon = $garçon;

        return $this;
    }

    public function getFille(): ?string
    {
        return $this->fille;
    }

    public function setFille(string $fille): self
    {
        $this->fille = $fille;

        return $this;
    }

    public function getMixte(): ?string
    {
        return $this->mixte;
    }

    public function setMixte(string $mixte): self
    {
        $this->mixte = $mixte;

        return $this;
    }
}
