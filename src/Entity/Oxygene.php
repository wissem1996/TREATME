<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OxygeneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OxygeneRepository::class)
 */
class Oxygene
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $WaterCapcity;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $OxygeneCapacity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=OxygenSupplier::class, inversedBy="oxygenes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $supplier;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWaterCapcity(): ?string
    {
        return $this->WaterCapcity;
    }

    public function setWaterCapcity(?string $WaterCapcity): self
    {
        $this->WaterCapcity = $WaterCapcity;

        return $this;
    }

    public function getOxygeneCapacity(): ?string
    {
        return $this->OxygeneCapacity;
    }

    public function setOxygeneCapacity(?string $OxygeneCapacity): self
    {
        $this->OxygeneCapacity = $OxygeneCapacity;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSupplier(): ?OxygenSupplier
    {
        return $this->supplier;
    }

    public function setSupplier(?OxygenSupplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }
}
