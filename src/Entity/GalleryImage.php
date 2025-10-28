<?php

namespace App\Entity;

use App\Repository\GalleryImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalleryImageRepository::class)]
class GalleryImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    private ?string $alt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alt_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alt_en = null;

    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title_en = null;

    private ?string $short_desc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $short_desc_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $short_desc_en = null;

    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name_en = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $modified_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToOne(inversedBy: 'galleryImages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gallery $parent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getAltHu(): ?string
    {
        return $this->alt_hu;
    }

    public function setAltHu(?string $alt_hu): static
    {
        $this->alt_hu = $alt_hu;

        return $this;
    }

    public function getAltEn(): ?string
    {
        return $this->alt_en;
    }

    public function setAltEn(?string $alt_en): static
    {
        $this->alt_en = $alt_en;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTitleHu(): ?string
    {
        return $this->title_hu;
    }

    public function setTitleHu(?string $title_hu): static
    {
        $this->title_hu = $title_hu;

        return $this;
    }

    public function getTitleEn(): ?string
    {
        return $this->title_en;
    }

    public function setTitleEn(?string $title_en): static
    {
        $this->title_en = $title_en;

        return $this;
    }

    public function getShortDesc(): ?string
    {
        return $this->short_desc;
    }

    public function setShortDesc(?string $short_desc): static
    {
        $this->short_desc = $short_desc;

        return $this;
    }

    public function getShortDescHu(): ?string
    {
        return $this->short_desc_hu;
    }

    public function setShortDescHu(?string $short_desc_hu): static
    {
        $this->short_desc_hu = $short_desc_hu;

        return $this;
    }

    public function getShortDescEn(): ?string
    {
        return $this->short_desc_en;
    }

    public function setShortDescEn(?string $short_desc_en): static
    {
        $this->short_desc_en = $short_desc_en;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNameHu(): ?string
    {
        return $this->name_hu;
    }

    public function setNameHu(?string $name_hu): static
    {
        $this->name_hu = $name_hu;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(?string $name_en): static
    {
        $this->name_en = $name_en;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeImmutable
    {
        return $this->modified_at;
    }

    public function setModifiedAt(\DateTimeImmutable $modified_at): static
    {
        $this->modified_at = $modified_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getParent(): ?Gallery
    {
        return $this->parent;
    }

    public function setParent(?Gallery $parent): static
    {
        $this->parent = $parent;

        return $this;
    }
}
