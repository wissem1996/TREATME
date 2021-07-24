<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doctor
 *
 * @ORM\Table(name="doctor")
 * @ORM\Entity
 */
class Doctor
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
     * @var string
     *
     * @ORM\Column(name="doctor_name", type="string", length=255, nullable=false)
     */
    private $doctorName;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_phone", type="string", length=255, nullable=false)
     */
    private $mobilePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255, nullable=false)
     */
    private $department;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255, nullable=false)
     */
    private $education;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string", length=255, nullable=false)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255, nullable=false)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="duty_timing", type="string", length=255, nullable=false)
     */
    private $dutyTiming;

    /**
     * @var string
     *
     * @ORM\Column(name="specialisation", type="string", length=255, nullable=false)
     */
    private $specialisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDoctorName(): ?string
    {
        return $this->doctorName;
    }

    public function setDoctorName(string $doctorName): self
    {
        $this->doctorName = $doctorName;

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

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

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

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

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

    public function getDutyTiming(): ?string
    {
        return $this->dutyTiming;
    }

    public function setDutyTiming(string $dutyTiming): self
    {
        $this->dutyTiming = $dutyTiming;

        return $this;
    }

    public function getSpecialisation(): ?string
    {
        return $this->specialisation;
    }

    public function setSpecialisation(string $specialisation): self
    {
        $this->specialisation = $specialisation;

        return $this;
    }


}
