<?php

namespace App\Entity;

use App\Repository\AgeRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=AgeRepository::class)
 */
class Age
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
    private $code;

    /**
     * @Gedmo\Slug(fields={"code"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="age")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;


    public function getId(): ?int
    {
        return $this->id;
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
    
    public function getArticle(): ?Article
    {
        return $this->article;
    }
    
    public function setArticle(?Article $article): self
    {
        $this->article = $article;
        
        return $this;
    }
    
    public function __toString(): string
    {
        return $this->code;
    }
}
