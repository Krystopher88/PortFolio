<?php

namespace App\Entity;

use App\Entity\Skills;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DeveloperRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: DeveloperRepository::class)]
class Developer implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Assert\Length(min: 2, max: 180)]
    #[Assert\NotBlank()]
    private ?string $username = null;

    #[ORM\Column(type: 'json')]
    #[Assert\NotBlank()]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(type: 'string')]
    private ?string $password = null;

    private ?string $plainPassword = null;

    #[ORM\Column(type: 'string', length: 32)]
    #[Assert\Length(min: 2, max: 32)]
    #[Assert\NotBlank()]
    private ?string $first_name = null;

    #[ORM\Column(type: 'string', length: 32)]
    #[Assert\Length(min: 2, max: 32)]
    #[Assert\NotBlank()]
    private ?string $last_name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $biography = null;

    #[ORM\Column(type:'string', length: 255)]
    #[Assert\Email()]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 2, max: 255)]
    #[Assert\NotBlank()]
    private ?string $github_link = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $linkedin_link = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $youtube_link = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank()]
    private ?string $picture_name = null;

    #[ORM\OneToMany(mappedBy: 'SkillDeveloper', targetEntity: Skills::class)]
    private Collection $Skill;

    public function __construct()
    {
        $this->Skill = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): static
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        
        $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): static
    {
        $this->biography = $biography;

        return $this;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getLinkedinLink(): ?string
    {
        return $this->linkedin_link;
    }

    public function setLinkedinLink(string $linkedin_link): static
    {
        $this->linkedin_link = $linkedin_link;

        return $this;
    }

    public function getYoutubeLink(): ?string
    {
        return $this->youtube_link;
    }

    public function setYoutubeLink(?string $youtube_link): static
    {
        $this->youtube_link = $youtube_link;

        return $this;
    }

    public function getPictureName(): ?string
    {
        return $this->picture_name;
    }

    public function setPictureName(?string $picture_name): static
    {
        $this->picture_name = $picture_name;

        return $this;
    }

    /**
     * @return Collection<int, Skills>
     */
    public function getSkill(): Collection
    {
        return $this->Skill;
    }

    public function addSkill(Skills $skill): static
    {
        if (!$this->Skill->contains($skill)) {
            $this->Skill->add($skill);
            $skill->setSkillDeveloper($this);
        }

        return $this;
    }

    public function removeSkill(Skills $skill): static
    {
        if ($this->Skill->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getSkillDeveloper() === $this) {
                $skill->setSkillDeveloper(null);
            }
        }

        return $this;
    }
}