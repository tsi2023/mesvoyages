<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisiteRepository::class)
 */
class Visite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avis;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datecration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempmin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempmax;

   

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getPays(): ?string
    {
        return $this->pays;
    }
    
    public function setPays(?string $pays): self
    {
        $this->pays = $pays;
        
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecration;
    }

    public function setDatecreation(?\DateTimeInterface $datecration): self
    {
        $this->datecration = $datecration;

        return $this;
    }

    public function getTempmin(): ?int
    {
        return $this->tempmin;
    }

    public function setTempmin(?int $tempmin): self
    {
        $this->tempmin = $tempmin;

        return $this;
    }

    public function getTempmax(): ?int
    {
        return $this->tempmax;
    }

    public function setTempmax(?int $tempmax): self
    {
        $this->tempmax = $tempmax;

        return $this;
    }
    public function getDatecreationString(): string
    {
        if($this->datecration == null){
            return "";
        }else{
            return $this->datecration->format('d/m/Y');
        }
    }
}
