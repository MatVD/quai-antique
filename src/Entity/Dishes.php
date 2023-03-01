<?php

namespace App\Entity;

use App\Repository\DishRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DishRepository::class)]
class Dishes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255, nullable: false)]
    private string $title;

    #[ORM\Column(type: Types::TEXT, nullable: false)]
    private string $description;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: false)]
    private string $price;

    #[ORM\ManyToOne(targetEntity: Categories::class, inversedBy: 'dishes')]
    private Categories $category;

    #[ORM\ManyToOne(inversedBy: 'dishes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $admin = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): Categories
    {
        return $this->category;
    }

    public function setCategory(Categories $category): self
    {
        $this->category = $category;

        return $this;
    }


    public function __toString(): string
    {
        return $this->title;
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
