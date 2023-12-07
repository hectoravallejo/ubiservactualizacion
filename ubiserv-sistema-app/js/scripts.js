$(document).ready(function() {



//////////////////////////////////////////////////////////////////////





	$('#menu-movil a').click(function(x){

		x.preventDefault();

		if($('#menu').hasClass('hidden-xs')){

			$(this).addClass('activo');

			$('#menu').removeClass('hidden-xs');			

		}else{

			$(this).removeClass('activo');

			$('#menu').addClass('hidden-xs');			

		}

	})





/////////////////////////////////////////////





  $('#paginacion').ready(function(){

      contenido_paginacion = $('#paginacion').html();

      $('#paginacion-top').html(contenido_paginacion);

  });





/////////////////////////////////////////////





function adelante(){



		promocion_visible = $('.promocion-visible:first');



		if (promocion_visible.next().size() != 0) {



			promocion_visible.removeClass('promocion-visible');



			promocion_visible.next().addClass('promocion-visible');



		}



		else{



			promocion_visible.removeClass('promocion-visible');



			$('.lista-slider-promociones li:first').addClass('promocion-visible');



		};



}



function atras(){



		promocion_visible = $('.promocion-visible:first');



		if (promocion_visible.prev().size() != 0) {



			promocion_visible.removeClass('promocion-visible');



			promocion_visible.prev().addClass('promocion-visible');



		}



		else{



			promocion_visible.removeClass('promocion-visible');



			$('.lista-slider-promociones li:last').addClass('promocion-visible');



		};



}





	$('#adelante-promocion').click(function(x){



		x.preventDefault();



		adelante();



	})







	$('#atras-promocion').click(function(x){



		x.preventDefault();



		atras();



	})





	setInterval(function() { adelante() }, 5000);





/////////////////////////////////////////////



    $('#estados_mapa').on('change', function(x){

        categoria_sucursales = $( this ).val();

        $('.direccion').css('display','none');

        $('.direccion').each(function(index,element){



            if($(element).data('sucursal') == categoria_sucursales){

                $(element).css('display','block');

            }

        })

    })





    $('.direccion a').on('click', function(x){

        x.preventDefault();



            $('.direccion').removeClass('activa');

            $(this).parent().addClass('activa');



            direccion = $(this).parent().data('direccion');

            longitud = $(this).parent().data('longitud');

            latitud = $(this).parent().data('latitud');



          function initialize() {

            var myLatlng = new google.maps.LatLng(latitud,longitud);

            var mapOptions = {

              zoom: 15,

              center: myLatlng

            }



            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);



            var marker = new google.maps.Marker({

                position: myLatlng,

                animation: google.maps.Animation.DROP,

                map: map,

                draggable: true,

                title: direccion,

            });

          }



          initialize();





    })





//////////////////////////////////////////////////////////////////////



$('body').on('change', '#cotizador-servicios select', function(){

	calcular_total();

})



	function calcular_total(){



		total = 0;



		cantidad = $('#cantidad').val();



		$('#cotizador-servicios select').each(function(index, element){



			if($(element).find(':selected').data('cantidad') != undefined){



				total = total + $(element).find(':selected').data('cantidad');



			}



		})



		total = total * cantidad;



		$('#total').html(total.toLocaleString());



	}



	calcular_total();



})













$(window).load(function(){

	$('#slider').ready(function(){



		$('#slider').nivoSlider({

			effect: 'random',

			slices: 15,

			boxCols: 12,

			boxRows: 8,

			animSpeed: 500,

			pauseTime: 5000,

			startSlide: 0,

			directionNav: true,

			controlNav: false,

			controlNavThumbs: false,

			pauseOnHover: true,

			manualAdvance: false,

			prevText: 'Prev',

			nextText: 'Next',

			randomStart: false,

			beforeChange: function(){},

			afterChange: function(){},

			slideshowEnd: function(){},

			lastSlide: function(){},

			afterLoad: function(){}

		});



	})

})