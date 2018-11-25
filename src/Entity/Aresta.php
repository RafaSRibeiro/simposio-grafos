<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArestaRepository")
 */
class Aresta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vertice")
     */
    private $origem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vertice")
     */
    private $destino;

    /**
     * @ORM\Column(type="float")
     */
    private $distancia;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Grafo", mappedBy="arestas")
     */
    private $grafos;

    public function __construct()
    {
        $this->grafos = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getOrigem(): ?Vertice {
        return $this->origem;
    }

    public function setOrigem(?Vertice $origem): self {
        $this->origem = $origem;

        return $this;
    }

    public function getDestino(): ?Vertice {
        return $this->destino;
    }

    public function setDestino(?Vertice $destino): self {
        $this->destino = $destino;

        return $this;
    }

    public function getDistancia(): ?float {
        return $this->distancia;
    }

    public function setDistancia(float $distancia): self {
        $this->distancia = $distancia;

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
            $grafo->addAresta($this);
        }

        return $this;
    }

    public function removeGrafo(Grafo $grafo): self
    {
        if ($this->grafos->contains($grafo)) {
            $this->grafos->removeElement($grafo);
            $grafo->removeAresta($this);
        }

        return $this;
    }
}
