<!-- start footer -->
<footer style="padding: 20px; background-color: #FF5600;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p>Ubiserv todos los derechos reservados &copy; Diseñado por <a href="https://subirtupagina.com" target="_blank" style="color: #fff">subirtupagina</a></p>
			</div>
		</div>
	</div>
</footer>
<!-- end footer -->

<script src="<?= $path; ?>/../restaurantes/js/jquery.js"></script>
<script src="<?= $path; ?>/../restaurantes/js/bootstrap.min.js"></script>
<script src="<?= $path; ?>/../restaurantes/js/plugins.js"></script>
<script src="<?= $path; ?>/../restaurantes/js/smoothscroll.js"></script>
<script src="<?= $path; ?>/../restaurantes/js/custom.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.0/sweetalert.min.js" integrity="sha512-v142dAaAGovF4sz8ENEogEpvvECA+q3MVtZb5YTTYvgAVfXFOSc4VjQg1CAL1t8ykZE7ldqXsSVWw5MtaWJdPA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
	$('body').on('click', '.borrar', function(x) {

		x.preventDefault();

		action = $(this).closest('form').attr('action');

		id = $(this).closest('form').data('id');

		registro = $(this).closest('tr');

		registro_cotizador = $(this).closest('li');



		swal({

			title: "¿Estás seguro?",

			text: "Estas a punto de borrar este registro",

			type: "warning",

			showCancelButton: true,

			confirmButtonText: "Sí, borrálo!",

			cancelButtonText: "No, cancelar!",

			closeOnConfirm: false,

			closeOnCancel: false

		}, function(isConfirm) {

			if (isConfirm) {



				$.ajax({

						type: "POST",

						url: action,

						data: {
							"id": id
						},

					})

					.done(function(data) {

						swal("Registro eliminado!", "Tu registro se ha eliminado con éxito!", "success");

						console.log(data);

						registro.css('display', 'none');

						registro_cotizador.css('display', 'none');

					})

					.error(function(data) {

						swal("Oops", "No se ha podido conectar con el servidor!", "error");

					});



			} else {

				swal("Cancelado", "Tu registro quedo intacto :)", "error");

			}

		});

	});
</script>

<?php
// Get memory size
// $disk_free_memory = memory_get_usage();

// // Specify memory unit
// $memory_unit = array('Bytes','KB','MB','GB','TB','PB');

// // Display memory size into kb, mb etc.
// echo 'All Used Memory : '.round($disk_free_memory/pow(1024,($x=floor(log($disk_free_memory,1024)))),2).' '.$memory_unit[$x]."\n";
?>
</body>

</html>