<?php

namespace App\Entity;

use App\Repository\ProjectsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectsRepository::class)]
class Projects
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $github_link = null;

    #[ORM\Column(length: 255)]
    private ?string $website_link = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\ManyToMany(targetEntity: Langages::class, inversedBy: 'Langage')]
    private Collection $langages;

    #[ORM\OneToMany(mappedBy: 'Screen', targetEntity: ScreensProject::class)]
    private Collection $screen_project;

    public function __construct()
    {
        $this->langages = new ArrayCollection();
        $this->screen_project = new ArrayCollection();
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

    /**
     * @return Collection<int, ScreensProject>
     */
    public function getScreenProject(): Collection
    {
        return $this->screen_project;
    }

    public function addScreenProject(ScreensProject $screenProject): static
    {
        if (!$this->screen_project->contains($screenProject)) {
            $this->screen_project->add($screenProject);
            $screenProject->setScreen($this);
        }

        return $this;
    }

    public function removeScreenProject(ScreensProject $screenProject): static
    {
        if ($this->screen_project->removeElement($screenProject)) {
            // set the owning side to null (unless already changed)
            if ($screenProject->getScreen() === $this) {
                $screenProject->setScreen(null);
            }
        }

        return $this;
    }
}
