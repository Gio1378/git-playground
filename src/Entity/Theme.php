<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class Theme
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
     * @ORM\OneToMany(targetEntity="App\Entity\SubTheme", mappedBy="theme")
     */
    private $subTheme;

    public function __construct()
    {
        $this->subTheme = new ArrayCollection();
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
     * @return Collection|SubTheme[]
     */
    public function getSubTheme(): Collection
    {
        return $this->subTheme;
    }

    public function addSubTheme(SubTheme $subTheme): self
    {
        if (!$this->subTheme->contains($subTheme)) {
            $this->subTheme[] = $subTheme;
            $subTheme->setTheme($this);
        }

        return $this;
    }

    public function removeSubTheme(SubTheme $subTheme): self
    {
        if ($this->subTheme->contains($subTheme)) {
            $this->subTheme->removeElement($subTheme);
            // set the owning side to null (unless already changed)
            if ($subTheme->getTheme() === $this) {
                $subTheme->setTheme(null);
            }
        }

        return $this;
    }
}
