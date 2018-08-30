<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecettesRepository")
 */
class Recettes
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
    private $noms;

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
    private $pmaking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoms(): ?string
    {
        return $this->noms;
    }

    public function setNoms(string $noms): self
    {
        $this->noms = $noms;

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

    public function getPmaking(): ?string
    {
        return $this->pmaking;
    }

    public function setPmaking(string $pmaking): self
    {
        $this->pmaking = $pmaking;

        return $this;
    }
}
