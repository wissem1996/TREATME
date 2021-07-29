<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WorkDaysRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=WorkDaysRepository::class)
 */
class WorkDays
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $BreakEndHour;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $BreakStartHour;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $Day;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $Enable;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $dex;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $State;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $WorkEndHour;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:workday"})
     */
    private $WorkStartHour;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="workDays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Doctor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBreakEndHour(): ?string
    {
        return $this->BreakEndHour;
    }

    public function setBreakEndHour(string $BreakEndHour): self
    {
        $this->BreakEndHour = $BreakEndHour;

        return $this;
    }

    public function getBreakStartHour(): ?string
    {
        return $this->BreakStartHour;
    }

    public function setBreakStartHour(string $BreakStartHour): self
    {
        $this->BreakStartHour = $BreakStartHour;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->Day;
    }

    public function setDay(string $Day): self
    {
        $this->Day = $Day;

        return $this;
    }

    public function getEnable(): ?string
    {
        return $this->Enable;
    }

    public function setEnable(string $Enable): self
    {
        $this->Enable = $Enable;

        return $this;
    }

    public function getDex(): ?string
    {
        return $this->dex;
    }

    public function setDex(string $dex): self
    {
        $this->dex = $dex;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->State;
    }

    public function setState(string $State): self
    {
        $this->State = $State;

        return $this;
    }

    public function getWorkEndHour(): ?string
    {
        return $this->WorkEndHour;
    }

    public function setWorkEndHour(string $WorkEndHour): self
    {
        $this->WorkEndHour = $WorkEndHour;

        return $this;
    }

    public function getWorkStartHour(): ?string
    {
        return $this->WorkStartHour;
    }

    public function setWorkStartHour(string $WorkStartHour): self
    {
        $this->WorkStartHour = $WorkStartHour;

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->Doctor;
    }

    public function setDoctor(?Doctor $Doctor): self
    {
        $this->Doctor = $Doctor;

        return $this;
    }
}
