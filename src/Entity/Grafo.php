<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GrafoRepository")
 */
class Grafo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Vertice", inversedBy="grafos")
     */
    private $vertices;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Aresta", inversedBy="grafos")
     */
    private $arestas;

    public function __construct()
    {
        $this->vertices = new ArrayCollection();
        $this->arestas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Vertice[]
     */
    public function getVertices(): Collection
    {
        return $this->vertices;
    }

    public function addVertice(Vertice $vertice): self
    {
        if (!$this->vertices->contains($vertice)) {
            $this->vertices[] = $vertice;
        }

        return $this;
    }

    public function removeVertex(Vertice $vertex): self
    {
        if ($this->vertices->contains($vertex)) {
            $this->vertices->removeElement($vertex);
        }

        return $this;
    }

    /**
     * @return Collection|Aresta[]
     */
    public function getArestas(): Collection
    {
        return $this->arestas;
    }

    public function addAresta(Aresta $aresta): self
    {
        if (!$this->arestas->contains($aresta)) {
            $this->arestas[] = $aresta;
        }

        return $this;
    }

    public function removeAresta(Aresta $aresta): self
    {
        if ($this->arestas->contains($aresta)) {
            $this->arestas->removeElement($aresta);
        }

        return $this;
    }
}
