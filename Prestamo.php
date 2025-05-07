<?php
class Prestamo
{
    private static int $idCount = 1;
    private int $id;
    private int $codigoElectrodomestico = 1;
    private string $fechaOtorgamiento = "";
    private float $monto;
    private int $cantidadCuotas;
    private float $tasaInteres;
    private array $cuotas = []; // Array de objetos Cuota
    private Cliente $ObjCliente; // Objeto Cliente


    public function __construct(float $monto, int $cantidadCuotas, float $tasaInteres, Cliente $ObjCliente)
    {
        $this->id = self::$idCount++;
        $this->monto = $monto;
        $this->cantidadCuotas = $cantidadCuotas;
        $this->tasaInteres = $tasaInteres;
        $this->ObjCliente = $ObjCliente;
    }

    //getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getCodigoElectrodomestico(): int
    {
        return $this->codigoElectrodomestico;
    }
    public function getFechaOtorgamiento(): string
    {
        return $this->fechaOtorgamiento;
    }
    public function getMonto(): float
    {
        return $this->monto;
    }
    public function getCantidadCuotas(): int
    {
        return $this->cantidadCuotas;
    }
    public function getTasaInteres(): float
    {
        return $this->tasaInteres;
    }
    public function getCuotas(): array
    {
        return $this->cuotas;
    }
    public function getObjCliente(): Cliente
    {
        return $this->ObjCliente;
    }
    //setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setCodigoElectrodomestico(int $codigoElectrodomestico): void
    {
        $this->codigoElectrodomestico = $codigoElectrodomestico;
    }
    public function setFechaOtorgamiento(string $fechaOtorgamiento): void
    {
        $this->fechaOtorgamiento = $fechaOtorgamiento;
    }
    public function setMonto(float $monto): void
    {
        $this->monto = $monto;
    }
    public function setCantidadCuotas(int $cantidadCuotas): void
    {
        $this->cantidadCuotas = $cantidadCuotas;
    }
    public function setTasaInteres(float $tasaInteres): void
    {
        $this->tasaInteres = $tasaInteres;
    }
    public function setCuotas(array $cuotas): void
    {
        $this->cuotas = $cuotas;
    }
    public function setObjCliente(Cliente $ObjCliente): void
    {
        $this->ObjCliente = $ObjCliente;
    }


    private function calcularInteresPrestamo(int $numCuota): float
    {
        $valorCuota = $this->getMonto() / $this->getCantidadCuotas();
        $saldoDeudor = $this->getMonto() - ($valorCuota * ($numCuota - 1));
        $interes = $saldoDeudor * ($this->getTasaInteres() / 100);
        return $interes;
    }


    public function otorgarPrestamo(): void
    {
        $this->setFechaOtorgamiento(getdate()['year'] . "-" . getdate()['mon'] . "-" . getdate()['mday']);
        $valorCuota = $this->getMonto() / $this->getCantidadCuotas();
        $arregloCuotas = [];
        for ($i = 1; $i <= $this->getCantidadCuotas(); $i++) {
            $interes = $this->calcularInteresPrestamo($i);
            $cuota = new Cuota($i, $valorCuota, $interes);
            $arregloCuotas[] = $cuota;
        }

        $this->setCuotas($arregloCuotas);
    }


    public function darSiguienteCuotaPagar(): ?Cuota
    {
        $resultado = null;
        foreach ($this->getCuotas() as $ObjCuota) {
            if (!$ObjCuota->getCancelada()) {
                $resultado = $ObjCuota;
            }
        }
        return $resultado;
    }

    //tostring 
    public function __toString()
    {
        return "ID: " . $this->getId() . "\n" .
            "Codigo Electrodomestico: " . $this->getCodigoElectrodomestico() . "\n" .
            "Fecha Otorgamiento: " . $this->getFechaOtorgamiento() . "\n" .
            "Monto: " . $this->getMonto() . "\n" .
            "Cantidad Cuotas: " . $this->getCantidadCuotas() . "\n" .
            "Tasa Interes: " . $this->getTasaInteres() . "\n" .
            "Cliente: \n" . $this->getObjCliente() . "\n";
    }
}
