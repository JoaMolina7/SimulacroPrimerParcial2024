<?php
/**En la clase Venta:
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
 */
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colObjMotos;
    private $precioFinal;

    public function __construct($numero, $fecha, $objCliente, $colObjMotos, $precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colObjMotos = $colObjMotos;
        $this->precioFinal = $precioFinal;
    }

    //Getters
    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){ 
        return $this->fecha;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }

    public function getColObjMotos(){
        return $this->colObjMotos;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    //Setters
    public function setNumero($newNumero){
        $this->numero = $newNumero;
    }

    public function setFecha($newFecha){
        $this->fecha = $newFecha;
    }

    public function setObjCliente($newObjCliente){
        $this->objCliente = $newObjCliente;
    }

    public function setColObjMotos($newColObjMotos){
        $this->colObjMotos = $newColObjMotos;
    }

    public function setPrecioFinal($newPrecioFinal){
        $this->precioFinal = $newPrecioFinal;
    }

    public function __toString(){
        $cadenaMotos = $this->leerColObj($this->getColObjMotos());
        return "Numero:". $this->getNumero() .
        "\nFecha:". $this->getFecha() .
        "\nCliente:\n". $this->getObjCliente() .
        "\nMotos:\n". $cadenaMotos .
        "\nPrecio final:". $this->getPrecioFinal();
    }

    /**
     * Metodo auxiliar para mostrar arrays de objetos en el método __toString
     */
    protected function leerColObj($arrayDeObjetos){
        $cadena = "";
        foreach($arrayDeObjetos as $objMoto){
            $cadena = $cadena . $objMoto . "\n";
        }
        return $cadena;
    }

    /**
     * Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
     * incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
     * vez que incorpora una moto a la venta, debe actualizar la variable instanciaprecio final de la venta.
     * Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     */

    public function incorporarMoto($objMoto){
        $ventaFuePosible = false;
        if($objMoto->getActiva() && $this->getObjCliente()->getDadoDeBaja() == false){
            $ventaFuePosible = true;
            $nuevaColObjMotos = $this->getColObjMotos();
            array_push($nuevaColObjMotos, $objMoto);
            $this->setColObjMotos($nuevaColObjMotos);
            $nuevoPrecioFinal = $this->getPrecioFinal();
            $nuevoPrecioFinal = $nuevoPrecioFinal + $objMoto->darPrecioVenta();
            $this->setPrecioFinal($nuevoPrecioFinal);
        }
        return $ventaFuePosible;
    }
        




}
?>