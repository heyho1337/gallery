<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalleryRepository::class)]
class Gallery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    private static string $currentLang = 'en';

    // JSON translation storage
    #[ORM\Column(type: Types::JSON)]
    private array $name = [];

    #[ORM\Column(type: Types::JSON)]
    private array $title = [];

    #[ORM\Column(type: Types::JSON)]
    private array $meta_desc = [];

    #[ORM\Column(type: Types::JSON)]
    private array $slug = [];

    #[ORM\Column(type: Types::JSON)]
    private array $text = [];

    #[ORM\Column(type: Types::JSON)]
    private array $short_desc = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $modified_at = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, GalleryImage>
     */
    #[ORM\OneToMany(targetEntity: GalleryImage::class, mappedBy: 'parent', orphanRemoval: true)]
    private Collection $galleryImages;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->galleryImages = new ArrayCollection();
        $this->name = [];
        $this->title = [];
        $this->meta_desc = [];
        $this->slug = [];
        $this->text = [];
        $this->short_desc = [];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // Smart getters/setters
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

    public function getMetaDesc(?string $lang = null): ?string
    {
        $lang = $lang ?? self::$currentLang;
        return $this->meta_desc[$lang] ?? $this->meta_desc['en'] ?? null;
    }

    public function setMetaDesc(?string $value, ?string $lang = null): static
    {
        $lang = $lang ?? self::$currentLang;
        $this->meta_desc[$lang] = $value;
        return $this;
    }

    public function getSlug(?string $lang = null): ?string
    {
        $lang = $lang ?? self::$currentLang;
        return $this->slug[$lang] ?? $this->slug['en'] ?? null;
    }

    public function setSlug(?string $value, ?string $lang = null): static
    {
        $lang = $lang ?? self::$currentLang;
        $this->slug[$lang] = $value;
        return $this;
    }

    public function getText(?string $lang = null): ?string
    {
        $lang = $lang ?? self::$currentLang;
        return $this->text[$lang] ?? $this->text['en'] ?? null;
    }

    public function setText(?string $value, ?string $lang = null): static
    {
        $lang = $lang ?? self::$currentLang;
        $this->text[$lang] = $value;
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

    // Methods to get/set all translations
    public function getNameTranslations(): array
    {
        return $this->name;
    }

    public function setNameTranslations(array $name): static
    {
        $this->name = $name;
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

    public function getMetaDescTranslations(): array
    {
        return $this->meta_desc;
    }

    public function setMetaDescTranslations(array $meta_desc): static
    {
        $this->meta_desc = $meta_desc;
        return $this;
    }

    public function getSlugTranslations(): array
    {
        return $this->slug;
    }

    public function setSlugTranslations(array $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function getTextTranslations(): array
    {
        return $this->text;
    }

    public function setTextTranslations(array $text): static
    {
        $this->text = $text;
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;
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

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;
        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(self $child): static
    {
        if (!$this->children->contains($child)) {
            $this->children->add($child);
            $child->setParent($this);
        }
        return $this;
    }

    public function removeChild(self $child): static
    {
        if ($this->children->removeElement($child)) {
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Collection<int, GalleryImage>
     */
    public function getGalleryImages(): Collection
    {
        return $this->galleryImages;
    }

    public function addGalleryImage(GalleryImage $galleryImage): static
    {
        if (!$this->galleryImages->contains($galleryImage)) {
            $this->galleryImages->add($galleryImage);
            $galleryImage->setParent($this);
        }
        return $this;
    }

    public function removeGalleryImage(GalleryImage $galleryImage): static
    {
        if ($this->galleryImages->removeElement($galleryImage)) {
            if ($galleryImage->getParent() === $this) {
                $galleryImage->setParent(null);
            }
        }
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

    public function getImagePaths(): array
    {
        return $this->galleryImages->map(fn($img) => $img->getImage())->toArray();
    }
}
