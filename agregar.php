<?php 
    session_start();
    require 'includes/app.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        // Subir imagen
        $imagen = subirImagen($_FILES["imagen"]["tmp_name"]);
        
        $sql = 'INSERT INTO practicas (nombre, institucion, imagen, comuna, fecha_inicio, fecha_termino, objetivo, funciones, competencias, tipo, compensacion, cantidad)
        VALUES ("' . $_POST['nombre'] . '", "' . $_POST['institucion'] . '", "' . $imagen . '", "' . $_POST['comuna'] . '", "' . $_POST['fecha_inicio'] . '", "' . $_POST['fecha_termino'] . '", "' . $_POST['funciones'] . '", "' . $_POST['competencias'] . '", "' . $_POST['tipo'] . '", "' . $_POST['compensacion'] . '", "' . $_POST['cantidad'] . '", "' ;


        // Para que funcionen las "" htmlentities — Convierte todos los caracteres aplicables a entidades HTML
        $sql= $sql . htmlentities($_POST['objetivo']) . '")';


        if ($DB->query($sql)){
            $_SESSION['message'] = "La práctica se agregó correctamente";
            header('Location: /practica/administrar.php');
            exit(0);
        }
        else {
            $_SESSION['message'] = "La práctica no se agregó correctamente";
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
                
                <h2 class="fw-bold mt-1 mb-3 text-center">Ingresar Solicitud de Práctica</h2>

                <!-- Campo nombre -->
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre...">
                </div>

                <!-- Campo institución -->
                <div class="form-group">
                    <label for="institucion">Insitución:</label>
                    <input type="text" name="institucion" id="institucion" placeholder="Ingrese la institución...">
                </div>

                <!-- Campo imagen -->
                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen"  accept="img/png, image/jpeg">
                </div>

                <!-- Campo comuna -->
                <div class="form-group">
                    <label for="comuna">Comuna:</label>
                    <input type="text" name="comuna" id="comuna" placeholder="Ingrese la comuna...">
                </div>

                <!-- Campo fecha inicio -->
                <div class="form-group">
                    <label for="fecha_inicio">Fecha ingreso:</label>
                    <div class="input-group">
                        <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Ingrese la fecha de ingreso...">
                    </div>
                </div>

                <!-- Campo fecha termino -->
                <div class="form-group">
                    <label for="fecha_termino">Fecha termino:</label>
                    <div class="input-group">
                        <input type="date" name="fecha_termino" id="fecha_termino" placeholder="Ingrese la fecha de termino...">
                    </div>
                </div>

                <!-- Campo objetivo -->
                <div class="form-group">
                    <label for="objetivo">Objetivo:</label>
                    <div class="input-group">
                        <textarea name="objetivo" id="objetivo" rows="8"></textarea>
                    </div>
                </div>

                <!-- Campo funciones -->
                <div class="form-group">
                    <label for="funciones">Funciones a desarrollar:</label>
                    <div class="input-group">
                        <textarea name="funciones" id="funciones" rows="8"></textarea>
                    </div>
                </div>

                <!-- Campo competencias -->
                <div class="form-group">
                    <label for="competencias">Competencias Requeridas:</label>
                    <div class="input-group">
                        <textarea name="competencias" id="competencias" rows="8"></textarea>
                    </div>
                </div>

                <!-- Campo tipo -->
                <div class="form-group">
                    <label for="tipo">Tipo de Práctica:</label>
                    <input type="text" name="tipo" id="tipo" placeholder="Ingrese el tipo de Práctica...">
                </div>

                <!-- Campo compensacion -->
                <div class="form-group">
                    <label for="compensacion">Compensación:</label>
                    <input type="number" name="compensacion" id="compensacion" placeholder="Ingrese la compensación...">

                </div>

                <!-- Campo cantidad -->
                <div class="form-group">
                    <label for="cantidad">Cantidad de Vacantes:</label>
                    <input type="number" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de vacantes...">

                </div>

                <div class="row form-group text-center mb-0">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-outline-success"><i class="bi bi-file-earmark-plus"></i> Crear</button>
                    </div>

                    <div class="col-lg-6">
                        <button type="reset" class="btn btn-outline-danger"><i class="bi bi-trash3"></i> Borrar</button>
                    </div>
                </div>  

            </form>
        </div>
    </div>
</main>

<?php  
    require 'includes/templates/end.php';  
?>