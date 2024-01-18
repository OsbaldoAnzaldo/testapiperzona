<?php
namespace App\Builders;
// Builder
interface Builder {
    public function construirCPU();
    public function construirRAM();
    public function construirDiscoDuro();
    public function obtenerComputadora();
}

// Builder Concreto
class ConstructorBasico implements Builder {
    private $computadora;

    public function __construct() {
        $this->computadora = new Computer();
    }

    public function construirCPU() {
        $this->computadora->setCPU("CPU Básica");
    }

    public function construirRAM() {
        $this->computadora->setRAM("RAM Básica");
    }

    public function construirDiscoDuro() {
        $this->computadora->setDiscoDuro("Disco Duro Básico");
    }

    public function obtenerComputadora() {
        return $this->computadora;
    }
}