<?php
class Cuota
{
    private int $numero;
    private float $monto_cuota;
    private float $monto_interes;
    private bool $cancelada = false;

    public function __construct(int $numero, float $monto_cuota, float $monto_interes)
    {
        $this->numero = $numero;
        $this->monto_cuota = $monto_cuota;
        $this->monto_interes = $monto_interes;
    }

    //getters
    public function getNumero(): int
    {
        return $this->numero;
    }
    public function getMontoCuota(): float
    {
        return $this->monto_cuota;
    }
    public function getMontoInteres(): float
    {
        return $this->monto_interes;
    }
    public function getCancelada(): bool
    {
        return $this->cancelada;
    }
    //setters
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }
    public function setMontoCuota(float $monto_cuota): void
    {
        $this->monto_cuota = $monto_cuota;
    }
    public function setMontoInteres(float $monto_interes): void
    {
        $this->monto_interes = $monto_interes;
    }
    public function setCancelada(bool $cancelada): void
    {
        $this->cancelada = $cancelada;
    }

    public function __toString()
    {
        return "Numero: " . $this->getNumero() . "\n" .
            "Monto Cuota: " . $this->getMontoCuota() . "\n" .
            "Monto Interes: " . $this->getMontoInteres() . "\n" .
            "Cancelada: " . ($this->getCancelada() ? "Si" : "No") . "\n";
    }


    public function darMontoFinalCuota(): float
    {
        return $this->getMontoCuota() + $this->getMontoInteres();
    }
}
