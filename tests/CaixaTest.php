<?php

class CaixaTest extends PHPUnit_Framework_TestCase {

    private $caixa;

    public function setUp() {
        $this->caixa = new Caixa(180);
    }

    public function testDeveRetornar20() {
        $resultado = $this->caixa->sacar(20);

        $esperado = array(
            20 => 1
        );

        $this->assertEquals($esperado, $resultado);
    }

    public function testDeveRetornar50() {
        $esperado = array(
            50 => 1
        );

        $this->assertEquals($esperado, $this->caixa->sacar(50));
    }

    public function testDeveRetornar10() {
        $esperado = array(
            10 => 1
        );

        $this->assertEquals($esperado, $this->caixa->sacar(10));
    }

    public function testDeveRetornarUmaNota10EUmaNota20() {
        $esperado = array(
            10 => 1,
            20 => 1
        );
        $this->assertEquals($esperado, $this->caixa->sacar(30));
    }

    public function testDeveRetornarDuasNotas20() {
        $esperado = array(
            20 => 2
        );
        $this->assertEquals($esperado, $this->caixa->sacar(40));
    }

    public function testDeveRetornarUmaNotaCada() {
        $esperado = array(
            100 => 1,
            50 => 1,
            20 => 1,
            10 => 1,
        );
        $this->assertEquals($esperado, $this->caixa->sacar(180));
    }

    /**
     * @expectedException CaixaException
     * @expectedExceptionMessage Não há saldo suficiente.       
     */
    public function testDeveRetornarErroQuandoNaoHaSaldo() {
        $esperado = "Não há saldo suficiente.";

        $this->assertEquals($esperado, $this->caixa->sacar(10000));
    }

    /**
     * @expectedException CaixaException
     * @expectedExceptionMessage Não é possível sacar esse valor.       
     */
    public function testDeveRetornarErroQuandoSaca17() {
        $esperado = "Não é possível sacar esse valor.";

        $this->assertEquals($esperado, $this->caixa->sacar(17));
    }

    public function testDeveRetornarUmaDe10EUmaDe5() {
        $esperado = array(
            10 => 1,
            5 => 1
        );
        
        $this->assertEquals($esperado, $this->caixa->sacar(15));
    }

}
