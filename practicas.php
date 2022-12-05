<?php 
    include 'includes/funciones/conectarDB.php';

    require 'includes/app.php';

    $sql = "SELECT * FROM practicas";

    $resultado = $DB->query($sql);
    
    $listadopracticas = [];

    while( $practica = mysqli_fetch_assoc($resultado) ){
        
      $listadopracticas[] = $practica;

    } 


    require 'includes/templates/header.php';
    
?>

<main  class="container" style="position:relative; padding-bottom: 20em;">
<div>
        <h2 class="col-12 my-3 text-center">Prácticas Profesionales</h2>
        <div class="row border border-dark">
        <?php foreach ($listadopracticas as $practica):?>
        <div class="col-6 col-md-4 py-2 border border-dark rounded">
            <div class="card text-center border-0">
                <a href="producto.php?id=<?php echo $practica["id"]?>">
                <img src="imagenes/<?php echo $practica["imagen"] ?>" class="card-img-top" style="width: 200px; height: 200px;">
                </a>  
                <div class="card-body">
                    <h5><?php echo $practica["nombre"]?></h5>
                    <h5><?php echo $practica["institucion"]?></h5>
                    <h5><?php echo $practica["comuna"]?></h5>
                    <p><?php echo $practica["fecha_termino"]?></p>
                    <h5><?php echo $practica["cantidad"]?></h5>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</main>

<?php
    // require 'includes/templates/footer.php';
    require 'includes/templates/end.php';
?>