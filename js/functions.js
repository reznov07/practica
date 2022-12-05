
 function AlertarEliminacion() {
    swal({
        title: "Estas seguro de eliminar ?",
        text: "No volverás a usar esta práctica !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("La práctica fue eliminada correctamente !", {
            icon: "success",
          });
        } else {
          swal("La práctica no fue eliminada !");
        }
      });

} 