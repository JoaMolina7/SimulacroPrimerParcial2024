<?php
/**public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa) */
/**Para el caso de las motos importadas, se debe almacenar el país desde el que se importa
y el importe correspondiente a los impuestos de importación que la empresa paga por el ingreso al país */

class MotoImportada extends Moto{
private $importeImpuestos;
private $paisOrigen;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $paisOrigen, $importeImpuestos){
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->importeImpuestos = $importeImpuestos;
        $this->paisOrigen = $paisOrigen;
    }

    public function getImporteImpuestos(){
        return $this->importeImpuestos;
    }

    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    public function setImporteImpuestos($newImporteImpuestos){
        $this->importeImpuestos = $newImporteImpuestos;
    }

    public function setPaisOrigen($newPaisOrigen){
        $this->paisOrigen = $newPaisOrigen;
    }

    public function __toString(){
        return parent::__toString() ."Importe Impuestos: $" . $this->importeImpuestos . "\nPais Origen: " . $this->paisOrigen . "\n";
    }

    /**
4. Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento
sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el
impuesto que pagó la empresa por su importación. A continuación se describe el método darPrecioVenta con el
objetivo de tener presente su implementación y realizar las modificaciones que crea necesarias para dar soporte al
nuevo requerimiento */
/**FUNCIÓN DEL PADRE: public function darPrecioVenta(){
    $_venta = 0;
    if($this->getActiva() == false){
      $_venta = -1;
    }else{
        $_compra = $this->getCosto();
        $anioActual = intval(date("Y"));
        $anio = $anioActual - $this->getAnioFabricacion();
        $por_inc_anual = $this->getPorcentajeIncrementoAnual();
        $por_inc_anual = $por_inc_anual / 100;
        $_venta = $_compra + $_compra * ($anio * $por_inc_anual);
    }
    return $_venta;
} */

    public function darPrecioVenta(){
        $venta = parent::darPrecioVenta();
        if($venta != -1){
            $impuestos = $this->getImporteImpuestos();
            $venta += $impuestos;
        }
        return $venta;
    }
    
}
?>