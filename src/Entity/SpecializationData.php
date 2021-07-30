<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SpecializationDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SpecializationDataRepository::class)
 */
class SpecializationData
{
    /**
     * @ORM\Column(type="string" , length=255)
     */
    private $id;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $departmentid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Color;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartmentid(): ?int
    {
        return $this->departmentid;
    }

    public function setDepartmentid(int $departmentid): self
    {
        $this->departmentid = $departmentid;

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

    public function getColor(): ?string
    {
        return $this->Color;
    }

    public function setColor(string $Color): self
    {
        $this->Color = $Color;

        return $this;
    }
}
