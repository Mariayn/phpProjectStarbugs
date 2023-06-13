<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sucursal
 *
 * @author maria
 */
class Sucursal {
    //put your code here
    private $id;
    private $sucursal;
    private $direccion;
    private $codigoSucursal;
    
    function __construct($id, $sucursal, $direccion, $codigoSucursal) {
        $this->id = $id;
        $this->sucursal = $sucursal;
        $this->direccion = $direccion;
        $this->codigoSucursal = $codigoSucursal;
    }
    
    function getId() {
        return $this->id;
    }

    function getSucursal() {
        return $this->sucursal;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCodigoSucursal() {
        return $this->codigoSucursal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSucursal($sucursal) {
        $this->sucursal = $sucursal;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCodigoSucursal($codigoSucursal) {
        $this->codigoSucursal = $codigoSucursal;
    }

}
