<?php

namespace App\Entity;

use App\Repository\LangagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LangagesRepository::class)]
class Langages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $langage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $file_name = null;

    #[ORM\ManyToMany(targetEntity: Projects::class, mappedBy: 'langages')]
    private Collection $Langage;

    public function __construct()
    {
        $this->Langage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangage(): ?string
    {
        return $this->langage;
    }

    public function setLangage(string $langage): static
    {
        $this->langage = $langage;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    public function setFileName(?string $file_name): static
    {
        $this->file_name = $file_name;

        return $this;
    }

    public function addLangage(Projects $langage): static
    {
        if (!$this->Langage->contains($langage)) {
            $this->Langage->add($langage);
            $langage->addLangage($this);
        }

        return $this;
    }

    public function removeLangage(Projects $langage): static
    {
        if ($this->Langage->removeElement($langage)) {
            $langage->removeLangage($this);
        }

        return $this;
    }
}
