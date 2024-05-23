<?php
/**En la clase Empresa:
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.

5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
*/
class Empresa{
    private $denominacion;
    private $direccion;
    private $colObjClientes;
    private $colObjMotos;
    private $colObjVentas;

    public function __construct($denominacion, $direccion, $colObjClientes, $colObjMotos, $colObjVentas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colObjClientes = $colObjClientes;
        $this->colObjMotos = $colObjMotos;
        $this->colObjVentas = $colObjVentas;
    }

    //Getters
    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getColObjClientes(){
        return $this->colObjClientes;
    }

    public function getColObjMotos(){
        return $this->colObjMotos;
    }

    public function getColObjVentas(){
        return $this->colObjVentas;
    }

    //Setters
    public function setDenominacion($newDenominacion){
        $this->denominacion = $newDenominacion;
    }

    public function setDireccion($newDireccion){
        $this->direccion = $newDireccion;
    }

    public function setColObjClientes($newColObjClientes){
        $this->colObjClientes = $newColObjClientes;
    }

    public function setColObjMotos($newColObjMotos){
        $this->colObjMotos = $newColObjMotos;
    }

    public function setColObjVentas($newColObjVentas){
        $this->colObjVentas = $newColObjVentas;
    }

    //Metodos
 /**
     * Metodo auxiliar para mostrar arrays de objetos en el método __toString
     */
    protected function leerColObj($arrayDeObjetos){
        $cadena = "";
        foreach($arrayDeObjetos as $objAnalizado){
            $cadena = $cadena . $objAnalizado . "\n";
        }
        return $cadena;
    }
    public function __toString(){
        $cadenaMotos = $this->leerColObj($this->getColObjMotos());//Muestra todas las motos
        $cadenaVentas = $this->leerColObj($this->getColObjVentas());//Muestra todas las ventas
        $cadenaClientes = $this->leerColObj($this->getColObjClientes());//Muestra todos los clientes
        return "Denominación:". $this->getDenominacion() .
        "\nDirección:". $this->getDireccion() .
        "\nClientes:\n". $cadenaClientes .
        "\nMotos:\n". $cadenaMotos .
        "\nVentas:\n". $cadenaVentas;
    }

    /**5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro. */
    public function retornarMoto($codigoMoto){
        $i = 0;
        $objMoto = null;
        while($i < count($this->getColObjMotos()) && $objMoto == null){//Mientras no se recorra toda la colección y no se encuentre el objeto 
            if($this->getColObjMotos()[$i]->getCodigo() == $codigoMoto){//Compara el codigo de la moto con el del parametro
                $objMoto = $this->getColObjMotos()[$i];
            }
            $i++;
        }
        return $objMoto;
    }

    /**6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
Considerar que el objeto Venta tiene estos atributos    private $numero;
    private $fecha;
    private $objCliente;
    private $colObjMotos;
    private $precioFinal;
    __construct($numero, $fecha, $objCliente, $colObjMotos, $precioFinal)
    Utilizar también método retornarMoto($codigoMoto)
     */
    public function registrarVenta($colCodigosMoto, $objCliente){
        $i = 0;
        $objMoto = null;
        $importeFinal = 0;
        $fecha = intval(date("Y"));
        $objNuevaVenta = new Venta(count($this->getColObjVentas()) + 1, $fecha, $objCliente, [], $importeFinal);
    
        while($i < count($colCodigosMoto)){
            $objMoto = $this->retornarMoto($colCodigosMoto[$i]);
                if($objMoto != null){
                    $objNuevaVenta->incorporarMoto($objMoto);
                    $importeFinal = $objNuevaVenta->getPrecioFinal();
                    $objNuevaVenta->setPrecioFinal($importeFinal);
                }
            $i++;
            }
                if(count($objNuevaVenta->getColObjMotos()) > 0){
                $nuevaColObjVenta = $this->getColObjVentas();
                array_push($nuevaColObjVenta, $objNuevaVenta);
                $this->setColObjVentas($nuevaColObjVenta);
                }

            return $objNuevaVenta->getPrecioFinal();
        }

        /**Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente */

        public function retornarVentasXCliente($tipo, $numDoc){
            $colVentas = [];
            foreach($this->getColObjVentas() as $objVenta){
                if($objVenta->getObjCliente()->getTipo() == $tipo && $objVenta->getObjCliente()->getDNI() == $numDoc){
                    array_push($colVentas, $objVenta);
                }
            }
            return $colVentas;
        }
        
        /**1. Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la
    empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.
    (*IMPORTANTE: invocar a los métodos implementados en la clase venta cuando crea necesario) */
        public function informarSumaVentasNacionales(){
            $importeTotal = 0;
            foreach($this->getColObjVentas() as $objVenta){
                $importeTotal += $objVenta->retornarTotalVentaNacional();
            }
            return $importeTotal;
        }


    /**2. Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y
    retorna una colección de ventas de motos importadas. Si en la venta al menos una de las motos es importada la
    venta debe ser informada. (*IMPORTANTE: invocar a los métodos implementados en la clase venta cuando crea necesario) */
        
        public function informarVentasImportadas(){
            $colVentasImportadas = [];
            foreach($this->getColObjVentas() as $objVenta){
                if (!empty($objVenta->retornarMotosImportadas())) { //El empty devuelve true si el array es vacío, por eso es !empty
                    array_push($colVentasImportadas, $objVenta->retornarMotosImportadas());
                }
            }
            return $colVentasImportadas;
        }
    
        
        
        
        
        
        
        
        
}
?>