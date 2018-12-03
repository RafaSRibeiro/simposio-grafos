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
     * @ORM\Column(type="string", length=255)
     */
    private $destino;

    /**
     * @ORM\Column(type="string", length=50, columnDefinition="VARCHAR(50) CHECK (tipo IN ('quente','frio'))")
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=50, columnDefinition="VARCHAR(50) CHECK (regiao IN ('norte','sul', 'leste', 'oeste'))")
     */
    private $regiao;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    public function getId(): ?int {
        return $this->id;
    }

    public function getDestino(): ?string {
        return $this->destino;
    }

    public function setDestino(?string $destino): self {
        $this->destino = $destino;

        return $this;
    }

    public function getTipo(): ?string {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self {
        $this->tipo = $tipo;

        return $this;
    }

    public function getRegiao(): ?string {
        return $this->regiao;
    }

    public function setRegiao($regiao): void {
        $this->regiao = $regiao;
    }

    public function getData(): ?\DateTime {
        return $this->data;
    }

    public function setData($data): void {
        $this->data = $data;
    }


}
