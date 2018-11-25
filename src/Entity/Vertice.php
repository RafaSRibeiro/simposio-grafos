<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerticeRepository")
 */
class Vertice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Grafo", mappedBy="vertices")
     */
    private $grafos;

    public function __construct()
    {
        $this->grafos = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return Collection|Grafo[]
     */
    public function getGrafos(): Collection
    {
        return $this->grafos;
    }

    public function addGrafo(Grafo $grafo): self
    {
        if (!$this->grafos->contains($grafo)) {
            $this->grafos[] = $grafo;
            $grafo->addVertice($this);
        }

        return $this;
    }

    public function removeGrafo(Grafo $grafo): self
    {
        if ($this->grafos->contains($grafo)) {
            $this->grafos->removeElement($grafo);
            $grafo->removeVertex($this);
        }

        return $this;
    }

}
