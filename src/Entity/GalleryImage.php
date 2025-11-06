<?php

namespace App\Entity;

use App\Repository\GalleryImageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalleryImageRepository::class)]
class GalleryImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    private static string $currentLang = 'en';

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    // JSON translation storage
    #[ORM\Column(type: Types::JSON)]
    private array $alt = [];

    #[ORM\Column(type: Types::JSON)]
    private array $title = [];

    #[ORM\Column(type: Types::JSON)]
    private array $short_desc = [];

    #[ORM\Column(type: Types::JSON)]
    private array $name = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $modified_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToOne(inversedBy: 'galleryImages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gallery $parent = null;

    public function __construct()
    {
        $this->alt = [];
        $this->title = [];
        $this->short_desc = [];
        $this->name = [];
    }

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

    // Smart getters/setters
    public function getAlt(?string $lang = null): ?string
    {
        $lang = $lang ?? self::$currentLang;
        return $this->alt[$lang] ?? $this->alt['en'] ?? null;
    }

    public function setAlt(?string $value, ?string $lang = null): static
    {
        $lang = $lang ?? self::$currentLang;
        $this->alt[$lang] = $value;
        return $this;
    }

    public function getTitle(?string $lang = null): ?string
    {
        $lang = $lang ?? self::$currentLang;
        return $this->title[$lang] ?? $this->title['en'] ?? null;
    }

    public function setTitle(?string $value, ?string $lang = null): static
    {
        $lang = $lang ?? self::$currentLang;
        $this->title[$lang] = $value;
        return $this;
    }

    public function getShortDesc(?string $lang = null): ?string
    {
        $lang = $lang ?? self::$currentLang;
        return $this->short_desc[$lang] ?? $this->short_desc['en'] ?? null;
    }

    public function setShortDesc(?string $value, ?string $lang = null): static
    {
        $lang = $lang ?? self::$currentLang;
        $this->short_desc[$lang] = $value;
        return $this;
    }

    public function getName(?string $lang = null): ?string
    {
        $lang = $lang ?? self::$currentLang;
        return $this->name[$lang] ?? $this->name['en'] ?? null;
    }

    public function setName(?string $value, ?string $lang = null): static
    {
        $lang = $lang ?? self::$currentLang;
        $this->name[$lang] = $value;
        return $this;
    }

    // Methods to get/set all translations
    public function getAltTranslations(): array
    {
        return $this->alt;
    }

    public function setAltTranslations(array $alt): static
    {
        $this->alt = $alt;
        return $this;
    }

    public function getTitleTranslations(): array
    {
        return $this->title;
    }

    public function setTitleTranslations(array $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getShortDescTranslations(): array
    {
        return $this->short_desc;
    }

    public function setShortDescTranslations(array $short_desc): static
    {
        $this->short_desc = $short_desc;
        return $this;
    }

    public function getNameTranslations(): array
    {
        return $this->name;
    }

    public function setNameTranslations(array $name): static
    {
        $this->name = $name;
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

    public static function setCurrentLang(string $lang): void
    {
        self::$currentLang = $lang;
    }

    public static function getCurrentLang(): string
    {
        return self::$currentLang;
    }

    public function __toString(): string
    {
        return $this->getName() ?? '';
    }
}
