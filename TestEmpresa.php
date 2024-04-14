<?php
include_once('Cliente.php');
include_once('Moto.php');
include_once('Venta.php');
include_once('Empresa.php');
/**Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo.
código costo anio_fabricacion Descripcion porc_increment activo
11 2230000 2022 Benelli Imperiale 400 85% true
12 584000 2021 Zanella Zr 150 Ohc 70% true
13 999900 2023 Zanella Patagonian Eagle 250 55% false
4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
10. Realizar un echo de la variable Empresa creada en 2.*/
$objCliente1 = new Cliente("Juan", "Perez", false, "DNI", 12345678);
$objCliente2 = new Cliente("Maria", "Lopez", false, "DNI", 87654321);

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle", 55, false);

$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123",[$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);
/**el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente */
echo $objEmpresa->registrarVenta([11,12,13], $objCliente2). "\n";

echo $objEmpresa->registrarVenta([0], $objCliente2). "\n";

echo $objEmpresa->registrarVenta([2], $objCliente2). "\n";

$firstCol = $objEmpresa->retornarVentasXCliente($objCliente1->getTipo(), $objCliente1->getDNI());
$secondCol = $objEmpresa->retornarVentasXCliente($objCliente2->getTipo(), $objCliente2->getDNI());

print_r($firstCol);

print_r($secondCol);


echo $objEmpresa;

?>