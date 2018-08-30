<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecettesRepository")
 */
class Recipes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $difficulty;

    /**
     * @ORM\Column(type="text")
     */
    private $ingredients;

    /**
     * @ORM\Column(type="text")
     */
    private $making;

    /**
     * @ORM\Column(type="text")
     */
    private $ingredient;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ElementaryIngredients", inversedBy="recipes")
     */
    private $relatedPrincipalIngredient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CookingTime")
     */
    private $cookingTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PreparationTime")
     */
    private $prepTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NumberOfPersons", inversedBy="recipes")
     */
    private $nbOfPersons;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NumberOfViews", mappedBy="recipes")
     */
    private $numberOfViews;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="recipe")
     */
    private $comments;

    public function __construct()
    {
        $this->relatedPrincipalIngredient = new ArrayCollection();
        $this->numberOfViews = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(?int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }


    public function getMaking(): ?string
    {
        return $this->making;
    }

    public function setMaking(string $making): self
    {
        $this->making = $making;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * @return Collection|ElementaryIngredients[]
     */
    public function getRelatedPrincipalIngredient(): Collection
    {
        return $this->relatedPrincipalIngredient;
    }

    public function addRelatedPrincipalIngredient(ElementaryIngredients $relatedPrincipalIngredient): self
    {
        if (!$this->relatedPrincipalIngredient->contains($relatedPrincipalIngredient)) {
            $this->relatedPrincipalIngredient[] = $relatedPrincipalIngredient;
        }

        return $this;
    }

    public function removeRelatedPrincipalIngredient(ElementaryIngredients $relatedPrincipalIngredient): self
    {
        if ($this->relatedPrincipalIngredient->contains($relatedPrincipalIngredient)) {
            $this->relatedPrincipalIngredient->removeElement($relatedPrincipalIngredient);
        }

        return $this;
    }

    public function getCookingTime(): ?CookingTime
    {
        return $this->cookingTime;
    }

    public function setCookingTime(?CookingTime $cookingTime): self
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getPrepTime(): ?PreparationTime
    {
        return $this->prepTime;
    }

    public function setPrepTime(?PreparationTime $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getNbOfPersons(): ?NumberOfPersons
    {
        return $this->nbOfPersons;
    }

    public function setNbOfPersons(?NumberOfPersons $nbOfPersons): self
    {
        $this->nbOfPersons = $nbOfPersons;

        return $this;
    }

    /**
     * @return Collection|NumberOfViews[]
     */
    public function getNumberOfViews(): Collection
    {
        return $this->numberOfViews;
    }

    public function addNumberOfView(NumberOfViews $numberOfView): self
    {
        if (!$this->numberOfViews->contains($numberOfView)) {
            $this->numberOfViews[] = $numberOfView;
            $numberOfView->setRecipes($this);
        }

        return $this;
    }

    public function removeNumberOfView(NumberOfViews $numberOfView): self
    {
        if ($this->numberOfViews->contains($numberOfView)) {
            $this->numberOfViews->removeElement($numberOfView);
            // set the owning side to null (unless already changed)
            if ($numberOfView->getRecipes() === $this) {
                $numberOfView->setRecipes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setRecipe($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getRecipe() === $this) {
                $comment->setRecipe(null);
            }
        }

        return $this;
    }

}
