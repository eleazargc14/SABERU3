<?php
include("conexion.php");
if (isset($_POST['Enviar'])) 
{
	if (!empty($_POST['nombre']) && !empty($_POST['comentario']))
	{
		mysqli_query($cnx,"INSERT INTO comentarios (comentario, nombre) VALUES
			( '$_POST[nombre]',
			'$_POST[comentario]')");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Deja tus comentarios</title>
	<meta charset="UTC-8">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body background="img/fondo.jpg">
     <form action="" method="post">
     	<h2>Ayudanos a mejorar este sitio web dejando tu comentario</h2>
     	<input type="text" name="nombre" placeholder="Ingresa tu nombre de usuario" required="Llene este campo por favor">

     	<textarea name="comentario" placeholder="Escriba aquí su comentario" required="Llene este campo por favor"></textarea>
     	<input type="submit" name="Enviar" id="boton">
     	</form>
     	<br>
     	<br>
     	<?php
			$sql="SELECT * from comentarios";
			$registro=mysqli_query($cnx,$sql);

			while($campo=mysqli_fetch_array($registro))
			{

		?>

		<div class="media float-right bg-color black" style="border-width: 2px;
              border-style: solid;
              border-color: lightgray; width:50%; margin-top:5px;">
				<img src="img/avatar.jpg" alt="photoprofile" class="mr-3 mt-3 rounded-circle" style="width:64px; height: 64px;">
						<div class="media-body">
							<h5><?php echo $campo['nombre'];?> <small><i>Posted on <?php echo $campo['date'];?></i></small></h5>
							<p><?php echo $campo['comentario'];?></p>
						</div>
					</div>
                     <?php
                        };
                 
                        ?>
		             
     

</body>
</html>