
    <script type="text/javascript">


      $('.select-color').wheelColorPicker()

      $('.fecha').datepicker({
        format: 'yyyy-mm-dd'
      });

      $('#categoriasSelect').select2();



      $('body').on('click', '.borrar', function(x){

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

			        data:{ "id" : id },

			      })

			      .done(function(data) {

			        swal("Registro eliminado!", "Tu registro se ha eliminado con éxito!", "success");

			        console.log(data);

              registro.css('display','none');

              registro_cotizador.css('display','none');

			      })

			      .error(function(data) {

			        swal("Oops", "No se ha podido conectar con el servidor!", "error");

			      });



      		} else {

      			swal("Cancelado", "Tu registro quedo intacto :)", "error");

      		}

      	});

      });


/////////////////////////////////////////////////////////////////////



      $('body').on('click', '.asignar', function(x){

        x.preventDefault();

        action = $(this).closest('form').attr('action');

        id = $(this).closest('form').data('id');

        registro = $(this).closest('tr');

        registro_cotizador = $(this).closest('li');

        id_maestro = $(this).closest('form').data('id_maestro');
        id_examen = $(this).closest('form').data('id_examen');
        id_grado = $(this).closest('form').data('id_grado');

        contenedor_asignar = $(this).closest('td').find('.contenedor-asignar');
        contenedor_desasignar = $(this).closest('td').find('.contenedor-desasignar');



        swal({

          title: "¿Estás seguro?",

          text: "Estas a punto de asignar este exámen al grupo seleccionado",

          type: "warning",

          showCancelButton: true,

          confirmButtonText: "Sí, asignar!",

          cancelButtonText: "No, cancelar!",

          closeOnConfirm: false,

          closeOnCancel: false

        }, function(isConfirm) {

          if (isConfirm) {



            $.ajax({

              type: "POST",

              url: action,

              data:{ "id_examen" : id_examen, "id_maestro" : id_maestro, "id_grado" : id_grado },

            })

            .done(function(data) {

              swal("Felicidades!", "Has asignado el exámen con éxito!", "success");

              contenedor_asignar.css('display','none');
              contenedor_desasignar.css('display','block');

            })

            .error(function(data) {

              swal("Oops", "No se ha podido conectar con el servidor!", "error");

            });



          } else {

            swal("Cancelado", "Tu registro quedo intacto :)", "error");

          }

        });

      });



/////////////////////////////////////////////////////////////////////



      $('body').on('click', '.desasignar', function(x){

        x.preventDefault();

        action = $(this).closest('form').attr('action');

        id = $(this).closest('form').data('id');

        registro = $(this).closest('tr');

        registro_cotizador = $(this).closest('li');

        id_maestro = $(this).closest('form').data('id_maestro');
        id_examen = $(this).closest('form').data('id_examen');
        id_grado = $(this).closest('form').data('id_grado');

        contenedor_asignar = $(this).closest('td').find('.contenedor-asignar');
        contenedor_desasignar = $(this).closest('td').find('.contenedor-desasignar');



        swal({

          title: "¿Estás seguro?",

          text: "Estas a punto de dejar asignar este exámen al grupo seleccionado",

          type: "warning",

          showCancelButton: true,

          confirmButtonText: "Sí, dejar de asignar!",

          cancelButtonText: "No, cancelar!",

          closeOnConfirm: false,

          closeOnCancel: false

        }, function(isConfirm) {

          if (isConfirm) {



            $.ajax({

              type: "POST",

              url: action,

              data:{ "id_examen" : id_examen, "id_maestro" : id_maestro, "id_grado" : id_grado },

            })

            .done(function(data) {

              swal("Felicidades!", "Has asignado el exámen con éxito!", "success");

              contenedor_asignar.css('display','block');
              contenedor_desasignar.css('display','none');


            })

            .error(function(data) {


              swal("Oops", "No se ha podido conectar con el servidor!", "error");

            });



          } else {

            swal("Cancelado", "Tu registro quedo intacto :)", "error");

          }

        });

      });



/////////////////////////////////////////
////////////////////////////////////////



/////////////////////////////////////////////////////////////////////



      $('body').on('click', '.asignar_seccion', function(x){

        x.preventDefault();

        action = $(this).closest('form').attr('action');

        id = $(this).closest('form').data('id');

        registro = $(this).closest('tr');

        registro_cotizador = $(this).closest('li');

        id_maestro = $(this).closest('form').data('id_maestro');
        id_examen = $(this).closest('form').data('id_examen');
        id_grado = $(this).closest('form').data('id_grado');
        id_seccion = $(this).closest('form').data('id_seccion');

        contenedor_asignar = $(this).closest('td').find('.contenedor-asignar');
        contenedor_desasignar = $(this).closest('td').find('.contenedor-desasignar');



        swal({

          title: "¿Estás seguro?",

          text: "Estas a punto de asignar esta asignatura al grupo seleccionado",

          type: "warning",

          showCancelButton: true,

          confirmButtonText: "Sí, asignar!",

          cancelButtonText: "No, cancelar!",

          closeOnConfirm: false,

          closeOnCancel: false

        }, function(isConfirm) {

          if (isConfirm) {



            $.ajax({

              type: "POST",

              url: action,

              data:{ "id_examen" : id_examen, "id_maestro" : id_maestro, "id_grado" : id_grado, "id_seccion" : id_seccion },

            })

            .done(function(data) {

              swal("Felicidades!", "Has asignado la asignatura con éxito!", "success");

              contenedor_asignar.css('display','none');
              contenedor_desasignar.css('display','block');


            })

            .error(function(data) {

              swal("Oops", "No se ha podido conectar con el servidor!", "error");

            });



          } else {

            swal("Cancelado", "Tu registro quedo intacto :)", "error");

          }

        });

      });



/////////////////////////////////////////////////////////////////////



      $('body').on('click', '.desasignar_seccion', function(x){

        x.preventDefault();

        action = $(this).closest('form').attr('action');

        id = $(this).closest('form').data('id');

        registro = $(this).closest('tr');

        registro_cotizador = $(this).closest('li');

        id_maestro = $(this).closest('form').data('id_maestro');
        id_examen = $(this).closest('form').data('id_examen');
        id_grado = $(this).closest('form').data('id_grado');
        id_seccion = $(this).closest('form').data('id_seccion');

        contenedor_asignar = $(this).closest('td').find('.contenedor-asignar');
        contenedor_desasignar = $(this).closest('td').find('.contenedor-desasignar');



        swal({

          title: "¿Estás seguro?",

          text: "Estas a punto de dejar asignar esta asignatura al grupo seleccionado",

          type: "warning",

          showCancelButton: true,

          confirmButtonText: "Sí, dejar de asignar!",

          cancelButtonText: "No, cancelar!",

          closeOnConfirm: false,

          closeOnCancel: false

        }, function(isConfirm) {

          if (isConfirm) {



            $.ajax({

              type: "POST",

              url: action,

              data:{ "id_examen" : id_examen, "id_maestro" : id_maestro, "id_grado" : id_grado, "id_seccion" : id_seccion },

            })

            .done(function(data) {

              swal("Felicidades!", "Has asignado la asignatura con éxito!", "success");

              contenedor_asignar.css('display','block');
              contenedor_desasignar.css('display','none');


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



    <script type="text/javascript" src="<?php echo $path; ?>/js/admin/plugins/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="<?php echo $path; ?>/js/admin/plugins/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">$('#sampleTable').DataTable();</script>



  </body>

</html>