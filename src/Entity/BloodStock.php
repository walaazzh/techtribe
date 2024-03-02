<?php

namespace App\Entity;

use App\Repository\BloodStockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BloodStockRepository::class)]
class BloodStock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $quantity_available = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expiry_date = null;

    #[ORM\Column(length: 255)]
    private ?string $bloodtype = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantityAvailable(): ?float
    {
        return $this->quantity_available;
    }

    public function setQuantityAvailable(float $quantity_available): static
    {
        $this->quantity_available = $quantity_available;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiry_date;
    }

    public function setExpiryDate(\DateTimeInterface $expiry_date): static
    {
        $this->expiry_date = $expiry_date;

        return $this;
    }

    public function getBloodtype(): ?string
    {
        return $this->bloodtype;
    }

    public function setBloodtype(string $bloodtype): static
    {
        $this->bloodtype = $bloodtype;

        return $this;
    }
}
