<?php
if(isset($_SESSION['message'])) :
?>
    <!-- Success Alert Message -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <strong>Operación exitosa -</strong>  <?= $_SESSION['message']; ?>
    </div>

<?php
    unset($_SESSION['message']);
    endif;
?>


<?php
if(isset($_SESSION['message1'])) :
?>
    <!-- Success Alert Message -->
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <strong>Operación exitosa -</strong>  <?= $_SESSION['message1']; ?>
    </div>

<?php
    unset($_SESSION['message1']);
    endif;
?>



<?php
if(isset($_SESSION['message2'])) :
?>
    <!-- Success Alert Message -->
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <strong>Operación exitosa -</strong>  <?= $_SESSION['message2']; ?>
    </div>

<?php
    unset($_SESSION['message2']);
    endif;
?>