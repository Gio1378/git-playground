<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NumberOfPersonsRepository")
 */
class NumberOfPersons
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
    private $guest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGuest(): ?string
    {
        return $this->guest;
    }

    public function setGuest(string $guest): self
    {
        $this->guest = $guest;

        return $this;
    }
}
