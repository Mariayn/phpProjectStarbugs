<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcepcionOrden
 *
 * @author maria
 */
class Excepcion extends Exception{
    //put your code here
    private $codigo;
    private $mensaje;
    private $url;
    
    function __construct($codigo, $mensaje,$url) {
        $this->codigo = $codigo;
        $this->mensaje = $mensaje;
        $this->url = $url;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }
    
    function getUrl() {
        return $this->url;
    }

    function setUrl($url) {
        $this->url = $url;
    }



}
