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
     * @ORM\Column(name="doctorname", type="string", length=255, nullable=false)
     */
    private $doctorname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="mobilephone", type="string", length=255, nullable=false)
     */
    private $mobilephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=255, nullable=false)
     */
    private $departement;

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
     * @ORM\Column(name="dutytiming", type="string", length=255, nullable=false)
     */
    private $dutytiming;

    /**
     * @var string
     *
     * @ORM\Column(name="specilaisation", type="string", length=255, nullable=false)
     */
    private $specilaisation;

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


}
