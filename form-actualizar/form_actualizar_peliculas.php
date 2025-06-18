<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <?php 
        $codigo = $_POST['hidden_codigoa'];
        //buscar el codigo en la base de datos en la tabla de regiones
        require_once("conexion.php");
        $sql="select * from peliculas where pelicula_id=".$codigo;
        //ejecutar la consulta en la base de datos utilizando
        //la conexión realizada
        $ejecutar =mysqli_query($conexion, $sql);
        //convierte los datos a un array de php
        $datos = mysqli_fetch_assoc($ejecutar);
        //print_r($datos);
        //echo $datos['nombre'];
        ?>
    <div class="container">
        <h1>Modificar Películas</h1>
        <!--crud_region.php es el archivo que realizara los procesos 
        crud en la bd-->
        <form action="procesos_crud/crud_peliculas.php" method="post">
            <label for="txt_id" class="form-label">Película</label>
            <input type="number" name="txt_id" id="txt_id" 
                value="<?php echo $codigo;?>" class="form-control" 
                readonly>
            <label class="form-label" for="txt_nombre">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" 
                value="<?php echo $datos['nombre'];?>" 
                class="form-control">
            <label for="txt_desc" class="form-label">Descripción</label>
            <input type="text" name="txt_desc" id="txt_desc" 
                value="<?= $datos['descripcion']?>"
                class="form-control">
            <label class="form-label" for="txt_nombre">Nombre de la Película</label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?php echo $datos['nombre'];?>">
            <label for="txt_estreno" class="form-label">Fecha de Estreno</label>
            <input type="date" name="txt_estreno" id="txt_estreno" class="form-control" value="<?php echo $datos['fecha_estreno'];?>">
            <label for="txt_duracion" class="form-label">Duración</label>
            <input type="time" name="txt_duracion" id="txt_duracion" class="form-control" value="<?php echo $datos['duracion_minutos'];?>">
            <label for="txt_director" class="form-label">Director</label>
            <input type="text" name="txt_director" id="txt_director" class="form-control" value="<?php echo $datos['director_id'];?>">
            <button type="submit" class="form-control btn btn-primary"
                name="btn_modificar" id="btn_modificar">
                Modificar Región</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</body>
</html>