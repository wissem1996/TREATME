<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"read:appointment"}},
 * collectionOperations={"get","post"={"denormalization_context"={"groups"={"write : appointment"}}}
 * 
 * },
 *  itemOperations={"get"={"normalization_context"={"groups"={"read:appointment:item" , "read:patient" , "read:doctor"}}},
 * "put","patch"={"denormalization_context"={"groups"={"update : appointment"}}}
 * ,"delete"}
 * )
 * @ORM\Entity(repositoryClass=AppointmentRepository::class)
 */
class Appointment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:appointment:item","read:appointment","write : appointment" , "readappointments"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="appointments")
     *@Groups({"read:appointment:item","read:appointment","write : appointment" , "update : appointment"})
     */
    private $doctor;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="appointments")
     * @Groups({"read:appointment:item","read:appointment","write : appointment"})
     */
    private $patient;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:appointment:item","read:appointment","write : appointment" , "readappointments"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:appointment:item","read:appointment","write : appointment"})
     */
    private $startdate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:appointment:item","read:appointment","write : appointment"})
     */
    private $enddate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:appointment:item","read:appointment","write : appointment"})
     */
    private $repeattime;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:appointment:item","read:appointment","write : appointment","update : appointment"})
     */
    private $symptoms;
    /**
     * @ORM\Column(type="string", length=255)
     *@Groups({"read:appointment:item","read:appointment","write : appointment","update : appointment"})
     */
    private $location;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
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
}
