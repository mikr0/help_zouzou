<?php

namespace App\Entity;

use App\Repository\PurposeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PurposeRepository::class)
 */
class Purpose
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vehicle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $accommodation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="purpose")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $support;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicle(): ?bool
    {
        return $this->vehicle;
    }

    public function setVehicle(bool $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getAccommodation(): ?bool
    {
        return $this->accommodation;
    }

    public function setAccommodation(bool $accommodation): self
    {
        $this->accommodation = $accommodation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSupport(): ?bool
    {
        return $this->support;
    }

    public function setSupport(bool $support): self
    {
        $this->support = $support;

        return $this;
    }
}
