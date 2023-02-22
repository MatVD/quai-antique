<?php

namespace App\Entity;

use App\Repository\TablesRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TablesRepository::class)]
class Tables
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $seats = 0;

    #[ORM\Column(nullable: false)]
    private bool $free;

    #[ORM\Column(nullable: true)]
    private ?string $reservation_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTime $arrival_time;

    #[ORM\Column(nullable: true)]
    private array|string|null $allergies;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getReservationName(): ?string
    {
        return $this->reservation_name;
    }

    /**
     * @param string|null $reservation_name
     */
    public function setReservationName(?string $reservation_name): void
    {
        $this->reservation_name = $reservation_name;
    }


    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function isFree(): bool
    {
        return $this->free;
    }

    public function setFree(bool $free): self
    {
        $this->free = $free;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(?\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getArrivalTime(): ?\DateTime
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(?\DateTime $arrival_time): self
    {
        $this->arrival_time = $arrival_time;

        return $this;
    }

    public function getAllergies(): array|string|null
    {
        return $this->allergies;
    }

    public function setAllergies(array|string|null $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }
}
