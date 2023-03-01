<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[Vich\Uploadable]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255, nullable: false)]
    private string $title;

    #[ORM\Column(length: 255)]
    private ?string $file = null;

    #[Vich\UploadableField(mapping:"galerie_images", fileNameProperty:"file")]
    private ?File $imageFile;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $admin = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(?string $file): void
    {
        $this->file = $file;
    }

    public function getImageFile(): File
    {
        return $this->imageFile;
    }

    public function setImageFile(File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

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
