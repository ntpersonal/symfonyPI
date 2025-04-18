<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(name: 'id_user', referencedColumnName: 'id')]
    private ?User $user = null;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
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
    #[ORM\JoinColumn(name: 'id_product', referencedColumnName: 'id')]
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

}
