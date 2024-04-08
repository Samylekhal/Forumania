<?php

namespace App\Entity;

use App\Repository\ForumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForumRepository::class)]
class Forum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Id_forum = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $MessagePrincipal = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_publication = null;

    #[ORM\Column(nullable: true)]
    private ?int $Nb_like = null;

    #[ORM\ManyToOne(inversedBy: 'Inscrit_Forum')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Inscrit $inscrit = null;

    #[ORM\OneToMany(targetEntity: Comentaires::class, mappedBy: 'forum', orphanRemoval: true)]
    private Collection $Forumcom;

    public function __construct()
    {
        $this->Forumcom = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdForum(): ?int
    {
        return $this->Id_forum;
    }

    public function setIdForum(int $Id_forum): static
    {
        $this->Id_forum = $Id_forum;

        return $this;
    }

    public function getIdCreateur(): ?int
    {
        return $this->Id_createur;
    }

    public function setIdCreateur(int $Id_createur): static
    {
        $this->Id_createur = $Id_createur;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getMessagePrincipal(): ?string
    {
        return $this->MessagePrincipal;
    }

    public function setMessagePrincipal(string $MessagePrincipal): static
    {
        $this->MessagePrincipal = $MessagePrincipal;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->date_publication;
    }

    public function setDatePublication(\DateTimeInterface $date_publication): static
    {
        $this->date_publication = $date_publication;

        return $this;
    }

    public function getNbLike(): ?int
    {
        return $this->Nb_like;
    }

    public function setNbLike(?int $Nb_like): static
    {
        $this->Nb_like = $Nb_like;

        return $this;
    }

    public function getInscrit(): ?Inscrit
    {
        return $this->inscrit;
    }

    public function setInscrit(?Inscrit $inscrit): static
    {
        $this->inscrit = $inscrit;

        return $this;
    }

    /**
     * @return Collection<int, Comentaires>
     */
    public function getForumcom(): Collection
    {
        return $this->Forumcom;
    }

    public function addForumcom(Comentaires $forumcom): static
    {
        if (!$this->Forumcom->contains($forumcom)) {
            $this->Forumcom->add($forumcom);
            $forumcom->setForum($this);
        }

        return $this;
    }

    public function removeForumcom(Comentaires $forumcom): static
    {
        if ($this->Forumcom->removeElement($forumcom)) {
            // set the owning side to null (unless already changed)
            if ($forumcom->getForum() === $this) {
                $forumcom->setForum(null);
            }
        }

        return $this;
    }
}
