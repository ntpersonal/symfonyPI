<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\UserRepository;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $firstname = null;

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $lastname = null;

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $email = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $password = null;

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $role = null;

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $profilepicture = null;

    public function getProfilepicture(): ?string
    {
        return $this->profilepicture;
    }

    public function setProfilepicture(?string $profilepicture): self
    {
        $this->profilepicture = $profilepicture;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $createdat = null;

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $updatedat = null;

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(\DateTimeInterface $updatedat): self
    {
        $this->updatedat = $updatedat;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'users')]
    #[ORM\JoinColumn(name: 'id_team', referencedColumnName: 'id')]
    private ?Team $team = null;

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $phonenumber = null;

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $dateofbirth = null;

    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(\DateTimeInterface $dateofbirth): self
    {
        $this->dateofbirth = $dateofbirth;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $isActive = null;

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $coachinglicense = null;

    public function getCoachinglicense(): ?string
    {
        return $this->coachinglicense;
    }

    public function setCoachinglicense(?string $coachinglicense): self
    {
        $this->coachinglicense = $coachinglicense;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $reset_code = null;

    public function getReset_code(): ?string
    {
        return $this->reset_code;
    }

    public function setReset_code(string $reset_code): self
    {
        $this->reset_code = $reset_code;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $reset_code_expiry = null;

    public function getReset_code_expiry(): ?\DateTimeInterface
    {
        return $this->reset_code_expiry;
    }

    public function setReset_code_expiry(\DateTimeInterface $reset_code_expiry): self
    {
        $this->reset_code_expiry = $reset_code_expiry;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $Favourite = null;

    public function isFavourite(): ?bool
    {
        return $this->Favourite;
    }

    public function setFavourite(?bool $Favourite): self
    {
        $this->Favourite = $Favourite;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $Rating = null;

    public function getRating(): ?int
    {
        return $this->Rating;
    }

    public function setRating(?int $Rating): self
    {
        $this->Rating = $Rating;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $position = null;

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;
        return $this;
    }

   

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'user')]
    private Collection $orders;

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        if (!$this->orders instanceof Collection) {
            $this->orders = new ArrayCollection();
        }
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->getOrders()->contains($order)) {
            $this->getOrders()->add($order);
        }
        return $this;
    }

    public function removeOrder(Order $order): self
    {
        $this->getOrders()->removeElement($order);
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Panier::class, mappedBy: 'user')]
    private Collection $paniers;

    /**
     * @return Collection<int, Panier>
     */
    public function getPaniers(): Collection
    {
        if (!$this->paniers instanceof Collection) {
            $this->paniers = new ArrayCollection();
        }
        return $this->paniers;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->getPaniers()->contains($panier)) {
            $this->getPaniers()->add($panier);
        }
        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        $this->getPaniers()->removeElement($panier);
        return $this;
    }

    
    #[ORM\OneToMany(targetEntity: Tournoi::class, mappedBy: 'user')]
    private Collection $tournois;

    /**
     * @return Collection<int, Tournoi>
     */
    public function getTournois(): Collection
    {
        if (!$this->tournois instanceof Collection) {
            $this->tournois = new ArrayCollection();
        }
        return $this->tournois;
    }

    public function addTournoi(Tournoi $tournoi): self
    {
        if (!$this->getTournois()->contains($tournoi)) {
            $this->getTournois()->add($tournoi);
        }
        return $this;
    }

    public function removeTournoi(Tournoi $tournoi): self
    {
        $this->getTournois()->removeElement($tournoi);
        return $this;
    }

    #[ORM\ManyToMany(targetEntity: Reclamation::class, inversedBy: 'users')]
    #[ORM\JoinTable(
        name: 'answer',
        joinColumns: [
            new ORM\JoinColumn(name: 'id_admin', referencedColumnName: 'id')
        ],
        inverseJoinColumns: [
            new ORM\JoinColumn(name: 'id_reclamation', referencedColumnName: 'id')
        ]
    )]
    private Collection $reclamations;

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamations(): Collection
    {
        if (!$this->reclamations instanceof Collection) {
            $this->reclamations = new ArrayCollection();
        }
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->getReclamations()->contains($reclamation)) {
            $this->getReclamations()->add($reclamation);
        }
        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        $this->getReclamations()->removeElement($reclamation);
        return $this;
    }

    #[ORM\ManyToMany(targetEntity: Event::class, inversedBy: 'users')]
    #[ORM\JoinTable(
        name: 'reservation',
        joinColumns: [
            new ORM\JoinColumn(name: 'id_player', referencedColumnName: 'id')
        ],
        inverseJoinColumns: [
            new ORM\JoinColumn(name: 'id_event', referencedColumnName: 'id')
        ]
    )]
    private Collection $events;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->paniers = new ArrayCollection();
        $this->tournois = new ArrayCollection();
        $this->reclamations = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        if (!$this->events instanceof Collection) {
            $this->events = new ArrayCollection();
        }
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->getEvents()->contains($event)) {
            $this->getEvents()->add($event);
        }
        return $this;
    }

    public function removeEvent(Event $event): self
    {
        $this->getEvents()->removeElement($event);
        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function getResetCode(): ?string
    {
        return $this->reset_code;
    }

    public function setResetCode(string $reset_code): static
    {
        $this->reset_code = $reset_code;

        return $this;
    }

    public function getResetCodeExpiry(): ?\DateTimeInterface
    {
        return $this->reset_code_expiry;
    }

    public function setResetCodeExpiry(\DateTimeInterface $reset_code_expiry): static
    {
        $this->reset_code_expiry = $reset_code_expiry;

        return $this;
    }

}
