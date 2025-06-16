<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peliculas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <?php 
    require_once("procesos_crud/conexion.php");
    $sql="select * from peliculas";
    $ejecutar =mysqli_query($conexion, $sql);
    //recorrer todos los datos y mostrarlos
    ?>

    <div class="container">
        <h1>PELÍCULAS</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-transition" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar película
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Región</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="procesos_crud/crud_peliculas.php" method="post">
                            <label for="txt_codigo" class="form-label">Código</label>
                            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
                            <label class="form-label" for="txt_nombre">Nombre</label>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                            <label for="txt_desc" class="form-label">Descripción</label>
                            <input type="text" name="txt_desc" id="txt_desc" class="form-control">
                            <button type="submit" class="form-control btn btn-primary btn-transition" name="btn_insertar">
                                Agregar Región</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <a href="../vistas_card/vista_regiones_card.php" class="btn btn-secondary btn-transition">Regiones en formato card</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Región</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
    while($datos = mysqli_fetch_assoc($ejecutar)){
       ?>
                <tr>
                    <td><?php echo $datos['cod_region'];?></td>
                    <td><?php echo $datos['nombre'];?></td>
                    <td><?php echo $datos['descripcion'];?></td>
                    <td class="d-flex flex-row">
                        <form action="../procesos_crud/crud_region.php" method="post" class="me-1">
                            <input type="hidden" name="hidden_codigo" id="hidden_codigo"
                                value="<?php echo $datos['cod_region'];?>">
                            <button type="submit" name="btn_eliminar" id="btn_eliminar"
                                class="btn btn-outline-danger p-1 btn-icon">
                                <i class="bi bi-trash3"></i>
                            </button>
                            
                        </form>
                        <form action="../form_actualizar/form_actualizar_region.php" method="post">
                            <input type="hidden" name="hidden_codigoa" id="hidden_codigoa"
                                value="<?php echo $datos['cod_region'];?>">
                            <button type="submit" class="btn btn-outline-success p-1 btn-icon"
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
        <a href="../index.php" class="btn btn-warning btn-transition btn-regresar">Regresar a Inicio</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>

</body>
</html>


