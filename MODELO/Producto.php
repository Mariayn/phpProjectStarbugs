<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author maria
 */
class Producto {
    //put your code here
     private $id;
     private $categoria;
     private $nombre;
     private $precio;
     private $descripcion;
     private $ruta_imagen;
     private $activo;
     private $subcategoria;
     
     function __construct($id, $categoria, $nombre, $precio, $descripcion, $ruta_imagen, $activo, $subcategoria) {
         $this->id = $id;
         $this->categoria = $categoria;
         $this->nombre = $nombre;
         $this->precio = $precio;
         $this->descripcion = $descripcion;
         $this->ruta_imagen = $ruta_imagen;
         $this->activo = $activo;
         $this->subcategoria = $subcategoria;
     }
     
     function getId() {
         return $this->id;
     }

     function getCategoria() {
         return $this->categoria;
     }

     function getNombre() {
         return $this->nombre;
     }

     function getPrecio() {
         return $this->precio;
     }

     function getDescripcion() {
         return $this->descripcion;
     }

     function getRuta_imagen() {
         return $this->ruta_imagen;
     }

     function getActivo() {
         return $this->activo;
     }

     function getSubcategoria() {
         return $this->subcategoria;
     }

     function setId($id) {
         $this->id = $id;
     }

     function setCategoria($categoria) {
         $this->categoria = $categoria;
     }

     function setNombre($nombre) {
         $this->nombre = $nombre;
     }

     function setPrecio($precio) {
         $this->precio = $precio;
     }

     function setDescripcion($descripcion) {
         $this->descripcion = $descripcion;
     }

     function setRuta_imagen($ruta_imagen) {
         $this->ruta_imagen = $ruta_imagen;
     }

     function setActivo($activo) {
         $this->activo = $activo;
     }

     function setSubcategoria($subcategoria) {
         $this->subcategoria = $subcategoria;
     }



}
