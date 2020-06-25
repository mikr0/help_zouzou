<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=Destination::class, cascade={"persist"}, inversedBy="users")
     */
    private $destination;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vehicle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $accommodation;



    /**
     * @ORM\Column(type="boolean")
     */
    private $support;



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

    public function getSupport(): ?bool
    {
        return $this->support;
    }

    public function setSupport(bool $support): self
    {
        $this->support = $support;

        return $this;
    }

public function __construct()
    {
        $this->purpose = new ArrayCollection();
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->destination;
    }

    public function setDestination(?Destination $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return Collection|Purpose[]
     */
    public function getPurpose(): Collection
    {
        return $this->purpose;
    }

    public function addPurpose(Purpose $purpose): self
    {
        if (!$this->purpose->contains($purpose)) {
            $this->purpose[] = $purpose;
            $purpose->setUser($this);
        }

        return $this;
    }

    public function removePurpose(Purpose $purpose): self
    {
        if ($this->purpose->contains($purpose)) {
            $this->purpose->removeElement($purpose);
            // set the owning side to null (unless already changed)
            if ($purpose->getUser() === $this) {
                $purpose->setUser(null);
            }
        }

        return $this;
    }
}
