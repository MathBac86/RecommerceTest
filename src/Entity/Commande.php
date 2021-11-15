<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $numCommande;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mailCommande;

    /**
     * @ORM\ManyToOne(targetEntity=Produits::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Produits;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCommande(): ?string
    {
        return $this->numCommande;
    }

    public function setNumCommande(string $numCommande): self
    {
        $this->numCommande = $numCommande;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeImmutable
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeImmutable $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getMailCommande(): ?string
    {
        return $this->mailCommande;
    }

    public function setMailCommande(string $mailCommande): self
    {
        $this->mailCommande = $mailCommande;

        return $this;
    }

    public function getProduits(): ?Produits
    {
        return $this->Produits;
    }

    public function setProduits(?Produits $Produits): self
    {
        $this->Produits = $Produits;

        return $this;
    }
}
