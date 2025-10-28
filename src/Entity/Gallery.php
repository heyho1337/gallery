<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: GalleryRepository::class)]
class Gallery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    private static string $currentLang = 'en';

    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name_en = null;

    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title_en = null;

    private ?string $meta_desc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $meta_desc_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $meta_desc_en = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $modified_at = null;

    #[ORM\Column]
    private ?bool $active = null;

    private ?string $slug = null;

    #[Gedmo\Slug(fields: ['name_hu'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug_hu = null;

    #[Gedmo\Slug(fields: ['name_en'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug_en = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    private ?string $text = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text_hu = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text_en = null;

    /**
     * @var Collection<int, GalleryImage>
     */
    #[ORM\OneToMany(targetEntity: GalleryImage::class, mappedBy: 'parent', orphanRemoval: true)]
    private Collection $galleryImages;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $short_desc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $short_desc_hu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $short_desc_en = null;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->galleryImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMetaDesc(): ?string
    {
        return $this->meta_desc;
    }

    public function setMetaDesc(?string $meta_desc): static
    {
        $this->meta_desc = $meta_desc;

        return $this;
    }

    public function getMetaDescHu(): ?string
    {
        return $this->meta_desc_hu;
    }

    public function setMetaDescHu(?string $meta_desc_hu): static
    {
        $this->meta_desc_hu = $meta_desc_hu;

        return $this;
    }

    public function getMetaDescEn(): ?string
    {
        return $this->meta_desc_en;
    }

    public function setMetaDescEn(?string $meta_desc_en): static
    {
        $this->meta_desc_en = $meta_desc_en;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlugHu(): ?string
    {
        return $this->slug_hu;
    }

    public function setSlugHu(?string $slug_hu): static
    {
        $this->slug_hu = $slug_hu;

        return $this;
    }

    public function getSlugEn(): ?string
    {
        return $this->slug_en;
    }

    public function setSlugEn(?string $slug_en): static
    {
        $this->slug_en = $slug_en;

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
            // set the owning side to null (unless already changed)
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getTextHu(): ?string
    {
        return $this->text_hu;
    }

    public function setTextHu(?string $text_hu): static
    {
        $this->text_hu = $text_hu;

        return $this;
    }

    public function getTextEn(): ?string
    {
        return $this->text_en;
    }

    public function setTextEn(?string $text_en): static
    {
        $this->text_en = $text_en;

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
            // set the owning side to null (unless already changed)
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

    public function __toString(): string
    {
        $getter = 'getName' . self::$currentLang;
        if (method_exists($this, $getter)) {
            return (string) $this->$getter();
        }

        return '';
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

    public function getImagePaths(): array
    {
        return $this->galleryImages->map(fn($img) => $img->getImage())->toArray();
    }
}
