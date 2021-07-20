<?php
	/* conexion a la base de datos */
	$connect=mysqli_connect("127.0.0.1", "root", "", "registro");


/*inicializa en blanco variables auxiliares */
$nombre2 = '';
$apellido2= '';
$teléfono2 = '';
$provincia2= '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "SELECT * FROM empleados WHERE id=$id";
  $result = mysqli_query($connect, $consulta);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre2 = $row['nombre'];
    $apellido2 = $row['apellido'];
    $teléfono2 = $row['teléfono'];
    $provincia2 = $row['provincia'];

	
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre2 = $_POST['nombre'];
  $apellido2 = $_POST['apellido'];
  $teléfono2 = $_POST['teléfono'];
  $provincia2 = $_POST['provincia'];

  $actualiza = "UPDATE empleados set nombre = '$nombre2', apellido = '$apellido2', teléfono = '$teléfono2', provincia = '$provincia2'      WHERE id=$id";
 
 mysqli_query($connect, $actualiza);
  $_SESSION['message'] = 'Empleado actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: lista.php');
}

?>


      <form action="modificacion.php?id=<?php echo $_GET['id']; ?>" method="POST">
        
        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre2; ?>" placeholder="Update Title">
        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido2; ?>" placeholder="Update Title">
		<input name="teléfono" type="text" class="form-control" value="<?php echo $teléfono2; ?>" placeholder="Update Title">	                
		<input name="provincia" type="text" class="form-control" value="<?php echo $provincia2; ?>" placeholder="Update Title">
		
        <button class="btn-success" name="update">Modificar</button>
      </form>

