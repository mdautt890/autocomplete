<?php
// El objetivo de este demo no es realizar una busqueda con php, sino mostrar lo simple
// que es programar una rutina de autocompletado con jQuery UI, por esta razon no vamos
// a realizar nada importante en este archivo.

// recuperamos el criterio de la busqueda
$criterio = strtolower($_GET["term"]);
if (!$criterio) return;
?>
[<?php

// esta es una lista con algunas opciones, aunque en la practica estos datos deben salir de 
// alguna tabla en una base de datos
$productos = array(
	"Tarjeta de red Wi-Fi" => 134.45,
	"Tarjeta madre ECO" => 656.34,
	"Ventilador Inteligente" => 24.56
	);

// lo que haremos es algo extremadamente sencillo, recuerda que este no es el objetivo del demo:
// recorre el arreglo y si encuentras el texto, imprime el elemento.
// cada elemento debe tener la forma:
// { label : "lo que quieras que aparezca escrito", value: { datos del producto... } }
$contador = 0;
foreach ($productos as $descripcion => $valor) 
{
	if (strpos(strtolower($descripcion), $criterio) !== false) 
	{
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"precio\" : $valor } }";
	}
} // siguiente producto
?>]