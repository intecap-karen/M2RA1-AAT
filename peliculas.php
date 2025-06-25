<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PELÍCULAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/base.css">
</head>

<body>

    <?php 
    require_once("procesos_crud/conexion.php");
    $sql="select * from peliculas";
    //ejecutar la consulta en la base de datos utilizando
    //la conexión realizada
    $ejecutar =mysqli_query($conexion, $sql);
    //recorrer todos los datos y mostrarlos
    ?>

    <div class="container">
        <h1>PELÍCULAS</h1>
        <nav class="gap-3">
            <a href="index.html" class="btn-volver">Regresar</a>
            <!-- Button trigger modal -->
            <a type="button" class="btn-volver" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar Película</a>
        </nav>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5 text-modal-title" id="exampleModalLabel">Nueva Película</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="procesos_crud/crud_peliculas.php" method="post">
                            <label for="txt_id" class="form-label">Película Id</label>
                            <input type="number" name="txt_id" id="txt_id" class="form-control">
                            <label class="form-label" for="txt_nombre">Nombre de la Película</label>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                            <label for="txt_estreno" class="form-label">Fecha de Estreno</label>
                            <input type="date" name="txt_estreno" id="txt_estreno" class="form-control">
                            <label for="txt_duracion" class="form-label">Duración</label>
                            <input type="time" name="txt_duracion" id="txt_duracion" class="form-control">
                            <label for="txt_director" class="form-label">Director</label>
                            <input type="text" name="txt_director" id="txt_director" class="form-control">
                            <button type="submit" class="form-control btn-volver" name="btn_insertar">
                                Agregar Película</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Película ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Estreno</th>
                    <th>Duración</th>
                    <th>Director</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
    while($datos = mysqli_fetch_assoc($ejecutar)){
       ?>
                <tr>
                    <td><?php echo $datos['pelicula_id'];?></td>
                    <td><?php echo $datos['nombre'];?></td>
                    <td><?php echo $datos['fecha_estreno'];?></td>
                    <td><?php echo $datos['duracion_minutos'];?></td>
                    <td><?php echo $datos['director_id'];?></td>
                    <td class="d-flex flex-row">
                        <form action="procesos_crud/crud_peliculas.php" method="post" class="me-1">
                            <input type="hidden" name="hidden_codigo" id="hidden_codigo"
                                value="<?php echo $datos['pelicula_id'];?>">
                            <button type="submit" name="btn_eliminar" id="btn_eliminar"
                                class="btn btn-secondary p-1">
                                <i class="bi bi-trash3"></i>
                            </button>
                            
                        </form>
                        <form action="form_actualizar_peliculas.php" method="post">
                            <input type="hidden" name="hidden_codigoa" id="hidden_codigoa"
                                value="<?php echo $datos['pelicula_id'];?>">
                            <button type="submit" class="btn btn-secondary p-1"
                                name="btn_editar" id="btn_editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </form>

                        
                    </td>
                </tr>
                <?php
    }
?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>