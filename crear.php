<?php 
    require("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Membresias</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
   <h1 id="xd">Crear Registro</h1> 
   <form action="index.php">
       <button type="sumbit">Regresar</button>
   </form>
   <br>
   <hr>

   <form method="post" action="crear.php">
        <label>Nombre:
            <input class="input" type="text" name="nombre" required>
        </label><br>
        </label><br>
        <label>Apellido:
            <input class="input" type="text"  name="apellido" required>
            </label><br>
            </label><br>
            <label>Telefono:
            <input class="input" type="num" name="telefono" required>
        </label><br>
        </label><br>
        </label><br>
        <button type = "sumbit" >Registrar Contacto</button>
        
   </form>

   <?php 
        if($_POST){
           $nombre = $_POST["nombre"];
           $apellido = $_POST["apellido"];
           $telefono = $_POST["telefono"];
           $estadoTransaccion = registrarMembresia($nombre,$apellido,$telefono);
           if($estadoTransaccion=="1"){
               echo "<script>alert('La membresia se registro con exito');
               location.replace('index.php');</script>";
           }else{
               echo "<p>Error: No se pudo registrar los datos.</p>";
           }
        }
   
   ?>
   
</body>
</html>