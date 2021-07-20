<html>
<body>
<?php
	/* conexion a la base de datos */
	$connect=mysqli_connect("127.0.0.1", "root", "", "registro");

			/* traspaso de datos ingresados en la página anterior */
			$nombre2= $_POST ['nombre'];
			$apellido2= $_POST ['apellido'];
			$teléfono2= $_POST ['teléfono'];
			$provincia2= $_POST ['provincia'];
			
			/* creación de la sentencia SQL que inserta datos */
			$consulta="insert into empleados (nombre, apellido, teléfono, provincia) values ('$nombre2','$apellido2','$teléfono2','$provincia2')";
	
	/* ejecución de la sentencia creada*/	
	$resultado=mysqli_query($connect,$consulta);
		
	header('Location: lista.php');

?>


</body>
</html>
