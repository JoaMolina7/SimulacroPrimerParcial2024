<?php
/** Con el objetivo de
incentivar el consumo de productos Nacionales, se desea almacenar un porcentaje de descuento en las motos Nacionales que
será aplicado al momento de la venta (por defecto el valor del descuento es del 15% */
/**public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa) */

class MotoNacional extends Moto{
    private $porcentajeDescuento;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $porcentajeDescuento){
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->porcentajeDescuento = $porcentajeDescuento ? $porcentajeDescuento : 15;
    }

    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($newPorcentajeDescuento){
        $this->porcentajeDescuento = $newPorcentajeDescuento;
    }

    public function __toString(){
        return parent::__toString() ."Porcentaje Descuento: " . $this->porcentajeDescuento . "%\n";
    }
    /**
4. Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento
sobre el valor calculado inicialmente. A continuación se describe el método darPrecioVenta con el
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
            $desc = $this->getPorcentajeDescuento();
            $desc = $desc / 100;
            $venta = $venta - ($venta * $desc);
        }
        return $venta;
    }


}
?>