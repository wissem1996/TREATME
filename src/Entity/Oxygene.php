<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Oxygene
 *
 * @ORM\Table(name="oxygene", indexes={@ORM\Index(name="IDX_DD6AFBEF2ADD6D8C", columns={"supplier_id"})})
 * @ORM\Entity
 */
class Oxygene
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="water_capcity", type="string", length=5, nullable=true)
     */
    private $waterCapcity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oxygene_capacity", type="string", length=10, nullable=true)
     */
    private $oxygeneCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255, nullable=false)
     */
    private $price;

    /**
     * @var \OxygenSupplier
     *
     * @ORM\ManyToOne(targetEntity="OxygenSupplier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="supplier_id", referencedColumnName="id")
     * })
     */
    private $supplier;

    /**
     * @ORM\OneToMany(targetEntity=Payments::class, mappedBy="oxygen", orphanRemoval=true)
     */
    private $payments;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWaterCapcity(): ?string
    {
        return $this->waterCapcity;
    }

    public function setWaterCapcity(?string $waterCapcity): self
    {
        $this->waterCapcity = $waterCapcity;

        return $this;
    }

    public function getOxygeneCapacity(): ?string
    {
        return $this->oxygeneCapacity;
    }

    public function setOxygeneCapacity(?string $oxygeneCapacity): self
    {
        $this->oxygeneCapacity = $oxygeneCapacity;

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

    /**
     * @return Collection|Payments[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payments $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setOxygen($this);
        }

        return $this;
    }

    public function removePayment(Payments $payment): self
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getOxygen() === $this) {
                $payment->setOxygen(null);
            }
        }

        return $this;
    }


}
