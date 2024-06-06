<?php

namespace App\Entity;

use App\Repository\MascotasAnimalesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MascotasAnimalesRepository::class)]
class MascotasAnimales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $perros = null;

    #[ORM\Column(length: 255)]
    private ?string $gatos = null;

    #[ORM\Column(length: 255)]
    private ?string $aves = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerros(): ?string
    {
        return $this->perros;
    }

    public function setPerros(string $perros): static
    {
        $this->perros = $perros;

        return $this;
    }

    public function getGatos(): ?string
    {
        return $this->gatos;
    }

    public function setGatos(string $gatos): static
    {
        $this->gatos = $gatos;

        return $this;
    }

    public function getAves(): ?string
    {
        return $this->aves;
    }

    public function setAves(string $aves): static
    {
        $this->aves = $aves;

        return $this;
    }
}
