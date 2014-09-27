<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CaixaException
 *
 * @author ubuntu
 */
class CaixaException extends Exception{
    
    public function __construct($mensagem) {
        parent::__construct($mensagem);
    }
    
}
