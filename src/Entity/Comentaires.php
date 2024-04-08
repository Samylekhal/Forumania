<?php

namespace App\Entity;

use App\Repository\ComentairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComentairesRepository::class)]
class Comentaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Forumcom')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Forum $forum = null;

    #[ORM\OneToMany(targetEntity: SectionComm::class, mappedBy: 'SCcom', orphanRemoval: true)]
    private Collection $sectionComms;

    #[ORM\ManyToOne(inversedBy: 'Comentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionComm $commentaire = null;

    public function __construct()
    {
        $this->sectionComms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForum(): ?Forum
    {
        return $this->forum;
    }

    public function setForum(?Forum $forum): static
    {
        $this->forum = $forum;

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
            $sectionComm->setSCcom($this);
        }

        return $this;
    }

    public function removeSectionComm(SectionComm $sectionComm): static
    {
        if ($this->sectionComms->removeElement($sectionComm)) {
            // set the owning side to null (unless already changed)
            if ($sectionComm->getSCcom() === $this) {
                $sectionComm->setSCcom(null);
            }
        }

        return $this;
    }

    public function getCommentaire(): ?SectionComm
    {
        return $this->commentaire;
    }

    public function setCommentaire(?SectionComm $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
