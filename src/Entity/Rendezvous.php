<?php

namespace App\Entity;

use App\Repository\RendezvousRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezvousRepository::class)]
class Rendezvous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_heure = null;

    #[ORM\Column(length: 255)]
    private ?string $statue = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_heure_creation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_heure_der_modif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->date_heure;
    }

    public function setDateHeure(\DateTimeInterface $date_heure): static
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    public function getStatue(): ?string
    {
        return $this->statue;
    }

    public function setStatue(string $statue): static
    {
        $this->statue = $statue;

        return $this;
    }

    public function getDateHeureCreation(): ?\DateTimeInterface
    {
        return $this->date_heure_creation;
    }

    public function setDateHeureCreation(\DateTimeInterface $date_heure_creation): static
    {
        $this->date_heure_creation = $date_heure_creation;

        return $this;
    }

    public function getDateHeureDerModif(): ?\DateTimeInterface
    {
        return $this->date_heure_der_modif;
    }

    public function setDateHeureDerModif(\DateTimeInterface $date_heure_der_modif): static
    {
        $this->date_heure_der_modif = $date_heure_der_modif;

        return $this;
    }
}
