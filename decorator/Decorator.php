<?php

class CalculadoraSalario {

  public function calcularSalario(double $valorPorHora) {
      return $valorPorHora * 40 * 5;
  }
}

class CalculadoraSalarioComImposto extends CalculadoraSalario {
  public function calcularSalario(double $valorPorHora) {
    return ($valorPorHora * 40 * 5) - ($valorPorHora * 40 * 5) * 0.15;
  }
}

class CalculadoraSalarioComPlanoSaude extends CalculadoraSalarioComImposto {

  public function calcularSalario(double $valorPorHora) {
    return (($valorPorHora * 40 * 5) - ($valorPorHora * 40 * 5) * 0.15) - 400;
  }
}

class CalculadoraSalarioCom { 

}



//
//extends to infinity








// with pattern

interface InterfaceCalculadora {
  public function calcularSalario(double $valorPorHora);
}

class DescontoImpostoCalculadoraSalario implements InterfaceCalculadora {

  public function __construct($calculadora, $impostos){
    $this->calculadora = $calculadora;
    $this->impostos = $impostos;
  }

  public function calcularSalario(double $valorPorHora) {
    $salarioBase = $this->calculadora->calcularSalario($valorPorHora);
    
    return $salarioBase - $salarioBase * $this->impostos;
  }
}

class DescontoPlanoCalculadoraSalario implements InterfaceCalculadora {

  public function __construct($calculadora, $valorPlano){
    $this->calculadora = $calculadora;
    $this->valorPlano = $valorPlano;
  }

  public function calcularSalario(double $valorPorHora) {
    $salarioBase = $this->calculadora->calcularSalario($valorPorHora);
    
    return $salarioBase - $this->valorPlano;
  }

}

$plano = 400;
$impostos = 0.15;

$calculadora = new DescontoPlanoCalculadoraSalario(
                  new DescontoImpostoCalculadoraSalario(
                    new CalculadoraSalario(), $impostos
                  ), $plano
              );

$calculadora->calcularSalario('25');