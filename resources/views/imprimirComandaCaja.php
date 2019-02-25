<?php
 
 
require __DIR__ . '/imprimir/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
 
/*
	Este ejemplo imprime un hola mundo en una impresora de tickets
	en Windows.
	La impresora debe estar instalada como genérica y debe estar
	compartida
*/
 
/*
	Conectamos con la impresora
*/
 
 
/*
	Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/
 
class Producto{
 
	public function __construct($nombre, $precio, $cantidad){
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->cantidad = $cantidad;
	}
}
 
/*
	Vamos a simular algunos productos. Estos
	podemos recuperarlos desde $_POST o desde
	cualquier entrada de datos. Yo los declararé
	aquí mismo
*/
 
$productos = array();

foreach ($comida as $plato) {
	$com = new Producto($plato->nombre,$plato->precio*(1-($plato->descuento/100)),$plato->cantidad);
	array_push($productos,$com);
}

foreach ($bebiditas as $bebida) {
	$com = new Producto($bebida->nombre,$bebida->precio*(1-($bebida->descuento/100)),$bebida->cantidad);
	array_push($productos,$com);
}

foreach ($pastelitos as $pastel) {
	$com = new Producto($pastel->nombre,$pastel->precio*(1-($pastel->descuento/100)),$pastel->cantidad);
	array_push($productos,$com);
}

foreach ($cafeteria as $cafe) {
	$com = new Producto($cafe->nombre,$cafe->precio*(1-($cafe->descuento/100)),$cafe->cantidad);
	array_push($productos,$com);
}

foreach ($agregaditos as $agregado) {
	$com = new Producto($agregado->nombre,$agregado->precio*(1-($agregado->descuento/100)),1);
	array_push($productos,$com);
}

foreach ($heladitos as $helado) {
	$com = new Producto($helado->nombre,$helado->precio*(1-($helado->descuento/100)),$helado->cantidad);
	array_push($productos,$com);
}

foreach ($postresitos as $postre) {
	$com = new Producto($postre->nombre,$postre->precio*(1-($postre->descuento/100)),$postre->cantidad);
	array_push($productos,$com);
}

foreach ($desayunitos as $desayuno) {
	$com = new Producto($desayuno->nombre,$desayuno->precio*(1-($desayuno->descuento/100)),$desayuno->cantidad);
	array_push($productos,$com);
}
 
/*
	Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/
 
$nombre_impresora = "XP-58"; 
 
 
$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
 
 
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras
 
	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/
 
# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);
 
/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("img/logo.png", false);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}
 
/*
	Ahora vamos a imprimir un encabezado
*/
 
#La fecha también
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("\n"); 

$printer->text("Mesa ".$num.":"); 
$printer->text("\n\n");
/*
	Ahora vamos a imprimir los
	productos
*/
 
# Para mostrar el total
$total = 0;
foreach ($productos as $producto) {
	$total += $producto->cantidad * $producto->precio;
 
	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text($producto->cantidad . "x" . $producto->nombre . "\n");
 
    /*Y a la derecha para el importe*/
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->text(' $' . $producto->precio * $producto->cantidad . "\n");
}
 
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("--------\n");
$total=explode(".",$total);
$printer->text("Total: $". $total[0] ."\n");
if ($desc != 0) {
	$printer->text("Descuento: ". $desc ."%\n");
	$total=explode(".",$total[0]-$total[0]*($desc/100));
	$printer->text("Total c/Desc: $". $total[0] ."\n");
}

$propi=explode(".",$total[0]*0.1);
$total_p=explode(".",$total[0]*1.1);
$printer->text("propina sugerida: $". $propi[0] ."\n");
$printer->text("--------\n");
$printer->text("Total sugerido: $". $total_p[0] ."\n");
 
 
/*
	Podemos poner también un pie de página
*/
$printer->text("\n");

$printer->text("Muchas gracias por su visita\n");
 
 
 
/*Alimentamos el papel 3 veces*/
$printer->feed(3);
 
/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();
 
/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();
 
/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();
?>
<script type='text/javascript'>
	window.close();
</script>