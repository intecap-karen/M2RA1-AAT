<?php 
     //vamos a utilizar la conexión existente
        require_once("conexion.php");
    
    //se verifica que los datos vengan del formulario con el 
    //boton con nombre btn_modificar
    if(isset($_POST['btn_modificar'])){
        //recibir datos del formulario
        $id = $_POST['txt_id'];
        $nombre = $_POST['txt_nombre'];
        $estreno = $_POST['txt_estreno'];
        $duracion = $_POST['txt_duracion'];
        $director = $_POST['txt_director'];
        $sql = 'UPDATE peliculas set nombre="'.$nombre.'", 
                    fecha_estreno="'.$estreno.'", 
                    duracion_minutos="'.$duracion.'",
                    director_id="'.$director.'"
                    WHERE pelicula_id='.$id.';';
        echo $sql;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "Datos modificados";
            //envia a la vista regiones
            header('Location:../peliculas.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no actualizados<br>". $th;    
        }
    }
     //proceso de eliminar
    if(isset($_POST['btn_eliminar'])){
        $id = $_POST['hidden_codigo'];
        $sql = "delete from peliculas where pelicula_id=".$id;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>Datos eliminados";
            header('Location:../peliculas.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no eliminados guardados<br>". $th;        
        } 
    }

    //proceso de insertar
    if(isset($_POST['btn_insertar'])){
        //variable para cada dato que viene del formulario 
        $id = $_POST['txt_id'];
        $nombre = $_POST['txt_nombre'];
        $estreno = $_POST['txt_estreno'];
        $duracion = $_POST['txt_duracion'];
        $director = $_POST['txt_director'];
        echo "Datos de las Películas:";
        echo "<br>Película Id: ". $id;
        echo "<br>Nombre: ". $nombre;
        echo "<br>Fecha de Estreno: ". $estreno;
        echo "<br>Duración: ". $duracion;
        echo "<br>Director: ". $director;
        
        $sql="insert into peliculas(pelicula_id,nombre,
                    fecha_estreno,duracion_minutos,director_id) 
            values(".$id.",'".$nombre."','".$estreno."','".$duracion."','".$director."');";
        //ejecutar el sql en la conexión existente
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            //echo "valor de Ejecutar: ". $ejecutar;
            echo "<br>Datos almacenados";
            header('Location: ../peliculas.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron guardados<br>". $th;        
        } 

    }
?>