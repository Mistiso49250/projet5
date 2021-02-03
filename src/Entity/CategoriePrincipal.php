<?php

namespace App\Entity;

use App\Repository\CategoriePrincipalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=CategoriePrincipalRepository::class)
 */
class CategoriePrincipal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @Gedmo\Slug(fields={"description"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=CategorieSecondaire::class, mappedBy="categoriePrincipal")
     */
    private $secondaire;



    public function __construct()
    {
        $this->secondaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    // public function setSlug(string $slug): self
    // {
    //     $this->slug = $slug;

    //     return $this;
    // }

    /**
     * @return Collection|CategorieSecondaire[]
     */
    public function getSecondaire(): Collection
    {
        return $this->secondaire;
    }

    public function addSecondaire(CategorieSecondaire $secondaire): self
    {
        if (!$this->secondaire->contains($secondaire)) {
            $this->secondaire[] = $secondaire;
            $secondaire->setCategoriePrincipal($this);
        }

        return $this;
    }

    public function removeSecondaire(CategorieSecondaire $secondaire): self
    {
        if ($this->secondaire->removeElement($secondaire)) {
            // set the owning side to null (unless already changed)
            if ($secondaire->getCategoriePrincipal() === $this) {
                $secondaire->setCategoriePrincipal(null);
            }
        }

        return $this;
    }

}
