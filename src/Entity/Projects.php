<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectsRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ProjectsRepository::class)]
#[Vich\Uploadable]
class Projects
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type:'string', length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $github_link = null;

    #[ORM\Column(length: 255)]
    private ?string $website_link = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank()]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)] 
    private ?\DateTimeImmutable $update_At = null;

    #[ORM\ManyToMany(targetEntity: Langages::class, inversedBy: 'Langage')]
    private Collection $langages;

    #[ORM\Column(length: 255, type:'string', nullable: true)]
    private ?string $screen_name = null;

    #[Vich\UploadableField(mapping: 'screenProject', fileNameProperty: 'screen_name')]
    private ?File $screen_file = null;

    public function __construct()
    {
        $this->langages = new ArrayCollection();
        // $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getGithubLink(): ?string
    {
        return $this->github_link;
    }

    public function setGithubLink(string $github_link): static
    {
        $this->github_link = $github_link;

        return $this;
    }

    public function getWebsiteLink(): ?string
    {
        return $this->website_link;
    }

    public function setWebsiteLink(string $website_link): static
    {
        $this->website_link = $website_link;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_At;
    }


    public function setUpdateAt(?\DateTimeImmutable $updateAt): self
    {
        $this->update_At = $updateAt;

        return $this;
    }

    /**
     * @return Collection<int, Langages>
     */
    public function getLangages(): Collection
    {
        return $this->langages;
    }

    public function addLangage(Langages $langage): static
    {
        if (!$this->langages->contains($langage)) {
            $this->langages->add($langage);
        }

        return $this;
    }

    public function removeLangage(Langages $langage): static
    {
        $this->langages->removeElement($langage);

        return $this;
    }


    public function getScreenName(): ?string
    {
        return $this->screen_name;
    }

    public function setScreenName(?string $screen_name): self
    {
        $this->screen_name = $screen_name;

        return $this;
    }

    public function setScreenFile(?File $screen_file): static
    {
        $this->screen_file = $screen_file;

        if (null !== $screen_file) {
            $this->update_At = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getScreenFile(): ?File
    {
        return $this->screen_file;
    }
}
