<?php

namespace App\Entity;

use App\Repository\CategorieSecondaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=CategorieSecondaireRepository::class)
 */
class CategorieSecondaire
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
     * @ORM\ManyToOne(targetEntity=CategoriePrincipal::class, inversedBy="secondaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoriePrincipal;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, mappedBy="secondaire")
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

    public function getCategoriePrincipal(): ?CategoriePrincipal
    {
        return $this->categoriePrincipal;
    }

    public function setCategoriePrincipal(?CategoriePrincipal $categoriePrincipal): self
    {
        $this->categoriePrincipal = $categoriePrincipal;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getSecondaire(): Collection
    {
        return $this->secondaire;
    }

    public function addSecondaire(Categorie $secondaire): self
    {
        if (!$this->secondaire->contains($secondaire)) {
            $this->secondaire[] = $secondaire;
            $secondaire->addSecondaire($this);
        }

        return $this;
    }

    public function removeSecondaire(Categorie $secondaire): self
    {
        if ($this->secondaire->removeElement($secondaire)) {
            $secondaire->removeSecondaire($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->code . '-' . $this->description;
    }
}
