<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
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
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="destination")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Clinic::class, mappedBy="destination")
     */
    private $clinic;

    /**
     * @ORM\Column(type="date")
     */
    private $arrival;

    /**
     * @ORM\Column(type="date")
     */
    private $departure;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->clinic = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setDestination($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getDestination() === $this) {
                $user->setDestination(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Clinic[]
     */
    public function getClinic(): Collection
    {
        return $this->clinic;
    }

    public function addClinic(Clinic $clinic): self
    {
        if (!$this->clinic->contains($clinic)) {
            $this->clinic[] = $clinic;
            $clinic->setDestination($this);
        }

        return $this;
    }

    public function removeClinic(Clinic $clinic): self
    {
        if ($this->clinic->contains($clinic)) {
            $this->clinic->removeElement($clinic);
            // set the owning side to null (unless already changed)
            if ($clinic->getDestination() === $this) {
                $clinic->setDestination(null);
            }
        }

        return $this;
    }

    public function getArrival(): ?\DateTimeInterface
    {
        return $this->arrival;
    }

    public function setArrival(\DateTimeInterface $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getDeparture(): ?\DateTimeInterface
    {
        return $this->departure;
    }

    public function setDeparture(\DateTimeInterface $departure): self
    {
        $this->departure = $departure;

        return $this;
    }
}
