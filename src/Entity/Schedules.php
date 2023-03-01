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
    private int $id;

    #[ORM\Column(type: Types::TEXT, nullable: false)]
    private string $days;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $AMopeningHours = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $AMclosingHours = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $PMopeningHours = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $PMclosingHours = null;

    #[ORM\ManyToOne(inversedBy: 'schedules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $admin = null;

    public function getId(): int
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

    public function getDays(): string
    {
        return $this->days;
    }

    public function setDays(string $days): void
    {
        $this->days = $days;
    }

    public function getAdmin(): ?Users
    {
        return $this->admin;
    }

    public function setAdmin(?Users $admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
