<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderRepository;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: 'order_')]
class Order
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

    #[ORM\ManyToOne(targetEntity: \App\Entity\User::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(name: 'id_user', referencedColumnName: 'id', nullable: false)]
    private ?\App\Entity\User $user = null;

    public function getUser(): ?\App\Entity\User
    {
        return $this->user;
    }

    public function setUser(?\App\Entity\User $user): self
    {
        $this->user = $user;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date = null;

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $quantity_order = null;
    
    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    private ?string $status = 'pending';    
    
    #[ORM\Column(type: 'float', nullable: false)]
    private ?float $total_amount = 0;
    
    #[ORM\Column(name: 'homeaddress', type: 'string', length: 255, nullable: false)]
    private ?string $address = null;
    
    #[ORM\Column(name: 'phonenum', type: 'integer', nullable: false)]
    private ?int $phone = null;

    public function getQuantity_order(): ?int
    {
        return $this->quantity_order;
    }

    public function setQuantity_order(int $quantity_order): self
    {
        $this->quantity_order = $quantity_order;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(name: 'id_product', referencedColumnName: 'id', nullable: false)]
    private ?Product $product = null;

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Panier::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(name: 'id_panier', referencedColumnName: 'id')]
    private ?Panier $panier = null;

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): self
    {
        $this->panier = $panier;
        return $this;
    }

    public function getQuantityOrder(): ?int
    {
        return $this->quantity_order;
    }

    public function setQuantityOrder(int $quantity_order): static
    {
        $this->quantity_order = $quantity_order;

        return $this;
    }
    
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
    
    public function getTotalAmount(): ?float
    {
        return $this->total_amount;
    }

    public function setTotalAmount(float $total_amount): static
    {
        $this->total_amount = $total_amount;

        return $this;
    }
    
    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }
    
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
}
