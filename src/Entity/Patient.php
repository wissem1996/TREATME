<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
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
    private $patient_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Date_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $blood_group;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mobile_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="Patient", orphanRemoval=true)
     */
    private $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatientName(): ?string
    {
        return $this->patient_name;
    }

    public function setPatientName(string $patient_name): self
    {
        $this->patient_name = $patient_name;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->Date_of_birth;
    }

    public function setDateOfBirth(string $Date_of_birth): self
    {
        $this->Date_of_birth = $Date_of_birth;

        return $this;
    }

    public function getBloodGroup(): ?string
    {
        return $this->blood_group;
    }

    public function setBloodGroup(string $blood_group): self
    {
        $this->blood_group = $blood_group;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->mobile_number;
    }

    public function setMobileNumber(string $mobile_number): self
    {
        $this->mobile_number = $mobile_number;

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

    /**
     * @return Collection|Appointment[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Appointment $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setPatient($this);
        }

        return $this;
    }

    public function removeYe(Appointment $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getPatient() === $this) {
                $ye->setPatient(null);
            }
        }

        return $this;
    }
}
