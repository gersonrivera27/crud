<?php 
    require("conexion.php");

    $carnet = "";
    $nombre = "";
    $apellido = "";
    $telefono = "";

    if(isset($_GET["id"])){
        $carnet = $_GET["id"];

        $idConexion = conectar();
        $comando = "select * from registro WHERE carnet='$carnet'";
        $query = mysqli_query($idConexion,$comando);
        $nfilas = mysqli_num_rows($query);
        if($nfilas!=0){
            $hayDatos = mysqli_fetch_array($query);
            $nombre = $hayDatos["nombre"];
            $apellido = $hayDatos["apellido"];
            $telefono = $hayDatos["telefono"];
        }
        desconectar($idConexion);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Contactos</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
   <h1 id="xd">Editar Membresia</h1> 
   <form action="index.php">
       <button type="sumbit">Regresar</button>
   </form>
   <br><hr>

   <form method="post" action="editar.php">
       <input  type="hidden" name="carnet" value="<?php echo $carnet; ?>">
        </label><br>
        <label>Nombre:
            <input required class="input" type="text" name="nombre" value="<?php echo $nombre; ?>">
        </label><br>
        <br>
        <label>Apellido:
            <input required class="input" type="text" name="apellido" value="<?php echo $apellido; ?>">
        </label><br>
        <br>
        <label>Telefono:
            <input required class="input" type="num" name="telefono" value="<?php echo $telefono; ?>">
        </label><br>
        
        </label><br>
        <button type="sumbit">Modificar Contacto</button>
   </form>

   <?php 
        if($_POST){
           $nombre = $_POST["nombre"];
           $apellido = $_POST["apellido"];
           $telefono = $_POST["telefono"];
           $carnet = $_POST["carnet"];

           $estadoTransaccion = modificarMembresia($nombre,$apellido,$telefono,$carnet);
           if($estadoTransaccion=="1"){
               echo "<script>alert('La membresia se modifico con exito');
               location.replace('index.php');</script>";
           }else{
               echo "<p>Error: No se pudo modificar los datos.</p>";
           }
        }
   
   ?>
   
</body>
</html>