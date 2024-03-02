<?php

namespace App\Entity;

use App\Repository\CentredecollectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CentredecollectRepository::class)]
class Centredecollect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $payes = null;

    #[ORM\Column(length: 255)]
    private ?string $num_tel = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure_ouverture = null;

    #[ORM\Column(length: 255)]
    private ?string $capacite_max = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getPayes(): ?string
    {
        return $this->payes;
    }

    public function setPayes(string $payes): static
    {
        $this->payes = $payes;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(string $num_tel): static
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getHeureOuverture(): ?\DateTimeInterface
    {
        return $this->heure_ouverture;
    }

    public function setHeureOuverture(\DateTimeInterface $heure_ouverture): static
    {
        $this->heure_ouverture = $heure_ouverture;

        return $this;
    }

    public function getCapaciteMax(): ?string
    {
        return $this->capacite_max;
    }

    public function setCapaciteMax(string $capacite_max): static
    {
        $this->capacite_max = $capacite_max;

        return $this;
    }
}
