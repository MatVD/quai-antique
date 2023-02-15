<?php

namespace App\Entity;

use App\Repository\SchedulesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedulesRepository::class)]
class Schedules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $days = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $AMopeningHours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $AMclosingHours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $PMopeningHours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $PMclosingHours = null;

    #[ORM\ManyToOne(inversedBy: 'schedules')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $admin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAMopeningHours(): ?\DateTimeInterface
    {
        return $this->AMopeningHours;
    }


    public function setAMopeningHours(?\DateTimeInterface $AMopeningHours): void
    {
        $this->AMopeningHours = $AMopeningHours;
    }

    public function getAMclosingHours(): ?\DateTimeInterface
    {
        return $this->AMclosingHours;
    }

    public function setAMclosingHours(?\DateTimeInterface $AMclosingHours): void
    {
        $this->AMclosingHours = $AMclosingHours;
    }

    public function getPMopeningHours(): ?\DateTimeInterface
    {
        return $this->PMopeningHours;
    }

    public function setPMopeningHours(?\DateTimeInterface $PMopeningHours): void
    {
        $this->PMopeningHours = $PMopeningHours;
    }

    public function getPMclosingHours(): ?\DateTimeInterface
    {
        return $this->PMclosingHours;
    }

    public function setPMclosingHours(?\DateTimeInterface $PMclosingHours): void
    {
        $this->PMclosingHours = $PMclosingHours;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(?string $days): void
    {
        $this->days = $days;
    }

    public function getAdmin(): ?User
    {
        return $this->admin;
    }

    public function setAdmin(?User $admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
