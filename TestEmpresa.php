<?php
include_once('Cliente.php');
include_once('Moto.php');
include_once('Venta.php');
include_once('Empresa.php');
include_once('MotoImportada.php');
include_once('MotoNacional.php');

$objCliente1 = new Cliente("Juan", "Perez", false, "DNI", 12345678);
$objCliente2 = new Cliente("Maria", "Lopez", false, "DNI", 87654321);

$objMoto1 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto3 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle", 55, false, null);

$objMoto4 = new MotoImportada(14,12499900,2020,'Pitbike EnduroMotocross Apollo Aiii190cc Plr',100,true,'Francia',6244400);

$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123",[$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3,$objMoto4], []);
/**3. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes
= [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
4. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una
referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos
de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.
5. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [13,14]. Visualizar el resultado obtenido.
6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [14,2]. Visualizar el resultado obtenido.
7. Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
8. Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido.
9. Realizar un echo de la variable Empresa creada en 2. */
echo $objEmpresa->registrarVenta([11,12,13,14], $objCliente2). "\n";

echo $objEmpresa->registrarVenta([13,14], $objCliente2). "\n";

echo $objEmpresa->registrarVenta([14,2], $objCliente2). "\n";

$colVentasImportadas = $objEmpresa->informarVentasImportadas();

foreach($colVentasImportadas as $objVenta){
    print_r($objVenta);
}

echo $objEmpresa->informarSumaVentasNacionales();


echo $objEmpresa;

?>