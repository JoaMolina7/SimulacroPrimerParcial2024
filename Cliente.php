<?php
/**En la clase Cliente:
0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */
class Cliente{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipo;
    private $DNI;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipo, $DNI){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipo = $tipo;
        $this->DNI = $DNI;
    }

   public function getNombre(){
       return $this->nombre;
   }

   public function getApellido(){
       return $this->apellido;
   }

   public function getDadoDeBaja(){
       return $this->dadoDeBaja;
   }

   public function getTipo(){
       return $this->tipo;
   }

   public function getDNI(){    
       return $this->DNI;
   }

   public function setNombre($newNombre){
       $this->nombre = $newNombre;
   }

   public function setApellido($newApellido){
       $this->apellido = $newApellido;
   }

   public function setDadoDeBaja($newDadoDeBaja){
       $this->dadoDeBaja = $newDadoDeBaja;
   }

   public function setTipo($newTipo){
       $this->tipo = $newTipo;
   }

   public function setDNI($newDNI){
       $this->DNI = $newDNI;
   }

   public function __toString(){
       return "Nombre:". $this->getNombre() .
       "\nApellido:". $this->getApellido() .
       "\nDado de baja:". $this->getDadoDeBaja() .
       "\nTipo:". $this->getTipo() .
       "\nDNI:". $this->getDNI();
   }
}
