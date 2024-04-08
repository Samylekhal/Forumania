<?php

namespace App\Entity;

use App\Repository\InscritRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscritRepository::class)]
class Inscrit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $Pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_arrivee = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\OneToMany(targetEntity: Forum::class, mappedBy: 'inscrit', orphanRemoval: true)]
    private Collection $Inscrit_Forum;

    #[ORM\OneToMany(targetEntity: SectionComm::class, mappedBy: 'SCinscrit', orphanRemoval: true)]
    private Collection $sectionComms;

    public function __construct()
    {
        $this->Inscrit_Forum = new ArrayCollection();
        $this->sectionComms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): static
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTimeInterface $date_arrivee): static
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Forum>
     */
    public function getInscritForum(): Collection
    {
        return $this->Inscrit_Forum;
    }

    public function addInscritForum(Forum $inscritForum): static
    {
        if (!$this->Inscrit_Forum->contains($inscritForum)) {
            $this->Inscrit_Forum->add($inscritForum);
            $inscritForum->setInscrit($this);
        }

        return $this;
    }

    public function removeInscritForum(Forum $inscritForum): static
    {
        if ($this->Inscrit_Forum->removeElement($inscritForum)) {
            // set the owning side to null (unless already changed)
            if ($inscritForum->getInscrit() === $this) {
                $inscritForum->setInscrit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SectionComm>
     */
    public function getSectionComms(): Collection
    {
        return $this->sectionComms;
    }

    public function addSectionComm(SectionComm $sectionComm): static
    {
        if (!$this->sectionComms->contains($sectionComm)) {
            $this->sectionComms->add($sectionComm);
            $sectionComm->setSCinscrit($this);
        }

        return $this;
    }

    public function removeSectionComm(SectionComm $sectionComm): static
    {
        if ($this->sectionComms->removeElement($sectionComm)) {
            // set the owning side to null (unless already changed)
            if ($sectionComm->getSCinscrit() === $this) {
                $sectionComm->setSCinscrit(null);
            }
        }

        return $this;
    }
}
