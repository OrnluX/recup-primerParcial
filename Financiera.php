<?php
class Financiera
{
    private string $denominacion;
    private string $direccion;
    private array $prestamos;

    public function __construct(string $denominacion, string $direccion)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->prestamos = [];
    }

    //getters
    public function getDenominacion(): string
    {
        return $this->denominacion;
    }
    public function getDireccion(): string
    {
        return $this->direccion;
    }
    public function getPrestamos(): array
    {
        return $this->prestamos;
    }
    //setters
    public function setDenominacion(string $denominacion): void
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }
    public function setPrestamos(array $prestamos): void
    {
        $this->prestamos = $prestamos;
    }


    public function otorgarPrestamo(Cliente $objCliente, int $cant_cuotas, float $monto, float $interes): void
    {
        $prestamo = new Prestamo($monto, $cant_cuotas, $interes, $objCliente);
        $arregloPrestamos = $this->getPrestamos();
        $arregloPrestamos[] = $prestamo;
        $this->setPrestamos($arregloPrestamos);
    }


    public function otorgarPrestamoSiCalifica(Cliente $objCliente, int $cant_cuotas, float $monto, float $interes): void
    {
        foreach ($this->getPrestamos() as $prestamo) {
            if (count($prestamo->getCuotas()) == 0) {
                if ($monto / $cant_cuotas <= $objCliente->getImporteNeto() * 0.4) {
                    $this->otorgarPrestamo($objCliente, $cant_cuotas, $monto, $interes);
                }
            }
        }
    }


    public function informarCuotaPagar(int $idPrestamo): ?Cuota
    {
        $referencia = null;
        foreach ($this->getPrestamos() as $prestamo) {
            if ($prestamo->getId() === $idPrestamo) {
                $referencia = $prestamo->darSiguienteCuotaPagar();
            }
        }
        return $referencia;
    }


    //tostring
    public function __toString(): string
    {
        $prestamosStr = "";
        foreach ($this->getPrestamos() as $prestamo) {
            $prestamosStr .= $prestamo->__toString() . "\n";
        }
        return "Denominacion: " . $this->getDenominacion() . "\n" .
            "Direccion: " . $this->getDireccion() . "\n" .
            "Prestamos: \n" . $prestamosStr;
    }
}
