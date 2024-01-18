<?php

namespace App\Builders;

$constructor = new ConstructorBasico();
$director = new Director();
$director->construir($constructor);

$computadora = $constructor->obtenerComputadora();
echo $computadora->mostrarConfiguracion();