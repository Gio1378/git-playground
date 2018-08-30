<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubThemeRepository")
 */
class SubTheme
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="subTheme")
     */
    private $theme;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\OffersRecipes", mappedBy="subTheme")
     */
    private $offersRecipes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Recipes", mappedBy="subThemes")
     */
    private $recipes;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
        $this->offersRecipes = new ArrayCollection();

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

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

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
            $offersRecipe->addSubTheme($this);
        }

        return $this;
    }

    public function removeOffersRecipe(OffersRecipes $offersRecipe): self
    {
        if ($this->offersRecipes->contains($offersRecipe)) {
            $this->offersRecipes->removeElement($offersRecipe);
            $offersRecipe->removeSubTheme($this);
        }

        return $this;
    }

    /**
     * @return Collection|Recipes[]
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipes(Recipes $recipes): self
    {
        if (!$this->recipes->contains($recipes)) {
            $this->recipes[] = $recipes;
            $recipes->addSubTheme($this);
        }

        return $this;
    }

    public function removeRecipes(Recipes $recipes): self
    {
        if ($this->recipes->contains($recipes)) {
            $this->recipes->removeElement($recipes);
            $recipes->removeSubTheme($this);
        }

        return $this;
    }
}
