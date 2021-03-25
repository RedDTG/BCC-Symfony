<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $offreAcheteur;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     */
    private $id_produit;

    /**
     * @ORM\ManyToOne(targetEntity=Acheteur::class)
     */
    private $id_acheteur;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreAcheteur(): ?float
    {
        return $this->offreAcheteur;
    }

    public function setOffreAcheteur(?float $offreAcheteur): self
    {
        $this->offreAcheteur = $offreAcheteur;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->id_produit;
    }

    public function setIdProduit(?Produit $id_produit): self
    {
        $this->id_produit = $id_produit;

        return $this;
    }

    public function getIdAcheteur(): ?Acheteur
    {
        return $this->id_acheteur;
    }

    public function setIdAcheteur(?Acheteur $id_acheteur): self
    {
        $this->id_acheteur = $id_acheteur;

        return $this;
    }

}
