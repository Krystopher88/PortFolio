<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SkillsRepository::class)]
class Skills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 32)]
    #[Assert\Length(min: 2, max: 32)]
    #[Assert\NotBlank()]
    private ?string $skill = null;

    #[ORM\ManyToOne(inversedBy: 'skill')]
    private ?Developer $skills = null;

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

    public function getSkills(): ?Developer
    {
        return $this->skills;
    }

    public function setSkills(?Developer $skills): static
    {
        $this->skills = $skills;

        return $this;
    }
}
