<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payments
 *
 * @ORM\Table(name="payments", indexes={@ORM\Index(name="IDX_65D29B32654C1ECB", columns={"oxygen_id"}), @ORM\Index(name="IDX_65D29B326B899279", columns={"patient_id"}), @ORM\Index(name="IDX_65D29B322ADD6D8C", columns={"supplier_id"})})
 * @ORM\Entity
 */
class Payments
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=false)
     */
    private $createdAt;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tax", type="integer", nullable=true)
     */
    private $tax;

    /**
     * @var float|null
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

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
     * @var \Oxygene
     *
     * @ORM\ManyToOne(targetEntity="Oxygene")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oxygen_id", referencedColumnName="id")
     * })
     */
    private $oxygen;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     * })
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTax(): ?int
    {
        return $this->tax;
    }

    public function setTax(?int $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

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

    public function getOxygen(): ?Oxygene
    {
        return $this->oxygen;
    }

    public function setOxygen(?Oxygene $oxygen): self
    {
        $this->oxygen = $oxygen;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }


}
