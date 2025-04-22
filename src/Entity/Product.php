<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ProductRepository;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: 'product')]
class Product
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
    private ?string $nameproduct = null;

    public function getNameproduct(): ?string
    {
        return $this->nameproduct;
    }

    public function setNameproduct(string $nameproduct): self
    {
        $this->nameproduct = $nameproduct;
        return $this;
    }

    #[ORM\Column(type: 'decimal', nullable: false)]
    private ?float $priceproduct = null;

    public function getPriceproduct(): ?float
    {
        return $this->priceproduct;
    }

    public function setPriceproduct(float $priceproduct): self
    {
        $this->priceproduct = $priceproduct;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $stock = null;

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(?string $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $category = null;

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'product')]
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

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image = null;

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Panier::class, mappedBy: 'product')]
    private Collection $paniers;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->paniers = new ArrayCollection();
    }

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

}
