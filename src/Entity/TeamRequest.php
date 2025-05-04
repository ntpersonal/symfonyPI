<?php

namespace App\Entity;

use App\Repository\TeamRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRequestRepository::class)]
class TeamRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'teamRequests')]
    private ?user $player = null;

    #[ORM\ManyToOne(inversedBy: 'teamRequests')]
    private ?team $team = null;

    #[ORM\Column(name:"status",length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(name:"created_at",type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(name:"processed_at",type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $proccedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?user
    {
        return $this->player;
    }

    public function setPlayer(?user $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getTeam(): ?team
    {
        return $this->team;
    }

    public function setTeam(?team $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getProccedAt(): ?\DateTimeInterface
    {
        return $this->proccedAt;
    }

    public function setProccedAt(?\DateTimeInterface $proccedAt): static
    {
        $this->proccedAt = $proccedAt;

        return $this;
    }
}
