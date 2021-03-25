<?php

namespace App\Entity;

use App\Repository\EstimationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstimationRepository::class)
 */
class Estimation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEstimation;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     */
    private $id_produit;

    /**
     * @ORM\ManyToOne(targetEntity=CommissairePriseur::class)
     */
    private $id_comissaire;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateEstimation(): ?\DateTimeInterface
    {
        return $this->dateEstimation;
    }

    public function setDateEstimation(?\DateTimeInterface $dateEstimation): self
    {
        $this->dateEstimation = $dateEstimation;

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

    public function getIdComissaire(): ?CommissairePriseur
    {
        return $this->id_comissaire;
    }

    public function setIdComissaire(?CommissairePriseur $id_comissaire): self
    {
        $this->id_comissaire = $id_comissaire;

        return $this;
    }

}
