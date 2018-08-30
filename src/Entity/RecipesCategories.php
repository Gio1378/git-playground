<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipesCategoriesRepository")
 */
class RecipesCategories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OffersRecipes", mappedBy="category")
     */
    private $offersRecipes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubRecipesCategories", mappedBy="category")
     */
    private $subRecipesCategories;

    public function __construct()
    {
        $this->offersRecipes = new ArrayCollection();
        $this->subRecipesCategories = new ArrayCollection();
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
            $offersRecipe->setCategory($this);
        }

        return $this;
    }

    public function removeOffersRecipe(OffersRecipes $offersRecipe): self
    {
        if ($this->offersRecipes->contains($offersRecipe)) {
            $this->offersRecipes->removeElement($offersRecipe);
            // set the owning side to null (unless already changed)
            if ($offersRecipe->getCategory() === $this) {
                $offersRecipe->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SubRecipesCategories[]
     */
    public function getSubRecipesCategories(): Collection
    {
        return $this->subRecipesCategories;
    }

    public function addSubRecipesCategory(SubRecipesCategories $subRecipesCategory): self
    {
        if (!$this->subRecipesCategories->contains($subRecipesCategory)) {
            $this->subRecipesCategories[] = $subRecipesCategory;
            $subRecipesCategory->setCategory($this);
        }

        return $this;
    }

    public function removeSubRecipesCategory(SubRecipesCategories $subRecipesCategory): self
    {
        if ($this->subRecipesCategories->contains($subRecipesCategory)) {
            $this->subRecipesCategories->removeElement($subRecipesCategory);
            // set the owning side to null (unless already changed)
            if ($subRecipesCategory->getCategory() === $this) {
                $subRecipesCategory->setCategory(null);
            }
        }

        return $this;
    }
}
