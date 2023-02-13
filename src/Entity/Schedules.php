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
    private ?\DateTimeInterface $openingHours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingHours = null;

    #[ORM\ManyToOne(inversedBy: 'schedules')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $admin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getDays(): ?string
    {
        return $this->days;
    }

    /**
     * @param string|null $days
     */
    public function setDays(?string $days): void
    {
        $this->days = $days;
    }


    public function getOpeningHours(): ?\DateTimeInterface
    {
        return $this->openingHours;
    }

    public function setOpeningHours(?\DateTimeInterface $openingHours): self
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    public function getClosingHours(): ?\DateTimeInterface
    {
        return $this->closingHours;
    }

    public function setClosingHours(?\DateTimeInterface $closingHours): self
    {
        $this->closingHours = $closingHours;

        return $this;
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
