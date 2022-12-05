<?php
    session_start();
    require 'includes/app.php';

    $sql = "SELECT * FROM practicas";

    $resultado = $DB->query($sql);
    
    $listadopracticas = [];

    while( $practica = mysqli_fetch_assoc($resultado) ){

      $listadopracticas[] = $practica;

    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // Obtener producto
        $query = 'SELECT * FROM practicas WHERE id = ' . $_POST["id"];

        $resultado = $DB->query($query);

        $practica = mysqli_fetch_assoc($resultado);

        $imageName = $practica["imagen"];

        // eliminar imagen
        if( isset($imageName) && $imageName != "" ){
            $path = CARPETA_IMAGENES . "/" . $imageName;
            if(file_exists($path)){
                unlink($path);
            }
        }

        $sql = "DELETE FROM productos WHERE id = ".$_POST['id'];

        if ($DB->query($sql)){
            header('Location: /practica/administrar.php');
        }
    }

    require 'includes/templates/header.php';
?>

<main>
    <div class="container my-5">
        <!-- <?php include 'message.php'?> -->
        <div class="table-responsive">
            <h2 class="col-12 my-3 text-center">Administrar Prácticas</h2>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Intitución</th>
                        <th scope="col">Comuna</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Termino</th>
                        <th scope="col">Objetivo</th>
                        <th scope="col">Funciones</th>
                        <th scope="col">Competencias Requeridas</th>
                        <th scope="col">Tipo Práctica</th>
                        <th scope="col">Compensación</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($listadopracticas as $practica):?>
                        <tr>
                            <td> <?php echo $practica["id"]?> </td>
                            <td class="p-0">
                                <img src="imagenes/<?php echo $practica["imagen"] ?>" style="max-height: 100px; object-fit: cover;">
                            </td>                                            
                            <td> <?php echo $practica["nombre"]?> </td>
                            <td> <?php echo $practica["institucion"]?> </td>
                            <td> <?php echo $practica["comuna"]?> </td>
                            <td> <?php echo $practica["fecha_inicio"]?> </td>
                            <td> <?php echo $practica["fecha_termino"]?> </td>
                            <td> <?php echo $practica["objetivo"]?> </td>
                            <td> <?php echo $practica["funciones"]?> </td>
                            <td> <?php echo $practica["competencias"]?> </td>
                            <td> <?php echo $practica["tipo"]?> </td>
                            <td> <?php echo $practica["compensacion"]?> </td>
                            <td> <?php echo $practica["cantidad"]?> </td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-12 col-lg-6">
                                        <a href="/practica/modificar.php?id=<?php echo $practica["id"]?>" 
                                        class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                    <a href="eliminar.php? id=<?php echo $practica["id"]?>" type="button" class="btn btn-outline-danger">
                                    <i class="bi bi-x-square-fill"></i>
                                    </a>   
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Práctica<span></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Seguro que deseas eliminar la práctica seleccionada?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <form method="post">
                                <input type="hidden" name = "id" value = "<?php echo $practica["id"]?>" >
                                <button id="btn" class="btn btn-outline-danger">Eliminar</button>
                            </form> 
                            
                        </div>
                    </div>
                </div>
            </div>

        </div> 

        <div class="col-12 my-3 btn-responsive text-center">
            <a href="/practica/agregar.php" class="btn btn-outline-success"><i class="bi bi-plus-square"></i> Agregar</a>
        </div>
        
    </div>
</main>

<?php require 'includes/templates/end.php'; ?>
