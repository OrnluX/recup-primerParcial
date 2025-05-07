<?php
include_once "Prestamo.php";
include_once "Cliente.php";
include_once "Cuota.php";
include_once "Financiera.php";

$cliente1 = new Cliente("Pepe", "Florez", 14555666, "Bs As 12", "pepito@gmail.com", 444567, 40000);
$cliente2 = new Cliente("Luis", "Suarez", 13555444, "Av argentina 3333", "luisito@gmail.com", 4469292, 4000);

$financiera = new Financiera("ElectroCash", "Av. Argentina 1234");

$prestamo1 = new Prestamo(50000, 5, 0.1, $cliente1);
$prestamo2 = new Prestamo(10000, 4, 0.1, $cliente2);
$prestamo3 = new Prestamo(10000, 2, 0.1, $cliente2);

$financiera->otorgarPrestamo($cliente1, 5, 50000, 0.1);
$financiera->otorgarPrestamo($cliente2, 4, 10000, 0.1);
$financiera->otorgarPrestamo($cliente2, 2, 10000, 0.1);

$financiera->otorgarPrestamoSiCalifica($cliente1, 5, 50000, 0.1);
$financiera->otorgarPrestamoSiCalifica($cliente2, 4, 10000, 0.1);
$financiera->otorgarPrestamoSiCalifica($cliente2, 2, 10000, 0.1);

$objCuota = $financiera->informarCuotaPagar(2);
echo $objCuota;
// echo $financiera;
