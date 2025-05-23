<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\PanierRepository;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
#[ORM\Table(name: 'panier')]
class Panier
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


    #[ORM\Column(type: 'decimal', nullable: true)]
    private ?float $total = null;

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $status = null;

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    #[ORM\Column(type: 'integer', name: 'client_id', nullable: true)]
    private ?int $client_id = null;

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(?int $client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'panier')]
    private Collection $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

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

}
