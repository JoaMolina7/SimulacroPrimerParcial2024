<?php
/**En la clase Moto:
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
 */
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;//boolean

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

public function getCodigo(){
    return $this->codigo;
}

public function getCosto(){
    return $this->costo;
}

public function getAnioFabricacion(){
    return $this->anioFabricacion;
}

public function getDescripcion(){
    return $this->descripcion;
}

public function getPorcentajeIncrementoAnual(){
    return $this->porcentajeIncrementoAnual;
}

public function getActiva(){
    return $this->activa;
}

public function setCodigo($newCodigo){
    $this->codigo = $newCodigo;
}

public function setCosto($newCosto){
    $this->costo = $newCosto;
}

public function setAnioFabricacion($newAnioFabricacion){
    $this->anioFabricacion = $newAnioFabricacion;
}

public function setDescripcion($newDescripcion){
    $this->descripcion = $newDescripcion;
}

public function setPorcentajeIncrementoAnual($newPorcentajeIncrementoAnual){
    $this->porcentajeIncrementoAnual = $newPorcentajeIncrementoAnual;
}

public function setActiva($newActiva){
    $this->activa = $newActiva;
}

public function __toString(){
    $stringActiva = $this->LeerActiva($this->getActiva());
    return "Código: ". $this->getCodigo() ."\n".
    "Costo: $". $this->getCosto() ."\n".
    "Anio de fabricación: ". $this->getAnioFabricacion() ."\n".
    "Descripción: ". $this->getDescripcion() ."\n".
    "Porcentaje de incremento anual: ". $this->getPorcentajeIncrementoAnual() ."%\n".
    "Activa: ". $stringActiva ."\n";
}

protected function LeerActiva($activaONo){
    if($activaONo == true){
        return "Activa";
    }else{
        return "No está activa";
    }
}
/**
 *Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
 */
public function darPrecioVenta(){
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
}

}
?>