<?php 
    require("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Contactos</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <h1 id="xd">Administraci&oacute;n de Contactos</h1> 
   <form action="crear.php">
   <button>Crear registro</button>
   </form>
   <br>

   <h1 id="xd">Lista de Contactos</h1>
   <br>
   
   <table class="table table-striped">
        <tr class="tr_encabezado">
            <td>Carnet</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Telefono</td>
            <td>Editar/Eliminar Contacto</td>
        </tr>
        <?php 
            buscarMembresia();
        ?>
   </table>
</body>
</html>