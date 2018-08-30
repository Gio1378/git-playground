<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffersReceipesRepository")
 */
class OffersRecipes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptions;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $author;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $difficulty;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $cookingTime;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $prepTime;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $breakTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Theme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RecipesCategories", inversedBy="offersRecipes")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SubRecipesCategories", inversedBy="offersRecipes")
     */
    private $subCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptions(): ?string
    {
        return $this->descriptions;
    }

    public function setDescriptions(string $descriptions): self
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

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

    public function getCookingTime(): ?string
    {
        return $this->cookingTime;
    }

    public function setCookingTime(?string $cookingTime): self
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getPrepTime(): ?string
    {
        return $this->prepTime;
    }

    public function setPrepTime(?string $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getBreakTime(): ?string
    {
        return $this->breakTime;
    }

    public function setBreakTime(?string $breakTime): self
    {
        $this->breakTime = $breakTime;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->Theme;
    }

    public function setTheme(string $Theme): self
    {
        $this->Theme = $Theme;

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

    public function getSubCategory(): ?SubRecipesCategories
    {
        return $this->subCategory;
    }

    public function setSubCategory(?SubRecipesCategories $subCategory): self
    {
        $this->subCategory = $subCategory;

        return $this;
    }
}
