<?php

namespace App\Entity;

use App\Repository\BloodTransactionRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Hospital;

#[ORM\Entity(repositoryClass: BloodTransactionRepository::class)]
class BloodTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Please add the quantity')]
    #[Assert\GreaterThan(value: 0, message: "The quantity must be a strictly positive number")]
    private ?float $quantity_donated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'Please add the date')]
    #[Assert\GreaterThanOrEqual(value: "today", message: "The due date must be in the future")]
    private ?\DateTimeInterface $donation_date = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please add the transaction type')]
    #[Assert\Length(
        min: 4,
        max: 30,
        minMessage: 'The transaction type must be at least 4 characters long',
        maxMessage: 'The transaction type cannot exceed 30 characters'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z\-]+$/',
        message: "The transaction type must contain only letters and hyphens"
    )]
    private ?string $transaction_type = null;

    #[ORM\ManyToOne(targetEntity: Hospital::class)]
    #[ORM\JoinColumn(name: 'hospital_id', referencedColumnName: 'id')]
    private ?Hospital $hospital = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantityDonated(): ?float
    {
        return $this->quantity_donated;
    }

    public function setQuantityDonated(float $quantity_donated): self
    {
        $this->quantity_donated = $quantity_donated;
        return $this;
    }

    public function getDonationDate(): ?\DateTimeInterface
    {
        return $this->donation_date;
    }

    public function setDonationDate(\DateTimeInterface $donation_date): self
    {
        $this->donation_date = $donation_date;
        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transaction_type;
    }

    public function setTransactionType(string $transaction_type): self
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    public function getHospital(): ?Hospital
    {
        return $this->hospital;
    }

    public function setHospital(?Hospital $hospital): self
    {
        $this->hospital = $hospital;
        return $this;
    }
}
