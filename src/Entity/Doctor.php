<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DoctorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * 
 * collectionOperations={"get"={"normalization_context"={"groups"={"read:workday","read:doctor:collections","readappointments"}}}
 * ,"post"={"denormalization_context"={"groups"={"write : doctor"}}}
 * 
 * },
 *  itemOperations={"get"={"normalization_context"={"groups"={"read:doctor:item" ,"read:workday","readappointments"}}},
 * "put","patch"={"denormalization_context"={"groups"={"update : doctor"}}}
 * ,"delete"}
 * )
 * @ORM\Entity(repositoryClass=DoctorRepository::class)
 */
class Doctor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:doctor:collections"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:doctor","read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $doctorname;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $mobilephone;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $education;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $experience;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $dutytiming;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $specilaisation;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="doctor")
     *  @Groups({"read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $appointments;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:doctor","read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})s
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity=WorkDays::class, mappedBy="Doctor")
     * @Groups({"read:doctor","read:doctor:collections","write : doctor","read:doctor:item","update : doctor"})
     */
    private $workDays;

    public function __construct()
    {
        $this->appointments = new ArrayCollection();
        $this->workDays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDoctorname(): ?string
    {
        return $this->doctorname;
    }

    public function setDoctorname(string $doctorname): self
    {
        $this->doctorname = $doctorname;

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

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getEducation(): ?string
    {
        return $this->education;
    }

    public function setEducation(string $education): self
    {
        $this->education = $education;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDutytiming(): ?string
    {
        return $this->dutytiming;
    }

    public function setDutytiming(string $dutytiming): self
    {
        $this->dutytiming = $dutytiming;

        return $this;
    }

    public function getSpecilaisation(): ?string
    {
        return $this->specilaisation;
    }

    public function setSpecilaisation(string $specilaisation): self
    {
        $this->specilaisation = $specilaisation;

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
            $appointment->setDoctor($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): self
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getDoctor() === $this) {
                $appointment->setDoctor(null);
            }
        }

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|WorkDays[]
     */
    public function getWorkDays(): Collection
    {
        return $this->workDays;
    }

    public function addWorkDay(WorkDays $workDay): self
    {
        if (!$this->workDays->contains($workDay)) {
            $this->workDays[] = $workDay;
            $workDay->setDoctor($this);
        }

        return $this;
    }

    public function removeWorkDay(WorkDays $workDay): self
    {
        if ($this->workDays->removeElement($workDay)) {
            // set the owning side to null (unless already changed)
            if ($workDay->getDoctor() === $this) {
                $workDay->setDoctor(null);
            }
        }

        return $this;
    }
}
