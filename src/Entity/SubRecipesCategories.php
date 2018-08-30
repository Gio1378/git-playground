<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubRecipesCategoriesRepository")
 */
class SubRecipesCategories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OffersRecipes", mappedBy="subCategory")
     */
    private $offersRecipes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RecipesCategories", inversedBy="subRecipesCategories")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recipes", mappedBy="subRecipesCategories")
     */
    private $recipes;

    public function __construct()
    {
        $this->offersRecipes = new ArrayCollection();
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

    /**
     * @return Collection|OffersRecipes[]
     */
    public function getOffersRecipes(): Collection
    {
        return $this->offersRecipes;
    }

    public function addOffersRecipe(OffersRecipes $offersRecipe): self
    {
        if (!$this->offersRecipes->contains($offersRecipe)) {
            $this->offersRecipes[] = $offersRecipe;
            $offersRecipe->setSubCategory($this);
        }

        return $this;
    }

    public function removeOffersRecipe(OffersRecipes $offersRecipe): self
    {
        if ($this->offersRecipes->contains($offersRecipe)) {
            $this->offersRecipes->removeElement($offersRecipe);
            // set the owning side to null (unless already changed)
            if ($offersRecipe->getSubCategory() === $this) {
                $offersRecipe->setSubCategory(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?RecipesCategories
    {
        return $this->category;
    }

    public function setCategory(?RecipesCategories $category): self
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
            $recipe->setSubRecipesCategories($this);
        }

        return $this;
    }

    public function removeRecipe(Recipes $recipe): self
    {
        if ($this->recipes->contains($recipe)) {
            $this->recipes->removeElement($recipe);
            // set the owning side to null (unless already changed)
            if ($recipe->getSubRecipesCategories() === $this) {
                $recipe->setSubRecipesCategories(null);
            }
        }

        return $this;
    }
}
