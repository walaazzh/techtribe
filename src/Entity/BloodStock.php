<?php

namespace App\Entity;

<<<<<<< HEAD
use Symfony\Component\Validator\Constraints as Assert;
=======
>>>>>>> 23a1a9b (walaa new commit)
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
<<<<<<< HEAD
    #[Assert\NotBlank(message: 'Please add the product name')]
    #[Assert\Length(
        min: 4,
        max: 30,
        minMessage: 'The name of the blood product must be at least 4 characters long',
        maxMessage: 'The blood product name cannot exceed 30 characters'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z\-]+$/',
        message: "The name of the blood product must contain only letters and hyphens"
    )]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Please add the quantity')]
    #[Assert\GreaterThan(value: 0, message: "The quantity must be a strictly positive number")]
    private ?float $quantity_available = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThanOrEqual(value: "today", message: "The due date must be in the future")]
    private ?\DateTimeInterface $expiry_date = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please add the blood type')]
    #[Assert\Choice(
        choices: ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-", "a+", "a-", "b+", "b-", "ab+", "ab-", "o+", "o-"],
        message: "Blood type must be valid"
    )]
=======
    private ?string $name = null;

    #[ORM\Column]
    private ?float $quantity_available = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expiry_date = null;

    #[ORM\Column(length: 255)]
>>>>>>> 23a1a9b (walaa new commit)
    private ?string $bloodtype = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

<<<<<<< HEAD
    public function setName(string $name): self
    {
        $this->name = $name;
=======
    public function setName(string $name): static
    {
        $this->name = $name;

>>>>>>> 23a1a9b (walaa new commit)
        return $this;
    }

    public function getQuantityAvailable(): ?float
    {
        return $this->quantity_available;
    }

<<<<<<< HEAD
    public function setQuantityAvailable(float $quantity_available): self
    {
        $this->quantity_available = $quantity_available;
=======
    public function setQuantityAvailable(float $quantity_available): static
    {
        $this->quantity_available = $quantity_available;

>>>>>>> 23a1a9b (walaa new commit)
        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiry_date;
    }

<<<<<<< HEAD
    public function setExpiryDate(\DateTimeInterface $expiry_date): self
    {
        $this->expiry_date = $expiry_date;
=======
    public function setExpiryDate(\DateTimeInterface $expiry_date): static
    {
        $this->expiry_date = $expiry_date;

>>>>>>> 23a1a9b (walaa new commit)
        return $this;
    }

    public function getBloodtype(): ?string
    {
        return $this->bloodtype;
    }

<<<<<<< HEAD
    public function setBloodtype(string $bloodtype): self
    {
        $this->bloodtype = $bloodtype;
=======
    public function setBloodtype(string $bloodtype): static
    {
        $this->bloodtype = $bloodtype;

>>>>>>> 23a1a9b (walaa new commit)
        return $this;
    }
}
