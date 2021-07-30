<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OxygenSupplierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OxygenSupplierRepository::class)
 */
class OxygenSupplier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=Oxygene::class, mappedBy="supplier")
     */
    private $oxygenes;

    public function __construct()
    {
        $this->oxygenes = new ArrayCollection();
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

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

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
     * @return Collection|Oxygene[]
     */
    public function getOxygenes(): Collection
    {
        return $this->oxygenes;
    }

    public function addOxygene(Oxygene $oxygene): self
    {
        if (!$this->oxygenes->contains($oxygene)) {
            $this->oxygenes[] = $oxygene;
            $oxygene->setSupplier($this);
        }

        return $this;
    }

    public function removeOxygene(Oxygene $oxygene): self
    {
        if ($this->oxygenes->removeElement($oxygene)) {
            // set the owning side to null (unless already changed)
            if ($oxygene->getSupplier() === $this) {
                $oxygene->setSupplier(null);
            }
        }

        return $this;
    }
}
