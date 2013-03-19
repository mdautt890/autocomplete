<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Autocompletado con jQuery</title>
  <link rel="stylesheet" type="text/css" href="css/jquery.ui.css"/>
  <link rel="stylesheet" type="text/css" href="css/default.css"/>
</head>
<body>
	<div class="page">
  	<div class="content">
      <h1>Autocompletar</h1>
      <hr />
      <p class="description">Este es un ejemplo pr&aacute;ctico de las funciones de autocompletar de jQuery UI.</p>
      <table>
        <tr>
          <th>Cantidad</th>
          <th>Producto</th>
          <th>Precio</th>
          <th>Importe</th>
        </tr>
        <tr>
          <td><input id="txtCantidad" type="text" size="10" value="1" /></td>
          <td><input id="txtProducto" type="text" size="40" /></td>
          <td><label id="lblPrecio">0.00</label></td>
          <td><label id="lblImporte">0.00</label></td>
        </tr>
      </table>
    </div>
    <div class="footer">Eduardo Ferr&oacute;n { Zeion Software, 2011 }</div>
  </div>
	<script type="text/javascript" src="lib/jquery.1.7.1.js"></script>
  <script type="text/javascript" src="lib/jquery.ui.1.8.16.js"></script>
  <script type="text/javascript">
	
		// esta rutina se ejecuta cuando jquery esta listo para trabajar
		$(function() 
		{
			// configuramos el control para realizar la busqueda de los productos
			$("#txtProducto").autocomplete({
				source: "buscar.php", 				/* este es el formulario que realiza la busqueda */
				minLength: 2,									/* le decimos que espere hasta que haya 2 caracteres escritos */
				select: productoSeleccionado,	/* esta es la rutina que extrae la informacion del registro seleccionado */
				focus: productoMarcado
			});
		});
		
		// tras seleccionar un producto, calculamos el importe correspondiente
		function productoMarcado(event, ui)
		{
			var producto = ui.item.value;
			
			// no quiero que jquery maneje el texto del control porque no puede manejar objetos, 
			// asi que escribimos los datos nosotros y cancelamos el evento
			// (intenta comentando este codigo para ver a que me refiero)
			$("#txtProducto").val(producto.descripcion);
			event.preventDefault();
		}
		
		// tras seleccionar un producto, calculamos el importe correspondiente
		function productoSeleccionado(event, ui)
		{
			var producto = ui.item.value;
			var cantidad = $("#txtCantidad").val();
			
			// vamos a validar la cantidad con un procedimiento muy simple
			cantidad = parseInt(cantidad, 10); // convierte este valor en un entero base 10 (un numero cualquiera)
			if (isNaN(cantidad)) cantidad = 0;
			
			var precio = producto.precio;
			var importe = precio * cantidad;
			
			// actualizamos los datos en el formulario
			$("#lblPrecio").text(precio);
			$("#lblImporte").text(importe);
			
			// no quiero que jquery maneje el texto del control porque no puede manejar objetos, 
			// asi que escribimos los datos nosotros y cancelamos el evento
			// (intenta comentando este codigo para ver a que me refiero)
			$("#txtProducto").val(producto.descripcion);
			event.preventDefault();
		}
		
	</script>
</body>
</html>