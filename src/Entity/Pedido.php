<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Localidade", inversedBy="pedidos")
     */
    private $destino;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestino(): ?Localidade
    {
        return $this->destino;
    }

    public function setDestino(?Localidade $destino): self
    {
        $this->destino = $destino;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
