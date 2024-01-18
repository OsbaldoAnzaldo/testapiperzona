<?php
//namespace App\Builders;
// Producto
class Computer {
    private $cpu;
    private $ram;
    private $ssd;

    public function setCPU($cpu) {
        $this->cpu = $cpu;
    }

    public function setRAM($ram) {
        $this->ram = $ram;
    }

    public function setSSD($ssd) {
        $this->ssd = $ssd;
    }

    public function showConfigurationComputer() {
        return "CPU: {$this->cpu}, RAM: {$this->ram}, SSD: {$this->ssd}";
    }
}
// Builder
interface Builder {
    public function buildCPU();
    public function buildRAM();
    public function buildSSD();
    public function getComputer();
}
// Builder Concrete
class ConstructorBasico implements Builder {
    private $computer;

    public function __construct() {
        $this->computer = new Computer();
    }

    public function buildCPU() {
        $this->computer->setCPU("Basic CPU");
    }

    public function buildRAM() {
        $this->computer->setRAM("Basic RAM");
    }

    public function buildSSD() {
        $this->computer->setSSD("Basic SSD");
    }

    public function getComputer() {
        return $this->computer;
    }
}
// Director
class Director {
    public function build(Builder $builder) {
        $builder->buildCPU();
        $builder->buildRAM();
        $builder->buildSSD();
    }
}
// Client
$construct = new ConstructorBasico();
$director = new Director();
$director->build($construct);

$computer = $construct->getComputer();
dd($computer->showConfigurationComputer());
