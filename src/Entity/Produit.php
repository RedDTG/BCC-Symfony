<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixDeDepart;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class)
     */
    private $id_lot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixDeDepart(): ?float
    {
        return $this->prixDeDepart;
    }

    public function setPrixDeDepart(?float $prixDeDepart): self
    {
        $this->prixDeDepart = $prixDeDepart;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdLot(): ?int
    {
        return $this->id_lot;
    }

    public function setIdLot(?int $id_lot): self
    {
        $this->id_lot = $id_lot;

        return $this;
    }


    public function getIdVendeur(): ?int
    {
        return $this->idVendeur;
    }

    public function setIdVendeur(?int $idVendeur): self
    {
        $this->idVendeur = $idVendeur;

        return $this;
    }
}
