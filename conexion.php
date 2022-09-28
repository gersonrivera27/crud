<script>
function alerta()
{
    var respuesta = confirm("Estas seguro que deseas eliminar el usuario?");

    if (respuesta == true)
    {
        return true;
    }else {
        return false;
    }
}
</script>

<?php
    function conectar(){
        $servidor = "localhost";
        $usuario = "root";
        $password = "root";
        $bd = "miagenda";

        $idConexion = mysqli_connect($servidor,$usuario,$password,$bd);
        return $idConexion;
    }


    function desconectar($idConexion){
        mysqli_close($idConexion);
    }

    function registrarMembresia($nombre, $apellido,$telefono){
        $idConexion = conectar();
        $comando = "INSERT INTO registro (nombre,apellido,telefono)
         VALUES('$nombre','$apellido','$telefono')";
        if(mysqli_query($idConexion,$comando)){
            $transaccion = 1;
        }else{
            $transaccion = 0;
        }
        desconectar($idConexion);
        return $transaccion;
    }

    function modificarMembresia($nombre,$apellido,$telefono,$carnet){
        $idConexion = conectar();
        $comando = "UPDATE registro SET nombre='$nombre',
        apellido='$apellido',telefono='$telefono'
        WHERE carnet='$carnet'";
        if(mysqli_query($idConexion,$comando)){
            $transaccion = 1;
        }else{
            $transaccion = 0;
        }
        desconectar($idConexion);
        return $transaccion;
    }

    function eliminarMembresia($id){
        $idConexion = conectar();
        $comando = "DELETE FROM registro WHERE carnet='$id'";
        if(mysqli_query($idConexion,$comando)){
            $transaccion = 1;
        }else{
            $transaccion = 0;
        }
        desconectar($idConexion);
        return $transaccion;
    }

    function buscarMembresia(){
        $idConexion = conectar();
        $comando = "SELECT * from registro order by carnet ASC";
        $query = mysqli_query($idConexion,$comando);
        $nfilas = mysqli_num_rows($query);
        if($nfilas==0){
            echo "
            <tr>
                <td colspan='5'>No existen registros de membresias</td>
            </tr>
            ";
        }else{
            while($cadaFila = mysqli_fetch_array($query)){
                $carnet = $cadaFila["carnet"];
                echo "
                <tr>
                    <td>$carnet</td>
                    <td>$cadaFila[nombre]</td>
                    <td> $cadaFila[apellido]</td>
                    <td>$cadaFila[telefono]</td>
                    <td>
                        <a  href='editar.php?id=$carnet'>Editar</a>
                        <a onclick='return alerta()' href='eliminar.php?id=$carnet';>Eliminar</a>
                    </td>
                </tr>
                ";
            }
        }

        desconectar($idConexion);
    }



?>