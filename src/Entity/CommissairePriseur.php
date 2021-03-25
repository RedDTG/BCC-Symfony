<?php

namespace App\Entity;

use App\Repository\CommissairePriseurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommissairePriseurRepository::class)
 */
class CommissairePriseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPersonne(): ?Personne
    {
        return $this->id_personne;
    }

    public function setIdPersonne(?Personne $id_personne): self
    {
        $this->id_personne = $id_personne;

        return $this;
    }

}
