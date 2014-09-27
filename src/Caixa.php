<?php

class Caixa {

    private $notasDisponiveis = array(
        100,
        50,
        20,
        10,
        5
    );
    private $saldo;

    public function __construct($valor) {
        $this->saldo = $valor;
    }

    private function validaValorSaque($input) {
        if (!is_int($input / end($this->notasDisponiveis))) {
            throw new CaixaException("Não é possível sacar esse valor.");
        }
    }

    private function validaSaldo($input) {
        if ($input > $this->saldo) {
            throw new CaixaException("Não há saldo suficiente.");
        }
    }

    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    public function sacar($input) {
        $this->validaValorSaque($input);
        $this->validaSaldo($input);

        $resultado = array();

        foreach ($this->notasDisponiveis as $nota) {
            if ($nota <= $input && $input != 0) {
                $quantidadeNota = (int) ($input / $nota);
                $resultado[$nota] = $quantidadeNota;
                $input -= ($nota * $quantidadeNota);
            }
        }

        return $resultado;
    }
}
