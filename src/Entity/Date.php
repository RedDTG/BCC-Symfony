<?php

namespace App\Entity;

use App\Repository\DateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DateRepository::class)
 */
class Date
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Lieu::class)
     */
    private $id_lieu;

    /**
     * @ORM\ManyToOne(targetEntity=Vente::class)
     */
    private $id_vente;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdLieu(): ?Lieu
    {
        return $this->id_lieu;
    }

    public function setIdLieu(?Lieu $id_lieu): self
    {
        $this->id_lieu = $id_lieu;

        return $this;
    }

    public function getIdVente(): ?Vente
    {
        return $this->id_vente;
    }

    public function setIdVente(?Vente $id_vente): self
    {
        $this->id_vente = $id_vente;

        return $this;
    }


}
