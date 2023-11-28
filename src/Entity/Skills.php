<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillsRepository::class)]
class Skills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $skill = null;

    #[ORM\ManyToOne(inversedBy: 'Skill')]
    private ?Developer $SkillDeveloper = null;

    public function __toString(): string
    {
        return $this->skill;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkill(): ?string
    {
        return $this->skill;
    }

    public function setSkill(string $skill): static
    {
        $this->skill = $skill;

        return $this;
    }

    public function getSkillDeveloper(): ?Developer
    {
        return $this->SkillDeveloper;
    }

    public function setSkillDeveloper(?Developer $SkillDeveloper): static
    {
        $this->SkillDeveloper = $SkillDeveloper;

        return $this;
    }
}
