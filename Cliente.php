<?php
class Cliente
{
    private string $nombre;
    private string $apellido;
    private int $dni;
    private string $direccion;
    private string $mail;
    private int $telefono;
    private float $importeNeto;

    public function __construct(string $nombre, string $apellido, int $dni, string $direccion, string $mail, int $telefono, float $importeNeto)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->importeNeto = $importeNeto;
    }

    //getters
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function getDni(): int
    {
        return $this->dni;
    }
    public function getDireccion(): string
    {
        return $this->direccion;
    }
    public function getMail(): string
    {
        return $this->mail;
    }
    public function getTelefono(): int
    {
        return $this->telefono;
    }
    public function getImporteNeto(): float
    {
        return $this->importeNeto;
    }
    //setters
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }
    public function setDni(int $dni): void
    {
        $this->dni = $dni;
    }
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
    public function setTelefono(int $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setImporteNeto(float $importeNeto): void
    {
        $this->importeNeto = $importeNeto;
    }
    public function __toString(): string
    {
        return "Nombre: " . $this->getNombre() . "\n" .
            "Apellido: " . $this->getApellido() . "\n" .
            "DNI: " . $this->getDni() . "\n" .
            "Direccion: " . $this->getDireccion() . "\n" .
            "Mail: " . $this->getMail() . "\n" .
            "Telefono: " . $this->getTelefono() . "\n" .
            "Importe Neto: $" . number_format($this->getImporteNeto(), 2) . "\n";
    }
}
