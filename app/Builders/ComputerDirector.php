<?php
namespace App\Builders;
class Director {
    public function construir(Builder $builder) {
        $builder->construirCPU();
        $builder->construirRAM();
        $builder->construirDiscoDuro();
    }
}