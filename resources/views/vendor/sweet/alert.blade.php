
@if (Session::has('sweet_alert.alert'))
    <script>
		swal({
		  title: "Confirmacion de Envio",
		  text: "¿Desea confirmar el envio?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Si",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
       		swal("Enviado", "Su pedido esta en camino", "success");
		  } else {
		    swal("Cancelado", "El envio ha sido cancelado, confirme los datos", "error");
		  }
		});
    </script>
@endif
