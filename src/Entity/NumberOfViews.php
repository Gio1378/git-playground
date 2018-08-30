<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NumberOfViewsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class NumberOfViews
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $viewedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipes", inversedBy="numberOfViews")
     */
    private $recipes;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getViewedAt(): ?\DateTimeInterface
    {
        return $this->viewedAt;
    }

    public function setViewedAt(\DateTimeInterface $viewedAt): self
    {
        $this->viewedAt = $viewedAt;

        return $this;
    }

    public function getRecipes(): ?Recipes
    {
        return $this->recipes;
    }

    public function setRecipes(?Recipes $recipes): self
    {
        $this->recipes = $recipes;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersistEvent(){
        $this->createdAt = new \DateTime();
    }
}
