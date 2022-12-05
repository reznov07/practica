<?php 
    session_start();
    require 'includes/app.php';

    // if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if( !is_null($_GET) ){
        // debuguear($_GET);
        $query = 'SELECT * FROM practicas WHERE id = ' . $_GET["id"];

        $resultado = $DB->query($query);

        $practica = mysqli_fetch_assoc($resultado);
        
        if( is_null($practica) ){    
            header('Location: /practica');
        } 
    }

    
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        // Subir imagen
        $imagen = subirImagen($_FILES["imagen"]["tmp_name"],$practica["imagen"]);
        
        $sql = 'UPDATE practicas
        SET nombre = "' . $_POST['nombre']
        . '", institucion = "' . $_POST['institucion']
        . '", imagen = "' . $imagen 
        . '", comuna = "' . $_POST['comuna']
        . '", fecha_inicio = "' . $_POST['fecha_inicio'] 
        . '", fecha_termino = "' . $_POST['fecha_termino']
        . '", objetivo = "' . $_POST['objetivo']
        . '", funciones = "' . $_POST['funciones']
        . '", competencias = "' . $_POST['competencias']
        . '", tipo = "' . $_POST['tipo']
        . '", compensacion = "' . $_POST['compensacion']
        . '", cantidad = "' . $_POST['cantidad'] . '" 
        WHERE id = ' . $_POST['id'];
        
        if ($DB->query($sql)){
            $_SESSION['message1'] = "La práctica se modificó correctamente";
            header('Location: /practica/administrar.php');
            exit(0);
        }
        else {
            $_SESSION['message1'] = "La práctica no se modificó correctamente";
            header('Location: /practica/administrar.php');
            exit(0);
        }
    }

    require 'includes/templates/header.php';

?>
    
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">

                <form method="post" enctype="multipart/form-data" class="bg-light my-3 p-3">
                    
                    <h2 class="fw-bold mt-1 mb-3 text-center">Modificar Práctica Profesional</h2>

                    <!-- Campo id -->
                    <div class="form-group">
                        <label for="id">Id:</label>
                        <input type="text" name="id" id="id"  readonly value="<?php echo $practica["id"]?>">
                    </div>

                    <!-- Campo nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre"  placeholder="Ingrese el nombre..." value="<?php echo $practica["nombre"]?>">               
                    </div>

                    <!-- Campo institución -->
                    <div class="form-group">
                        <label for="institucion">Insitución:</label>
                        <input type="text" name="institucion" id="institucion" placeholder="Ingrese la institución..." value="<?php echo $practica["institucion"]?>">
                    </div>

                    <!-- Campo imagen -->
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" name="imagen" value="<?php echo $practica["imagen"]?>">
                    </div>

                    <!-- Campo comuna -->
                    <div class="form-group">
                        <label for="comuna">Comuna:</label>
                        <input type="text" name="comuna" id="comuna" placeholder="Ingrese la comuna..." value="<?php echo $practica["comuna"]?>">
                    </div>

                    <!-- Campo fecha inicio -->
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha ingreso:</label>
                        <div class="input-group">
                            <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Ingrese la fecha de ingreso..." value="<?php echo $practica["fecha_inicio"]?>">
                        </div>
                    </div>

                    <!-- Campo fecha termino -->
                    <div class="form-group">
                        <label for="fecha_termino">Fecha termino:</label>
                        <div class="input-group">
                            <input type="date" name="fecha_termino" id="fecha_termino" placeholder="Ingrese la fecha de termino..." value="<?php echo $practica["fecha_termino"]?>">
                        </div>
                    </div>

                    <!-- Campo objetivo -->
                    <div class="form-group">
                        <label for="objetivo">Objetivo:</label>
                        <div class="input-group">
                            <textarea name="objetivo" id="objetivo" rows="8"><?php echo $practica["objetivo"]?></textarea>
                        </div>
                    </div>

                    <!-- Campo funciones -->
                    <div class="form-group">
                        <label for="funciones">Funciones a desarrollar:</label>
                        <div class="input-group">
                            <textarea name="funciones" id="funciones" rows="8"><?php echo $practica["funciones"]?></textarea>
                        </div>
                    </div>

                    <!-- Campo competencias -->
                    <div class="form-group">
                        <label for="competencias">Competencias Requeridas:</label>
                        <div class="input-group">
                            <textarea name="competencias" id="competencias" rows="8"><?php echo $practica["competencias"]?></textarea>
                        </div>
                    </div>

                    <!-- Campo tipo -->
                    <div class="form-group">
                        <label for="tipo">Tipo de Práctica:</label>
                        <input type="text" name="tipo" id="tipo" placeholder="Ingrese el tipo de Práctica..." value="<?php echo $practica["tipo"]?>">
                    </div>

                    <!-- Campo compensacion -->
                    <div class="form-group">
                        <label for="compensacion">Compensación:</label>
                        <input type="number" name="compensacion" id="compensacion" placeholder="Ingrese la compensación..." value="<?php echo $practica["compensacion"]?>">

                    </div>

                    <!-- Campo cantidad -->
                    <div class="form-group">
                        <label for="cantidad">Cantidad de Vacantes:</label>
                        <input type="number" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de vacantes..." value="<?php echo $practica["cantidad"]?>">

                    </div>

                    <div class="row form-group text-center mb-0">

                        <div class="col-12 col-lg-6">
                            <button type="submit" class="btn btn-outline-success"><i class="bi bi-save"></i> Guardar</button>
                        </div>
                        <div class="col-12 col-lg-6">
                            <button type="reset" class="btn btn-outline-danger"><i class="bi bi-eraser"></i> Borrar cambios</button>
                        </div>
                        
                    </div>

                </form>
            </div>
        </div>
    </main>

    <?php require 'includes/templates/end.php'; ?>