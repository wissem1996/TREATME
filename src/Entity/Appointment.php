<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment", indexes={@ORM\Index(name="IDX_FE38F84487F4FB17", columns={"doctor_id"}), @ORM\Index(name="IDX_FE38F8446B899279", columns={"patient_id"})})
 * @ORM\Entity
 */
class Appointment
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="startdate", type="string", length=255, nullable=false)
     */
    private $startdate;

    /**
     * @var string
     *
     * @ORM\Column(name="enddate", type="string", length=255, nullable=false)
     */
    private $enddate;

    /**
     * @var string
     *
     * @ORM\Column(name="repeattime", type="string", length=255, nullable=false)
     */
    private $repeattime;

    /**
     * @var string
     *
     * @ORM\Column(name="symptom", type="string", length=255, nullable=false)
     */
    private $symptom;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     */
    private $location;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     * })
     */
    private $patient;

    /**
     * @var \Doctor
     *
     * @ORM\ManyToOne(targetEntity="Doctor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
     * })
     */
    private $doctor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStartdate(): ?string
    {
        return $this->startdate;
    }

    public function setStartdate(string $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEnddate(): ?string
    {
        return $this->enddate;
    }

    public function setEnddate(string $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getRepeattime(): ?string
    {
        return $this->repeattime;
    }

    public function setRepeattime(string $repeattime): self
    {
        $this->repeattime = $repeattime;

        return $this;
    }

    public function getSymptom(): ?string
    {
        return $this->symptom;
    }

    public function setSymptom(string $symptom): self
    {
        $this->symptom = $symptom;

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

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }

    public function setDoctor(?Doctor $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }


}
