<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocalidadeRepository")
 */
class Localidade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $regiao;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pedido", mappedBy="destino")
     */
    private $pedidos;

    public function __construct() {
        $this->pedidos = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getRegiao(): ?int {
        return $this->regiao;
    }

    public function setRegiao(int $regiao): self {
        $this->regiao = $regiao;

        return $this;
    }

    /**
     * @return Collection|Pedido[]
     */
    public function getPedidos(): Collection {
        return $this->pedidos;
    }

    public function addPedido(Pedido $pedido): self {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos[] = $pedido;
            $pedido->setDestino($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): self {
        if ($this->pedidos->contains($pedido)) {
            $this->pedidos->removeElement($pedido);
            // set the owning side to null (unless already changed)
            if ($pedido->getDestino() === $this) {
                $pedido->setDestino(null);
            }
        }

        return $this;
    }

}
