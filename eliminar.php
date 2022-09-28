<?php
    require("conexion.php");

    if(isset($_GET["id"])){
        $carnet = $_GET["id"];

        if(eliminarMembresia($carnet)==1){
            echo "<script>alert('Registro eliminado con exito');
            location.replace('index.php');</script>";
        }else{
            echo "<script>alert('Error al intentar eliminar');
            location.replace('index.php');</script>";
        }
    }
?>