<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\ManyToMany(targetEntity=Produit::class)
     */
    private $id_produit;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class)
     */
    private $id_sousCategorie;

    public function __construct()
    {
        $this->id_produit = new ArrayCollection();
    }

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

    /**
     * @return Collection|Produit[]
     */
    public function getIdProduit(): Collection
    {
        return $this->id_produit;
    }

    public function addIdProduit(Produit $idProduit): self
    {
        if (!$this->id_produit->contains($idProduit)) {
            $this->id_produit[] = $idProduit;
        }

        return $this;
    }

    public function removeIdProduit(Produit $idProduit): self
    {
        $this->id_produit->removeElement($idProduit);

        return $this;
    }

    public function getIdSousCategorie(): ?self
    {
        return $this->id_sousCategorie;
    }

    public function setIdSousCategorie(?self $id_sousCategorie): self
    {
        $this->id_sousCategorie = $id_sousCategorie;

        return $this;
    }
}
