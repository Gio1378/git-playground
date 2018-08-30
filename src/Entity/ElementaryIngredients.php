<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=100, unique=true)
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

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Recipes", mappedBy="relatedPrincipalIngredient")
     */
    private $recipes;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }


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

    /**
     * @return Collection|Recipes[]
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipes $recipe): self
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes[] = $recipe;
            $recipe->addRelatedPrincipalIngredient($this);
        }

        return $this;
    }

    public function removeRecipe(Recipes $recipe): self
    {
        if ($this->recipes->contains($recipe)) {
            $this->recipes->removeElement($recipe);
            $recipe->removeRelatedPrincipalIngredient($this);
        }

        return $this;
    }
}
