<?php

namespace App\Entity;
<<<<<<< HEAD

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
=======
use App\Entity\User;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: EventRepository::class)]
#[Vich\Uploadable]
>>>>>>> chiheb+walaa/syrinecopie_branch
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
<<<<<<< HEAD
    private ?string $name = null;

    #[ORM\Column(length: 255)]
=======
    #[Assert\NotBlank(message: 'This value should not be blank.')]
    #[Assert\Length(
        min: 5,
        max: 50,
        minMessage: 'name must be at least {{ limit }} characters long',
        maxMessage: 'name cannot be longer than {{ limit }} characters',
    )]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'This value should not be blank.')]
>>>>>>> chiheb+walaa/syrinecopie_branch
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

<<<<<<< HEAD
    #[ORM\Column(length: 255)]
    private ?string $organisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $contact = null;

    #[ORM\Column]
    private ?int $max_participant = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

=======
    #[Assert\IsTrue(message: "The start date must be before the end date.")]
    public function isDateDebutBeforeDateFin(): bool
    {
        return $this->date_debut < $this->date_fin;
    }

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'This value should not be blank.')]
    private ?string $organisateur = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'This value should not be blank.')]
    #[Assert\Email(message: 'The email "{{ value }}" is not a valid email.')]
    private ?string $contact = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'This value should not be blank.')]
  
    private ?int $max_participant = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'This value should not be blank.')]
    private ?string $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;

    #[Vich\UploadableField(mapping: 'event_image', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    private ?EventCategory $EventCategory = null;

    #[ORM\OneToMany(targetEntity: Participation::class, mappedBy: 'Event')]
    private Collection $participations;

    #[ORM\OneToMany(targetEntity: Ticket::class, mappedBy: 'Event')]
    private Collection $tickets;

    public function __construct()
    {
        $this->participations = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

>>>>>>> chiheb+walaa/syrinecopie_branch
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getOrganisateur(): ?string
    {
        return $this->organisateur;
    }

    public function setOrganisateur(string $organisateur): static
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getMaxParticipant(): ?int
    {
        return $this->max_participant;
    }

    public function setMaxParticipant(int $max_participant): static
    {
        $this->max_participant = $max_participant;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
<<<<<<< HEAD
=======

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) 
        {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    
    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdateAt(): self
    {
        
        $this->updatedAt = new \DateTimeImmutable();

        return $this;
    }

    public function getEventCategory(): ?EventCategory
    {
        return $this->EventCategory;
    }

    public function setEventCategory(?EventCategory $EventCategory): static
    {
        $this->EventCategory = $EventCategory;

        return $this;
    }

    /**
     * @return Collection<int, Participation>
     */
    public function getParticipations(): Collection
    {
        return $this->participations;
    }

    public function addParticipation(Participation $participation): static
    {
        if (!$this->participations->contains($participation)) {
            $this->participations->add($participation);
            $participation->setEvent($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): static
    {
        if ($this->participations->removeElement($participation)) {
            // set the owning side to null (unless already changed)
            if ($participation->getEvent() === $this) {
                $participation->setEvent(null);
            }
        }

        return $this;
    }

    public function isParticipant(User $user): bool
{
    foreach ($this->participations as $participation) {
        if ($participation->getUser() === $user) {
            return true;
        }
    }
    return false;
}

    /**
     * @return Collection<int, Ticket>
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): static
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets->add($ticket);
            $ticket->setEvent($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): static
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getEvent() === $this) {
                $ticket->setEvent(null);
            }
        }

        return $this;
    }

>>>>>>> chiheb+walaa/syrinecopie_branch
}
