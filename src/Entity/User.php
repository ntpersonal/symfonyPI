<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use App\Repository\UserRepository;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]
#[UniqueEntity(fields: ['email'], message: 'This email is already used by another account.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
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

    #[ORM\Column(name: 'firstname', type: 'string', nullable: false)]
    #[Assert\NotBlank(message: 'First name is required')]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'First name must be at least {{ limit }} characters long',
        maxMessage: 'First name cannot be longer than {{ limit }} characters'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z\s\-]+$/',
        message: 'First name can only contain letters, spaces, and hyphens'
    )]
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

    #[ORM\Column(name: 'lastname', type: 'string', nullable: false)]
    #[Assert\NotBlank(message: 'Last name is required')]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Last name must be at least {{ limit }} characters long',
        maxMessage: 'Last name cannot be longer than {{ limit }} characters'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z\s\-]+$/',
        message: 'Last name can only contain letters, spaces, and hyphens'
    )]
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

    #[ORM\Column(name: 'email', type: 'string', nullable: true)]
    #[Assert\NotBlank(message: 'Email is required')]
    #[Assert\Email(message: 'The email "{{ value }}" is not a valid email.')]
    #[Assert\Length(max: 180, maxMessage: 'Email cannot be longer than {{ limit }} characters')]
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

    #[ORM\Column(name: 'password', type: 'string', nullable: true)]
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

    #[ORM\Column(name: 'role', type: 'string', nullable: false)]
    #[Assert\NotBlank(message: 'Role is required')]
    #[Assert\Choice(
        choices: ['Admin', 'organizer', 'player'],
        message: 'Choose a valid role'
    )]
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

    #[ORM\Column(name: 'profilepicture', type: 'string', nullable: true)]
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

    #[ORM\Column(name: 'createdat', type: 'datetime', nullable: false)]
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

    #[ORM\Column(name: 'updatedat', type: 'datetime', nullable: false)]
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
    #[ORM\JoinColumn(name: 'id_team', referencedColumnName: 'id', nullable: true)]
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

    #[ORM\Column(name: 'phonenumber', type: 'string', nullable: true)]
    #[Assert\NotBlank(message: 'phone number is required')]
    #[Assert\Regex(
        pattern: '/^[0-9+\s()-]{8,20}$/',
        message: 'Please enter a valid phone number'
    )]
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

    #[ORM\Column(name: 'dateofbirth', type: 'date', nullable: false)]
    #[Assert\NotBlank(message: 'Date of birth is required')]
    #[Assert\Type(type: \DateTimeInterface::class, message: 'Please enter a valid date in YYYY-MM-DD format')]
    #[Assert\LessThanOrEqual(value: '-5 years', message: 'User must be at least 5 years old')]
    private ?\DateTimeInterface $dateofbirth = null;

    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(?\DateTimeInterface $dateofbirth): self
    {

        $this->dateofbirth = $dateofbirth;
        return $this;
    }

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: true)]
    private ?bool $is_active = null;

    public function isIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(?bool $is_active): self
    {
        $this->is_active = $is_active;
        return $this;
    }

    #[ORM\Column(name: 'coachinglicense', type: 'string', nullable: true)]
    #[Assert\When(
        expression: "this.getRole() === 'ROLE_COACH'",
        constraints: [
            new Assert\NotBlank(message: 'Coaching license is required for coaches'),
            new Assert\Length(
                min: 5,
                max: 20,
                minMessage: 'License must be at least {{ limit }} characters long',
                maxMessage: 'License cannot be longer than {{ limit }} characters'
            )
        ]
    )]
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

    #[ORM\Column(name: 'reset_code', type: 'string', nullable: false)]
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

    #[ORM\Column(name: 'reset_code_expiry', type: 'datetime', nullable: false)]
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

    #[ORM\Column(name: 'favourite', type: 'boolean', nullable: true)]
    private ?bool $favourite = null;

    public function isFavourite(): ?bool
    {
        return $this->favourite;
    }

    public function setFavourite(?bool $favourite): self
    {
        $this->favourite = $favourite;
        return $this;
    }

    #[ORM\Column(name: 'rating', type: 'integer', nullable: true)]
    #[Assert\Range(
        min: 1,
        max: 10,
        notInRangeMessage: 'Rating must be between {{ min }} and {{ max }}'
    )]
    private ?int $rating = null;

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    #[ORM\Column(name: 'position', type: 'string', nullable: true)]
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
        return $this->is_active;
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

    public function getRoles(): array
    {
        return ['ROLE_' . strtoupper($this->role)];
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }

    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }


    #[ORM\Column(nullable: true)]
    private ?string $resetToken = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $tokenCreatedAt = null;

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): static
    {
        $this->resetToken = $resetToken;
        return $this;
    }

    public function getTokenCreatedAt(): ?\DateTimeInterface
    {
        return $this->tokenCreatedAt;
    }

    public function setTokenCreatedAt(?\DateTimeInterface $tokenCreatedAt): static
    {
        $this->tokenCreatedAt = $tokenCreatedAt;
        return $this;
    }

    public function isResetTokenExpired(): bool
    {
        return $this->tokenCreatedAt !== null &&
            (new \DateTime()) > $this->tokenCreatedAt->modify('+1 hour');
    }

    #[ORM\Column(name: "faceData", type: "text", nullable: true)]
    private ?string $faceData = null;

    public function getFaceData(): ?string
    {
        return $this->faceData;
    }

    public function setFaceData(?string $faceData): self
    {
        $this->faceData = $faceData;
        return $this;
    }
}
