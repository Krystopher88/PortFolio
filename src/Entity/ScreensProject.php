<?php

namespace App\Entity;

use App\Repository\ScreensProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScreensProjectRepository::class)]
class ScreensProject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $file_name = null;

    #[ORM\ManyToOne(inversedBy: 'screen_project')]
    private ?Projects $Screen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    public function setFileName(string $file_name): static
    {
        $this->file_name = $file_name;

        return $this;
    }

    public function getScreen(): ?Projects
    {
        return $this->Screen;
    }

    public function setScreen(?Projects $Screen): static
    {
        $this->Screen = $Screen;

        return $this;
    }
}