<?php

namespace App\Entity;

use App\Repository\SectionCommRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionCommRepository::class)]
class SectionComm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?int $comLikee = null;

    #[ORM\ManyToOne(inversedBy: 'sectionComms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Inscrit $SCinscrit = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'sectionComms')]
    private ?self $reponse = null;

    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'reponse')]
    private Collection $sectionComms;

    #[ORM\OneToMany(targetEntity: Comentaires::class, mappedBy: 'commentaire', orphanRemoval: true)]
    private Collection $comentaires;

    public function __construct()
    {
        $this->sectionComms = new ArrayCollection();
        $this->comentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getComLikee(): ?int
    {
        return $this->comLikee;
    }

    public function setComLikee(?int $comLikee): static
    {
        $this->comLikee = $comLikee;

        return $this;
    }

    public function getSCinscrit(): ?Inscrit
    {
        return $this->SCinscrit;
    }

    public function setSCinscrit(?Inscrit $SCinscrit): static
    {
        $this->SCinscrit = $SCinscrit;

        return $this;
    }

    public function getReponse(): ?self
    {
        return $this->reponse;
    }

    public function setReponse(?self $reponse): static
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSectionComms(): Collection
    {
        return $this->sectionComms;
    }

    public function addSectionComm(self $sectionComm): static
    {
        if (!$this->sectionComms->contains($sectionComm)) {
            $this->sectionComms->add($sectionComm);
            $sectionComm->setReponse($this);
        }

        return $this;
    }

    public function removeSectionComm(self $sectionComm): static
    {
        if ($this->sectionComms->removeElement($sectionComm)) {
            // set the owning side to null (unless already changed)
            if ($sectionComm->getReponse() === $this) {
                $sectionComm->setReponse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comentaires>
     */
    public function getComentaires(): Collection
    {
        return $this->comentaires;
    }

    public function addComentaire(Comentaires $comentaire): static
    {
        if (!$this->comentaires->contains($comentaire)) {
            $this->comentaires->add($comentaire);
            $comentaire->setCommentaire($this);
        }

        return $this;
    }

    public function removeComentaire(Comentaires $comentaire): static
    {
        if ($this->comentaires->removeElement($comentaire)) {
            // set the owning side to null (unless already changed)
            if ($comentaire->getCommentaire() === $this) {
                $comentaire->setCommentaire(null);
            }
        }

        return $this;
    }
}
