<?php

namespace App\Entity;

use App\Repository\EventCategoryRepository;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventCategoryRepository::class)]
class EventCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

<<<<<<< HEAD
<<<<<<< HEAD
=======
    #[ORM\OneToMany(targetEntity: Event::class, mappedBy: 'EventCategory')]
    private Collection $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
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
<<<<<<< HEAD
<<<<<<< HEAD
=======

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setEventCategory($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getEventCategory() === $this) {
                $event->setEventCategory(null);
            }
        }

        return $this;
    }
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
}
