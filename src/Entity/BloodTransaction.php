<?php

namespace App\Entity;

use App\Repository\BloodTransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BloodTransactionRepository::class)]
class BloodTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $quantity_donated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $donation_date = null;

    #[ORM\Column(length: 255)]
    private ?string $transaction_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantityDonated(): ?float
    {
        return $this->quantity_donated;
    }

    public function setQuantityDonated(float $quantity_donated): static
    {
        $this->quantity_donated = $quantity_donated;

        return $this;
    }

    public function getDonationDate(): ?\DateTimeInterface
    {
        return $this->donation_date;
    }

    public function setDonationDate(\DateTimeInterface $donation_date): static
    {
        $this->donation_date = $donation_date;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transaction_type;
    }

    public function setTransactionType(string $transaction_type): static
    {
        $this->transaction_type = $transaction_type;

        return $this;
    }
}
