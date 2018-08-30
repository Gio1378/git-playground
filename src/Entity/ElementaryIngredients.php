<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ElementaryIngredientsRepository")
 */
class ElementaryIngredients
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $technicalSheet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductCategories", inversedBy="elementaryIngredients")
     */
    private $category;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getTechnicalSheet(): ?string
    {
        return $this->technicalSheet;
    }

    public function setTechnicalSheet(?string $technicalSheet): self
    {
        $this->technicalSheet = $technicalSheet;

        return $this;
    }

    public function getCategory(): ?ProductCategories
    {
        return $this->category;
    }

    public function setCategory(?ProductCategories $category): self
    {
        $this->category = $category;

        return $this;
    }
}
