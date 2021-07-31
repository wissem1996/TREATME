<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"read"}},
 * collectionOperations={"get","post"={"denormalization_context"={"groups"={"patient_write"}}}},
 *  itemOperations={"get","put","patch","delete"}
 * )
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     *@Groups({"patient_write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     * @Groups({"read:patient"})
     */
    private $patientname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $dateofbirth;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $bloodgroup;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $mobilephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $text;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $Address;
        
    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $Disease;
        /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $DepartmentName;
     /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $BloodGroup;
     /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $Symptoms;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="patient")
     * @Groups({"read"})
     * @Groups({"patient_write"})
     */
    private $appointments;

    public function __construct()
    {
        $this->appointments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatientname(): ?string
    {
        return $this->patientname;
    }

    public function setPatientname(string $patientname): self
    {
        $this->patientname = $patientname;

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

    public function getDateofbirth(): ?string
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(string $dateofbirth): self
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    public function getBloodgroup(): ?string
    {
        return $this->bloodgroup;
    }

    public function setBloodgroup(string $bloodgroup): self
    {
        $this->bloodgroup = $bloodgroup;

        return $this;
    }

    public function getMobilephone(): ?string
    {
        return $this->mobilephone;
    }

    public function setMobilephone(string $mobilephone): self
    {
        $this->mobilephone = $mobilephone;

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
    public function getAppointments(): Collection
    {
        return $this->appointments;
    }

    public function addAppointment(Appointment $appointment): self
    {
        if (!$this->appointments->contains($appointment)) {
            $this->appointments[] = $appointment;
            $appointment->setPatient($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): self
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getPatient() === $this) {
                $appointment->setPatient(null);
            }
        }

        return $this;
    }
}
