/*
 * SlimScroll Plugin required for sidenav to function properly
 */
(function(e){e.fn.extend({slimScroll:function(g){var a=e.extend({width:"auto",height:"250px",size:"7px",color:"#000",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:!1,disableFadeOut:!1,railVisible:!1,railColor:"#333",railOpacity:.2,railDraggable:!0,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:!1,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"},g);this.each(function(){function v(d){if(r){d=d||window.event;
var c=0;d.wheelDelta&&(c=-d.wheelDelta/120);d.detail&&(c=d.detail/3);e(d.target||d.srcTarget||d.srcElement).closest("."+a.wrapperClass).is(b.parent())&&m(c,!0);d.preventDefault&&!k&&d.preventDefault();k||(d.returnValue=!1)}}function m(d,e,g){k=!1;var f=d,h=b.outerHeight()-c.outerHeight();e&&(f=parseInt(c.css("top"))+d*parseInt(a.wheelStep)/100*c.outerHeight(),f=Math.min(Math.max(f,0),h),f=0<d?Math.ceil(f):Math.floor(f),c.css({top:f+"px"}));l=parseInt(c.css("top"))/(b.outerHeight()-c.outerHeight());
f=l*(b[0].scrollHeight-b.outerHeight());g&&(f=d,d=f/b[0].scrollHeight*b.outerHeight(),d=Math.min(Math.max(d,0),h),c.css({top:d+"px"}));b.scrollTop(f);b.trigger("slimscrolling",~~f);w();p()}function x(){u=Math.max(b.outerHeight()/b[0].scrollHeight*b.outerHeight(),30);c.css({height:u+"px"});var a=u==b.outerHeight()?"none":"block";c.css({display:a})}function w(){x();clearTimeout(B);l==~~l?(k=a.allowPageScroll,C!=l&&b.trigger("slimscroll",0==~~l?"top":"bottom")):k=!1;C=l;u>=b.outerHeight()?k=!0:(c.stop(!0,
!0).fadeIn("fast"),a.railVisible&&h.stop(!0,!0).fadeIn("fast"))}function p(){a.alwaysVisible||(B=setTimeout(function(){a.disableFadeOut&&r||y||z||(c.fadeOut("slow"),h.fadeOut("slow"))},1E3))}var r,y,z,B,A,u,l,C,k=!1,b=e(this);if(b.parent().hasClass(a.wrapperClass)){var n=b.scrollTop(),c=b.closest("."+a.barClass),h=b.closest("."+a.railClass);x();if(e.isPlainObject(g)){if("height"in g&&"auto"==g.height){b.parent().css("height","auto");b.css("height","auto");var q=b.parent().parent().height();b.parent().css("height",
q);b.css("height",q)}if("scrollTo"in g)n=parseInt(a.scrollTo);else if("scrollBy"in g)n+=parseInt(a.scrollBy);else if("destroy"in g){c.remove();h.remove();b.unwrap();return}m(n,!1,!0)}}else if(!(e.isPlainObject(g)&&"destroy"in g)){a.height="auto"==a.height?b.parent().height():a.height;n=e("<div></div>").addClass(a.wrapperClass).css({position:"relative",overflow:"hidden",width:a.width,height:a.height});b.css({overflow:"hidden",width:a.width,height:a.height});var h=e("<div></div>").addClass(a.railClass).css({width:a.size,
height:"100%",position:"absolute",top:0,display:a.alwaysVisible&&a.railVisible?"block":"none","border-radius":a.railBorderRadius,background:a.railColor,opacity:a.railOpacity,zIndex:90}),c=e("<div></div>").addClass(a.barClass).css({background:a.color,width:a.size,position:"absolute",top:0,opacity:a.opacity,display:a.alwaysVisible?"block":"none","border-radius":a.borderRadius,BorderRadius:a.borderRadius,MozBorderRadius:a.borderRadius,WebkitBorderRadius:a.borderRadius,zIndex:99}),q="right"==a.position?
{right:a.distance}:{left:a.distance};h.css(q);c.css(q);b.wrap(n);b.parent().append(c);b.parent().append(h);a.railDraggable&&c.bind("mousedown",function(a){var b=e(document);z=!0;t=parseFloat(c.css("top"));pageY=a.pageY;b.bind("mousemove.slimscroll",function(a){currTop=t+a.pageY-pageY;c.css("top",currTop);m(0,c.position().top,!1)});b.bind("mouseup.slimscroll",function(a){z=!1;p();b.unbind(".slimscroll")});return!1}).bind("selectstart.slimscroll",function(a){a.stopPropagation();a.preventDefault();return!1});
h.hover(function(){w()},function(){p()});c.hover(function(){y=!0},function(){y=!1});b.hover(function(){r=!0;w();p()},function(){r=!1;p()});b.bind("touchstart",function(a,b){a.originalEvent.touches.length&&(A=a.originalEvent.touches[0].pageY)});b.bind("touchmove",function(b){k||b.originalEvent.preventDefault();b.originalEvent.touches.length&&(m((A-b.originalEvent.touches[0].pageY)/a.touchScrollStep,!0),A=b.originalEvent.touches[0].pageY)});x();"bottom"===a.start?(c.css({top:b.outerHeight()-c.outerHeight()}),
m(0,!0)):"top"!==a.start&&(m(e(a.start).position().top,null,!0),a.alwaysVisible||c.hide());window.addEventListener?(this.addEventListener("DOMMouseScroll",v,!1),this.addEventListener("mousewheel",v,!1)):document.attachEvent("onmousewheel",v)}});return this}});e.fn.extend({slimscroll:e.fn.slimScroll})})(jQuery);

$(function () {
	"use strict";

	// Sidenav toggle
	$.pushMenu = {
		activate: function (toggleBtn) {

			//Enable sidebar toggle
			$(toggleBtn).on('click', function (e) {
				e.preventDefault();

				//Enable sidebar push menu
				if ($(window).width() > (767)) {
					if ($("body").hasClass('sidebar-collapse')) {
						$("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
					} else {
						$("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
					}
				}
				//Handle sidebar push menu for small screens
				else {
					if ($("body").hasClass('sidebar-open')) {
						$("body").removeClass('sidebar-open').removeClass('sidebar-collapse').trigger('collapsed.pushMenu');
					} else {
						$("body").addClass('sidebar-open').trigger('expanded.pushMenu');
					}
				}
				if ( $('body').hasClass('fixed') && $('body').hasClass('sidebar-mini') && $('body').hasClass('sidebar-collapse')) {
					$('.sidebar').css("overflow","visible");
					$('.main-sidebar').find(".slimScrollDiv").css("overflow","visible");
				}
				if ($('body').hasClass('only-sidebar')) {
					$('.sidebar').css("overflow","visible");
					$('.main-sidebar').find(".slimScrollDiv").css("overflow","visible");
				};
			});

			$(".content-wrapper").click(function () {
				//Enable hide menu when clicking on the content-wrapper on small screens
				if ($(window).width() <= (767) && $("body").hasClass("sidebar-open")) {
					$("body").removeClass('sidebar-open');
				}
			});
		}
	};

	// Sidebar treemenu prototype
	$.tree = function (menu) {
		var _this = this;
		var animationSpeed = 200;
		$(document).on('click', menu + ' li a', function (e) {
			//Get the clicked link and the next element
			var $this = $(this);
			var checkElement = $this.next();

			//Check if the next element is a menu and is visible
			if ((checkElement.is('.treeview-menu')) && (checkElement.is(':visible'))) {
				//Close the menu
				checkElement.slideUp(animationSpeed, function () {
						checkElement.removeClass('menu-open');
					//Fix the layout in case the sidebar stretches over the height of the window
					//_this.layout.fix();
				});
				checkElement.parent("li").removeClass("active");
			}
			//If the menu is not visible
			else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
				//Get the parent menu
				var parent = $this.parents('ul').first();
				//Close all open menus within the parent
				var ul = parent.find('ul:visible').slideUp(animationSpeed);
				//Remove the menu-open class from the parent
				ul.removeClass('menu-open');
				//Get the parent li
				var parent_li = $this.parent("li");

				//Open the target menu and add the menu-open class
				checkElement.slideDown(animationSpeed, function () {
					//Add the class active to the parent li
					checkElement.addClass('menu-open');
					parent.find('li.active').removeClass('active');
					parent_li.addClass('active');
				});
			}
			//if this isn't a link, prevent the page from being redirected
			if (checkElement.is('.treeview-menu')) {
				e.preventDefault();
			}
		});
	};

	// Activate sidenav treemenu
	$.tree('.sidebar');

	// Activate sidenav toggle
	$.pushMenu.activate("[data-toggle='offcanvas']");

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

	// Login Page Flipbox control
	$('.login-content [data-toggle="flip"]').click(function() {
		$('.login-box').toggleClass('flipped');
		return false;
	});

	// Using slimscroll for sidebar
	$('.sidebar').slimScroll({
		height: ($(window).height() - $(".main-header").height()) + "px",
		color: "rgba(0,0,0,0.8)",
		size: "3px"
	});
});


/////////////////////////////////// Sitio

$(document).ready(function(){

///////////////////////////////////////////////////////////////////

    $('.mostrar-oculto a.form-control').click(function(x){
        x.preventDefault();
        $(this).css('display','none');
        $(this).siblings('input').prop('disabled',false).css('display','block');
        $('.icono-input').css('display','block');
    })

    $('.mostrar-oculto .icono-input').click(function(x){
    	x.preventDefault();
        $(this).css('display','none');
        $(this).siblings('input').prop('disabled',true).css('display','none');
        $('.mostrar-oculto a.form-control').css('display','block');
    })


    if($("#sortable").length != 0) {
        $(function(){
            $( "#sortable ul" ).sortable({
                connectWith: '#sortable ul',
                placeholder: 'ui-state-highlight',
                update: function(event, ui){
                    
                    var newOrder = $(this).sortable('toArray').toString();
                    
                    $("#orden").val( newOrder )
                    /* QUITAR COMENTARIOS PARA ENVIAR DATOS
                    $.ajax({
                        url: 'save.json.php?to=menu_order',
                        data: 'order=' + newOrder + '&parent=' + id_parent + '&id=' + id_item,
                        type: 'POST'
                    });
                    */
                }
            });
        });
    }

    $('.btn-orden').click(function(x){
        x.preventDefault();
        if($(this).siblings('input').val() == ''){
            alert('Todavía no haz cambiado el orden de tus elementos');
        }else{
            $('#form-orden').submit();            
        }
    })

/////////////////////////////////////////////////////////////////////////////////


    if($("#opciones-impresion").length != 0) {
        $(function(){
            $( "#opciones-impresion" ).sortable({
                connectWith: '#opciones-impresion',
                placeholder: 'ui-state-highlight',
                update: function(event, ui){
                    
                    var newOrder = $(this).sortable('toArray').toString();
                    
                    $("#orden-opciones-impresion").val( newOrder )
                    /* QUITAR COMENTARIOS PARA ENVIAR DATOS
                    $.ajax({
                        url: 'save.json.php?to=menu_order',
                        data: 'order=' + newOrder + '&parent=' + id_parent + '&id=' + id_item,
                        type: 'POST'
                    });
                    */
                }
            });
        });
    }

    $('.btn-orden-opciones-impresion').click(function(x){
        x.preventDefault();
        if($(this).siblings('input').val() == ''){
            alert('Todavía no haz cambiado el orden de tus elementos');
        }else{
            $('#form-orden-opciones-impresion').submit();            
        }
    })


/////////////////////////////////////////////////////////////////////////////////


    if($("#opciones-terminacion").length != 0) {
        $(function(){
            $( "#opciones-terminacion" ).sortable({
                connectWith: '#opciones-terminacion',
                placeholder: 'ui-state-highlight',
                update: function(event, ui){
                    
                    var newOrder = $(this).sortable('toArray').toString();
                    
                    $("#orden-opciones-terminacion").val( newOrder )
                    /* QUITAR COMENTARIOS PARA ENVIAR DATOS
                    $.ajax({
                        url: 'save.json.php?to=menu_order',
                        data: 'order=' + newOrder + '&parent=' + id_parent + '&id=' + id_item,
                        type: 'POST'
                    });
                    */
                }
            });
        });
    }

    $('.btn-orden-opciones-terminacion').click(function(x){
        x.preventDefault();
        if($(this).siblings('input').val() == ''){
            alert('Todavía no haz cambiado el orden de tus elementos');
        }else{
            $('#form-orden-opciones-terminacion').submit();            
        }
    })


/////////////////////////////////////////////////////////////////////// Cotizadores

    

    $('body').on('keydown', '.numeros', function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) || 
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 return;
        }
 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    $('body').on('keydown', '.numeros-enteros', function (e) {
        if ($.inArray(e.keyCode, [ 8, 9, 27, 13 ]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) || 
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 return;
        }
 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



    $('body').on('click', '.cerrar-modal', function(x){
      x.preventDefault();
      $('.opciones').css('display', 'none');
    })



    $('body').on('click', '.editar-campos', function(x){
      x.preventDefault();
      $(this).siblings('.opciones').fadeIn(500);
    })    


    $('.agregar-opciones').click(function(x){
      x.preventDefault();
      $(this).siblings('.ordenar-opciones').prepend(add_input_cantidad);
    })

    $('body').on('click', '.eliminar-opcion', function(x){
      x.preventDefault();
      $(this).closest('li').remove();
    })

    $('.agregar-opciones-campos').click(function(x){
      x.preventDefault();
      $(this).siblings('.ordenar-opciones').prepend(add_input_opciones);
    })

    $( function() {
      $( ".ordenar-opciones" ).sortable();
      $( ".ordenar-opciones" ).disableSelection();
    } );


    $('body').on('click', '.menu-opciones', function(x){
    	x.preventDefault();
    	if($(this).siblings('.botones-menu-opciones').is(':visible')){
	    	$(this).siblings('.botones-menu-opciones').fadeOut(500);
    	}else{
	    	$(this).siblings('.botones-menu-opciones').fadeIn(500);    		
    	}
    	$(this).closest('.contenedor-select').mouseleave(function(){
	    	$(this).find('.botones-menu-opciones').fadeOut(500);
    	})
    })


    $('body').on('click', '.agregar-select', function(x){
      x.preventDefault();
      $(this).siblings('.opciones').fadeIn(500);
    })

    $('body').on('click', '.cambiar-nombre-campo', function(x){
      x.preventDefault();
      $(this).siblings('.opciones').fadeIn(500);
    })

//////////////////////////////////////////////////////

    $('#control-usuarios-menu > a').click(function(x){
        x.preventDefault();
        $('#control-usuarios').fadeIn(500);
    })

    $('.barra-top').mouseleave(function(x){
        $('#control-usuarios').fadeOut(500);        
    })

/////////////////////////////////////////////////////////


    $('body').on('input', '.tipo-producto', function(x){
        x.preventDefault();
        


        if( $(this).attr('id') == 'seccion-editar' ){
            editar_insumo = $(this).closest('table').find('.editar-insumo');
            editar_inventarios = $(this).closest('table').find('.editar-inventarios');
            editar_descuentos = $(this).closest('table').find('.agregar-desc');
            input_proveedor = $(this).closest('table').find('.input-costo-proveedor');
            input_inventario = $(this).closest('table').find('.input-inventario-bajo');
            input_inventario_alto = $(this).closest('table').find('.input-inventario-alto');
            input_precio_unitario = $(this).closest('table').find('.input-precio-unitario');
        }else{
            editar_insumo = $(this).closest('tr').find('.editar-insumo');
            editar_inventarios = $(this).closest('tr').find('.editar-inventarios');
            editar_descuentos = $(this).closest('tr').find('.agregar-desc');
            input_proveedor = $(this).closest('tr').find('.input-costo-proveedor');
            input_inventario = $(this).closest('tr').find('.input-inventario-bajo');
            input_inventario_alto = $(this).closest('tr').find('.input-inventario-alto');
            input_precio_unitario = $(this).closest('tr').find('.input-precio-unitario');
        }

        if( $(this).val() == 2 ){
            editar_insumo.css('display', 'block');
            editar_inventarios.css('display', 'none');
            input_proveedor.addClass('disabled').attr('required',false);
            input_inventario.addClass('disabled').attr('required',false);
            input_inventario_alto.addClass('disabled').attr('required',false);
        }else{
            editar_insumo.css('display', 'none');
            editar_inventarios.css('display', 'block');
            input_proveedor.removeClass('disabled').attr('required',true);
            input_inventario.removeClass('disabled').attr('required',true);
            input_inventario_alto.removeClass('disabled').attr('required',true);
        }

        if( $(this).val() == 1 ){
            editar_descuentos.css('display', 'none');
            input_precio_unitario.addClass('disabled').attr('required',false);
        }else{
            editar_descuentos.css('display', 'block');
            input_precio_unitario.removeClass('disabled').attr('required',true);
        }

    })


//////////////////////////////


    function actualizar_insumos(elemento_actual_insumos){

        ids_insumos = '';
        elemento_actual_insumos.find('.listado-insumos').find('li').each(function(index, element){
            ids_insumos = ids_insumos+$(element).data('idinsumo')+',';
        })

        cantidades_insumos = '';
        elemento_actual_insumos.find('.listado-insumos').find('li').each(function(index, element){
            cantidades_insumos = cantidades_insumos+$(element).data('cantidadinsumo')+',';
        })


        ids_insumos = ids_insumos.slice(0,-1);
        cantidades_insumos = cantidades_insumos.slice(0,-1);

        lista_insumos = '{"ids":['+ids_insumos+'],"cantidades":['+cantidades_insumos+']}';

        elemento_actual_insumos.find('.ids_insumos_input').val(lista_insumos);

    }



    $('body').on('click', '.btn-add-insumo', function(x){
        x.preventDefault();

        if($(this).hasClass('btn-verde')){
            $(this).addClass('btn-danger');
            $(this).removeClass('btn-verde');
            $(this).find('i').removeClass('fa-plus');
            $(this).find('i').addClass('fa-minus');
            $(this).siblings('.agregar-insumo').css('display', 'block');
        }else{
            $(this).addClass('btn-verde');
            $(this).removeClass('btn-danger');
            $(this).find('i').removeClass('fa-minus');
            $(this).find('i').addClass('fa-plus');
            $(this).siblings('.agregar-insumo').css('display', 'none');
        }
    
    })


    $('body').on('click', '.agregar-insumo a', function(x){
        x.preventDefault();
        idinsumo = $(this).data('idinsumo');
        nuinsumo = $(this).closest('.agregar-insumo').find('.numero-insumos').val();
        nombreinsumo = $(this).data('nombreinsumo');

        $('.agregar-insumo').css('display', 'none');

            $(this).closest('.filtrar').find('.btn-add-insumo').addClass('btn-verde');
            $(this).closest('.filtrar').find('.btn-add-insumo').removeClass('btn-danger');
            $(this).closest('.filtrar').find('.btn-add-insumo').find('i').removeClass('fa-minus');
            $(this).closest('.filtrar').find('.btn-add-insumo').find('i').addClass('fa-plus');
            $(this).closest('.filtrar').find('.btn-add-insumo').siblings('.agregar-insumo').css('display', 'none');

        $(this).closest('.contenido-modal-insumo').find('.listado-insumos li').each(function(index , element){
            if( idinsumo == $(element).data('idinsumo') ){
                $(element).remove();
            }
        })

        if(nuinsumo != 0 && nuinsumo != ''){

            $(this).closest('.contenido-modal-insumo').find('.listado-insumos').prepend('\
                <li data-idinsumo="'+idinsumo+'" data-cantidadinsumo="'+nuinsumo+'">\
                  <div class="col-md-9 text-left">\
                    <b>'+nuinsumo+'</b>. '+nombreinsumo+'\
                  </div>\
                  <div class="col-md-3">\
                    <a href="#" class="btn btn-xs btn-danger btn-borrar-insumo pull-right"><i class="fa fa-times"></i></a>\
                  </div>\
                </li>\
            ');

        }

        actualizar_insumos($(this).closest('.contenido-modal-insumo'));


    })

    $('body').on('click', '.btn-borrar-insumo', function(x){
        x.preventDefault();

        modal_insumo_actual = $(this).closest('.contenido-modal-insumo');
        
        $(this).closest('li').remove();

        actualizar_insumos(modal_insumo_actual);

    })

    $('.ids_insumos_input').val($('#ids_insumos_js').text());

//////////////////////////////

    $('.enviar-form-product').click(function(x){

        $('.input-inventario-bajo:required').each(function(index, element){

            if($(element).val() == '' || $(element).closest('.inventarios-modal').find('.input-inventario-alto').val() == ''){
                $(element).closest('.inventarios-modal').siblings('.editar-inventarios').find('.sin-inventario').css('display','block');
            }else{                
                $(element).closest('.inventarios-modal').siblings('.editar-inventarios').find('.sin-inventario').css('display','none');
            }

        });

    })

    $('body').on('click', '.mascara-modal-inventarios, .cerrar-inventarios' , function(x){
        if( $(this).closest('td').find('.input-inventario-bajo').val() != '' && $(this).closest('td').find('.input-inventario-alto').val() != '' ){
            $(this).closest('td').find('.sin-inventario').css('display', 'none');
        }
    })

//////////////////////////////

        $('body').on('input', '.tipo_equipo', function(){
        
                switch($(this).val()) {
                    case 'byn':
                        $(this).closest('tr').find('.equipo_color').addClass('disabled');
                        $(this).closest('tr').find('.equipo_byn').removeClass('disabled');
                        break;
                    case 'color':
                        $(this).closest('tr').find('.equipo_byn').addClass('disabled');
                        $(this).closest('tr').find('.equipo_color').removeClass('disabled');
                        break;
                    case 'byncolor':
                        $(this).closest('tr').find('.equipo_byn').removeClass('disabled');
                        $(this).closest('tr').find('.equipo_color').removeClass('disabled');
                        break;
                    default:
                } 

        })

/////////////////////////////


    $('body').on('click', '.editar-insumo', function(x){
        x.preventDefault();
        $(this).siblings('div').fadeIn(500);
        $('.select').select2();
    })

    $('body').on('click', '.modal-insumo, .cerrar-insumo', function(x){
        $('.modal-insumo, .contenido-modal-insumo').css('display', 'none')
    })


/////////////////////////////


    $('.editar-gastos-dia').click(function(x){
        x.preventDefault();
        $('.modal-gastos-dia, .contenido-modal-gastos-dia').fadeIn(500);
    })

    $('.modal-gastos-dia').click(function(x){
        $('.modal-gastos-dia, .contenido-modal-gastos-dia').css('display', 'none');
    })


////////////


    $('.guardar-gastos-dia').click(function(x){
        x.preventDefault();

        if(confirm("Por favor Asegurate que los datos que introdujiste son correctos, una vez guardados no podras corregirlos") == true){

            $('#abrir-caja-vinculo').removeClass('disabled');
            
            $('.modal-gastos-dia, .contenido-modal-gastos-dia').css('display', 'none');

            $('#boton-finalizar').prop('disabled', false);

            $('.editar-gastos-dia').remove();

            $('#gasto-resultado').css('display', 'block');

        }else{

            return false;

        }

    })


/////////////

    $('.editar-inventario').click(function(x){
        x.preventDefault();
        $(this).siblings('div').fadeIn(500);
    })

    $('.modal-inventario').click(function(x){
        $('.modal-inventario, .contenido-modal-inventario').css('display', 'none')
    })

////////////


    $('body').on('click', '.editar-inventarios', function(x){
        x.preventDefault();
        $(this).siblings('div').fadeIn(500);      
    })

    $('body').on('click', '.mascara-modal-inventarios', function(x){
        $('.mascara-modal-inventarios, .inventarios-modal').css('display', 'none');
    })

    $('body').on('click', '.cerrar-inventarios', function(x){
        $('.mascara-modal-inventarios, .inventarios-modal').css('display', 'none')
    })


////////////

    function pad(number, length) {
       
        var str = '' + number;
        while (str.length < length) {
            str = '0' + str;
        }
       
        return str;

    }

    $('body').on('click', '.generar > a', function(x){
        x.preventDefault();
        url_form = $(this).data('action');

        elemento_actual = $(this);

        codigo_agregado = 0;
        $('.codigo-generado').each(function(index, element){
            if( $(element).val().startsWith("print") ){
                codigo_agregado++;
            }
        })


        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "generar" : 1 },
        })
        .done(function(data) {
            if(codigo_agregado > 0){
                data = data.replace('print','');

                if( elemento_actual.closest('tr').find('.codigo-generado').val().startsWith("print")  ){

                }else{                    
                    elemento_actual.closest('tr').find('.codigo-generado').val('print'+( pad(  parseInt( data ) + parseInt( codigo_agregado ) , 6 ) ));
                }
            }else{
                elemento_actual.closest('tr').find('.codigo-generado').val(data);
            }
            
        })
        .error(function(data) {
            //
        });

    })


///////////


    $('body').on('click', '.generar-cliente > a', function(x){
        x.preventDefault();
        url_form = $(this).data('action');

        elemento_actual = $(this);

        codigo_agregado = 0;
        $('.codigo-generado-cliente').each(function(index, element){
            if( $(element).val().startsWith("clien") ){
                codigo_agregado++;
            }
        })


        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "generar-cliente" : 1, 'codigo_cliente' : 1 },
        })
        .done(function(data) {
            if(codigo_agregado > 0){
                data = data.replace('clien','');

                if( elemento_actual.closest('tr').find('.codigo-generado-cliente').val().startsWith("clien")  ){

                }else{                    
                    elemento_actual.closest('tr').find('.codigo-generado-cliente').val('clien'+( pad(  parseInt( data ) + parseInt( codigo_agregado ) , 6 ) ));
                }
            }else{
                elemento_actual.closest('tr').find('.codigo-generado-cliente').val(data);
            }
            
        })
        .error(function(data) {
            //
        });

    })




//////////

    $('.recargar').click(function(x){
        x.preventDefault();
        $(this).siblings('div').fadeIn(500);
        $(this).siblings('div').find('input[name="importe"]').val('');
    })

    $('.modal-recargar').click(function(x){
        $('.modal-recargar, .contenido-modal-recargar').css('display', 'none')
    })


//////////

    $('.pago-total').click(function(x){
        x.preventDefault();
        $(this).siblings('div').fadeIn(500);
        cantidad_form = [];
        
        $('.cantidades-form').empty();

        $('.cantidad_producto').each(function(index, element){
            cantidad = $(element).val();
            $('.cantidades-form').append('<input type="hidden" name="cantidad[]" value="'+cantidad+'">');
        })

        $('.idproducto-form').empty();

        $('.id_producto').each(function(index, element){
            id_producto = $(element).val();
            $('.idproducto-form').append('<input type="hidden" name="id_producto[]" value="'+id_producto+'">');
        })

        $('.input-anticipo').val('');

    })

    $('.modal-pago-total').click(function(x){
        $('.modal-pago-total, .contenido-modal-pago-total').css('display', 'none')
    })


/////////

    $('.agregar-insumo button').click(function(x){
        x.preventDefault();
        $(this).parent().siblings('.insumos-agregados').prepend(agregar_insumo);
        $('.select').select2();
    })


    $('body').on('click', '.borrar-insumo button', function(x){
        x.preventDefault();
        $(this).parent().parent().remove();
    })

/////////////////////////////

    $('body').on('input', '#form-filtros select', function(){
        $('#form-filtros').submit();
    })


/////////////////////////


    function actualizar_form(){

        $('.campo-multiple').val('');

        separador = ',';

        $('input, select').each(function(index, element){
            $('#campo-'+$(element).data('campo-datos')).val($('#campo-'+$(element).data('campo-datos')).val()+separador+$(element).val());        
        })


            $('.campo-multiple').each(function(index, element){
            
                valor_campo = $(element).val();
                valor_final_campo = valor_campo.replace(',','');
                $(element).val(valor_final_campo);
            
            })



    }

    actualizar_form();

    $('#formulario-multiple').on('input', 'select, input', function(x){
        actualizar_form();
    })


/////////////////////////////////////


    $('.btn-agregar-filas').click(function(x){
        x.preventDefault();
        numero_filas = $('.agregar-filas').val();

        for (var i = numero_filas - 1; i >= 0; i--) {
            $('#filas-agregadas').append(fila);
        }

    })


    $('body').on('click', '.borrar-nuevos', function(x){
        x.preventDefault();
        $(this).closest('tr').empty();
    })

/////////////////////////////////////////


    contador_filas = 0;

    $('body').on('click' , '.btn-agregar-categoria' , function(x){
        x.preventDefault();

        contador_filas++;


        fila = '<tr>\
          <tr>\
            <td><input type="text" placeholder="Nombre categoría" class="editar_fila" id="fila_'+contador_filas+'"></td>\
            <td class="numero-cat"><a href="#" class="btn btn-warning btn-xs pull-right borrar-nuevas-cat" data-fila="'+contador_filas+'">Borrar categoría <i class="fa fa-times"></i></a></td>\
          </tr>\
        </tr>';

        fila_form = '\
          <input type="text" value="0" name="id[]" class="hidden fila_'+contador_filas+'" required>\
          <input type="text" name="nombre[]" class="campo hidden fila_'+contador_filas+'" required>\
        ';

        $('#filas-agregadas').append(fila);
        $('#agregar-categoria-form').append(fila_form);

    })


    $('body').on('click', '.borrar-nuevas-cat', function(x){
        x.preventDefault();
        $(this).closest('tr').empty();
        $('.fila_'+$(this).data('fila')).remove();
    })

    $('body').on('input', '.editar_fila', function(){
        editar_fila = $(this).attr('id');
        $('.campo.'+editar_fila).val($(this).val());
    })

    $('.confirmar-campos-cat').click(function(){
        $('.campo').each(function(index, element){
            if( $(element).val() == '' || $(element).val() == ' ' || $(element).val() == '  ' ){
                alert( 'Debes rellenar todos los campos' );
                return false;
            }
        })
    })

////////////////////////////////////

  $("body").on("input", '.filtrar-input', function() {
    var value = $(this).val().toLowerCase();
    $(this).parent('div').siblings(".filtrar").find("li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("body").on("input", '.insumo-checkbox', function() {
    lista_insumos = '';
    $(this).closest('.filtrar').find('.insumo-checkbox').each(function(index, element){
        
        if($(element).is(':checked')){
            lista_insumos = lista_insumos+$(element).val()+',';
        }

    })

    lista_insumos = lista_insumos.slice(0,-1);
    $(this).closest('.filtrar').siblings('.input-insumos').val(lista_insumos);    

  })

//////////////////////////////////////

    $('body').on('input', '.tipo_usuario_select_fila', function(){

        if($(this).val() != 'venta mostrador'){
            $('.sucursal_usuario').addClass('hidden');
        }else{
            $('.sucursal_usuario').removeClass('hidden');            
        }
    
    })

////////////////////////////////////////

    $('body').on('input', '.cantidad-inventario-mensual', function(){
        cantidad_mensual_actual = $(this).val();
        precio_unitario = $(this).siblings('.precio_unitario').html();
        total_inventario_mensual = (precio_unitario * cantidad_mensual_actual ).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 });
        $(this).parent('td').siblings('.total').html(total_inventario_mensual);

        total_piezas = parseInt(0);
        cantidad_mensual_actual_global = 0;
        precio_unitario_global = 0;
        total_inventario_mensual_global = 0;

        $('.cantidad-inventario-mensual').each(function(index, element){
            total_piezas = total_piezas + parseInt($(element).val());


            cantidad_mensual_actual_global = $(this).val();
            precio_unitario_global = $(this).siblings('.precio_unitario').html();
            total_inventario_mensual_global = total_inventario_mensual_global + (precio_unitario_global * cantidad_mensual_actual_global );


        })

        $('#cantidad-total').html(total_piezas+' <small>PZAS</small>')
        $('#compra-total').html(total_inventario_mensual_global.toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }))

    })


/////////////////////////////////////////


    $('body').on('input', '.seleccionar-filtros-automaticos select[name="id_proveedor"], .seleccionar-filtros-automaticos select[name="id_categoria"]', function(){
        $('.tabla-filtros-automaticos tbody tr').addClass('hidden');
        $('.tabla-filtros-automaticos tbody tr.titulos').removeClass('hidden');
        $('.tabla-filtros-automaticos tbody tr.titulos thead tr').removeClass('hidden');

        id_proveedor = $('.seleccionar-filtros-automaticos select[name="id_proveedor"]').val();
        id_categoria = $('.seleccionar-filtros-automaticos select[name="id_categoria"]').val();

        if(id_proveedor == 0 && id_categoria == 0){
            $('.tabla-filtros-automaticos').find('td').parent('tr').removeClass('hidden');
        }

        if(id_proveedor != 0 && id_categoria == 0){
            $('.tabla-filtros-automaticos').find('td[data-proveedor='+id_proveedor+']').parent('tr').removeClass('hidden');
        }

        if(id_categoria != 0 && id_proveedor == 0){
            $('.tabla-filtros-automaticos').find('td[data-categoria='+id_categoria+']').parent('tr').removeClass('hidden');
        }

        if(id_proveedor != 0 && id_categoria != 0){

            $('.tabla-filtros-automaticos').find('td[data-proveedor='+id_proveedor+']').parent('tr').find('td[data-categoria='+id_categoria+']').parent('tr').removeClass('hidden');
        }

    })


//////////////////////////////////////////////


      $("body").on("input", '.buscar-automatico', function() {
        var value = $(this).val().toLowerCase();
        $(".nombre-producto-inventario-mensual").filter(function() {
          $(this).parent('tr').toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });


/////////////////////////////////////

    $('body').on('submit', '.editar-inventario-form', function(x){
        x.preventDefault();
        url_form = $(this).attr('action');
        cantidad = $(this).find("input[name='cantidad']").val();
        id_sucursal = $(this).find("input[name='id_sucursal']").val();
        id_producto = $(this).find("input[name='id_producto']").val();
        asignar = $(this).find("input[name='asignar']:checked").val();

        precio = $(this).find("input[name='precio']").val();

        total = (precio * cantidad).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 });


        elemento_actual = $(this);

        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "cantidad" : cantidad , "id_sucursal" : id_sucursal , "id_producto" : id_producto , "asignar" : asignar },
        })
        .done(function(data) {
            $('.modal-inventario, .contenido-modal-inventario').fadeOut(500);
            elemento_actual.closest('tr').css('background', '#d0fcff');
            elemento_actual.closest('tr').find('.cantidad-inventario').html('<b style="color: #872d00">'+cantidad+'</b>');
            elemento_actual.closest('tr').find('.total').html('<b style="color: #872d00">'+total+'</b>');
            if(asignar == 'asignar-ambos'){
                elemento_actual.find('.cantidad-otro-inventario').html('<b style="color: #872d00">'+cantidad+'</b>');
            }
        })
        .error(function(data) {
            //
        });

    })


///////////////////////////////////////////////////////////

    $('body').on('input', 'select[name="mes_inicio"], select[name="ano_inicio"], select[name="mes_fin"], select[name="ano_fin"], select[name="sucursal"]', function(){
        mes_inicio = $('select[name="mes_inicio"]').val();
        ano_inicio = $('select[name="ano_inicio"]').val();
        mes_fin = $('select[name="mes_fin"]').val();
        ano_fin = $('select[name="ano_fin"]').val();

        vinculo_reporte_inventario = $('#ver-reporte-inventario').attr('href');

        if(typeof $('#utilidad-sucursal-select select').val() != 'undefined'){
            sucursal_select = $('select[name="sucursal"]').val();
            vinculo_reporte_inventario_sustraer = vinculo_reporte_inventario.split('/').slice(-5);
        }else{
            vinculo_reporte_inventario_sustraer = vinculo_reporte_inventario.split('/').slice(-4);
        }

        vinculo_reporte_inventario_sustraer = vinculo_reporte_inventario_sustraer.join('/');

        if(typeof $('#utilidad-sucursal-select select').val() != 'undefined'){
            vinculo_reporte_inventario = vinculo_reporte_inventario.replace(vinculo_reporte_inventario_sustraer, '')+sucursal_select+'/'+mes_inicio+'/'+ano_inicio+'/'+mes_fin+'/'+ano_fin;
        }else{
            vinculo_reporte_inventario = vinculo_reporte_inventario.replace(vinculo_reporte_inventario_sustraer, '')+mes_inicio+'/'+ano_inicio+'/'+mes_fin+'/'+ano_fin;
        }

        $('#ver-reporte-inventario').attr('href', vinculo_reporte_inventario);

    })

///////////////////////////////////////////////////////////////


    $('body').on('input', '.ajaxsearch', function(){


        campo = $(this).data('campo');
        url_form = $(this).data('urlsearch');
        valor = $(this).val();
        seccion = $(this).data('seccion');

        elemento_actual = $(this);

        $('#resultados-ajax').css('display','block');


        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "campo" : campo , "valor" : valor , "seccion" : seccion },
        })
        .done(function(data) {

            $('#resultados-ajax').html(data);

        })
        .error(function(data) {
            alert('error');
            //
        });
    
    })

////////////////////////////////////////////////////////////////////


    $('body').on('input', '.ajaxsearch2', function(){


        campo = $(this).data('campo');
        url_form = $(this).data('urlsearch');
        valor = $(this).val();
        seccion = $(this).data('seccion');

        elemento_actual = $(this);

        $('.filtro_productos').val('0');

        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "campo" : campo , "valor" : valor , "seccion" : seccion },
        })
        .done(function(data) {

            $('#resultados-ajax2').html(data);

        })
        .error(function(data) {
            alert('error');
            //
        });
    
    })


/////////////////////////////////////////////////////////////////////

    function ocultar_resultados(){

        desaparecer_busqueda = window.setTimeout(function() {
        window.clearTimeout(desaparecer_busqueda);
            if($('.ajaxsearch').is(':focus') == false && $('#resultados-ajax').is(':hover') == false){
                $('#resultados-ajax').fadeOut(500);
            }
        }, 1000);

    }

    $('.ajaxsearch').focusin(function(){
        $('#resultados-ajax').fadeIn(500);
    })

    $('.ajaxsearch').focusout(function(){
        ocultar_resultados();
    })


    $('#resultados-ajax.busqueda-oculta').mouseleave(function(){
        ocultar_resultados();
    })


///////////////////////////////////////////////////////////

    $('body').on('input', '.requisicion-cantidades', function(){

        cantidad_requisicion = 0;
        total_costo_requisicion = 0;

        $('.requisicion-cantidades').each(function(index, element){
            cantidad_requisicion = parseInt(cantidad_requisicion) + parseInt($(element).val());
        })

        $('#cantidad-requisicion').html(cantidad_requisicion);



        $('.precios_requiciciones').each(function(index, element){

            precio_requisicion = $(this).text();
            cantidad_requisicion_precio = $(this).siblings('.requisicion-cantidades').val();

            $(element).closest('tr').find('.requisicion-suma').html(( precio_requisicion * cantidad_requisicion_precio ).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }));

            total_costo_requisicion = total_costo_requisicion + ( precio_requisicion * cantidad_requisicion_precio );

        })

        $('#compra-total').html(total_costo_requisicion.toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }))

    })


/////////////////////////////////////////////////////////////////


    function PrintElem(elem, elem2){
        var mywindow = window.open('', 'PRINT', 'height=600,width=800');

        estilo_css = '<style>\
            @media print{\
                *{ font-size: 10px; font-family: sans-serif; page-break-inside: avoid;}\
                td, th{ border: 1px solid #ccc; border-collapse: collapse; cellpadding: 0; cellspacing: 0; }\
                .tabla th{ background-color: #ff9100; color: #fff; text-align: center; width: 21cm; }\
                .tabla2 th{ background-color: #072b6b !important; width: 21cm; }\
                .col-md-6{ text-align: center; padding-top: 0.5cm; width: 9cm; position: relative; float: left; font-size: 14px; font-weight: bold; }\
                select{border: none; background: none}\
                * .hidden-print{display:none !important}\
            }\
        </style>';

        mywindow.document.write('<html><head><title>Orden de compra</title>');
        mywindow.document.write('</head><body>'+estilo_css);
        //mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML + '<br>' + document.getElementById(elem2).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }

    $('body').on('click', '.imprimir', function(x){
        x.preventDefault();
        PrintElem('imprimir-tabla', 'imprimir-resultados');
    })


//////////////////////////////////////////////////

    $('body').on('click', '.enviar_almacen' , function(x){
        x.preventDefault();
        cantidad_maxima = parseInt($(this).closest('td').find('input').prop('max'));
        cantidad_minima = parseInt($(this).closest('td').find('input').prop('min'));
        cantidad = parseInt($(this).closest('td').find('input[name="cantidad_producto"]').val());
        precio = $(this).closest('td').find('input[name="precio_producto"]').val();
        id_requisicion = $(this).closest('tr').find('input[name="id[]"]').val();
        id_producto = parseInt($(this).closest('tr').find('input[name="id_producto[]"]').val());
        id_sucursal = $(this).closest('tr').find('input[name="id_sucursal_producto"]').val();
        url_form = $(this).data('urlform');


        elemento_actual = $(this);

        if( cantidad < cantidad_minima || cantidad > cantidad_maxima || cantidad == '' ){
            if(cantidad == 0){
                alert('No hay productos que enviar al almacén');
            }else{
                alert('Sólo puedes enviar al almacen cantidades entre '+ cantidad_minima+' y '+ cantidad_maxima);
            }
        
        }else{


            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "cantidad" : cantidad , "id_requisicion" : id_requisicion, "id_sucursal" : id_sucursal, "precio" : precio, "id_producto" : id_producto },
            })
            .done(function(data) {

                elemento_actual.closest('tr').find('td').css('display', 'none');
                elemento_actual.closest('tr').html('<td colspan="7" class="enviados-almacen">'+cantidad +' producto(s) se ha(n) enviado al almacén</td>');
                elemento_actual.closest('tr').find('select[name="estatus[]"]').val('entregado');
                
            })
            .error(function(data) {
                alert('Hubo un error por favor intentalo más tarde');
                //
            });

        
        }

    })


/////////////////////////////////////

    $('body').on('submit', '#gastos-ajax', function(x){
        x.preventDefault();
        url_form = $(this).attr('action');

        cantidad_total = 0;

        cantidad = [];
        $("input[name='cantidad[]']").each(function(index, element){
            cantidad_actual = $(element).val();

            cantidad_total = cantidad_total + parseFloat($(element).val());

            cantidad.push(cantidad_actual);
        });

        sucursal = [];
        $("input[name='sucursal[]']").each(function(index, element){
            sucursal_actual = $(element).val();
            sucursal.push(sucursal_actual);
        });

        nombre = [];
        $("input[name='nombre[]']").each(function(index, element){
            nombre_actual = $(element).val();
            nombre.push(nombre_actual);
        });


        id_proveedor = [];
        $("input[name='id_proveedor[]']").each(function(index, element){
            id_proveedor_actual = $(element).val();
            id_proveedor.push(id_proveedor_actual);
        });

        
        elemento_actual = $(this);

        if(confirm("Por favor Asegurate que los datos que introdujiste son correctos, una vez guardados no podras corregirlos") == true){


            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "cantidad" : JSON.stringify(cantidad) , "sucursal" : JSON.stringify(sucursal) , "nombre" : JSON.stringify(nombre) , "id_proveedor" : JSON.stringify(id_proveedor), "ajax" : 1 },
            })
            .done(function(data) {
                
                $('#abrir-caja-vinculo').removeClass('disabled');
                
                $('.modal-gastos-dia, .contenido-modal-gastos-dia').css('display', 'none');

                $('#boton-finalizar').prop('disabled', false);

                $('.editar-gastos-dia').remove();

                $('#gasto-resultado').css('display', 'block');

                $('#resultados-gastos-dia').val(cantidad_total)

            })
            .error(function(data) {
                alert('error');
                //
            });

        }else{

            return false;

        }


    })


/////////////////////////////////

    $("body").on('focusout', "input[name='contador[]']", function(){

        contador_equipo = $(this).val();
        contador_equipo_original = $(this).closest('td').children("input[name='contador_actual[]']").val();

        if(parseInt(contador_equipo) < parseInt(contador_equipo_original)){
            $(this).val(contador_equipo_original);
            alert('La cantidad del contador no puede ser menor a '+contador_equipo_original);
        }

    })

    $("body").on('focusout', "input[name='contador_byn[]']", function(){

        contador_byn_equipo = $(this).val();
        contador_byn_equipo_original = $(this).closest('td').children("input[name='contador_actual_byn[]']").val();

        if(parseInt(contador_byn_equipo) < parseInt(contador_byn_equipo_original)){
            $(this).val(contador_byn_equipo_original);
            alert('La cantidad del contador no puede ser menor a '+contador_byn_equipo_original);
        }

    })

///////////////////////////////////////////////////////////

    $('body').on('submit', '#cortecaja-ajax', function(x){
        x.preventDefault();

        url_form = $(this).attr('action');
        elemento_actual = $(this);

        tickets = $("input[name='tickets']").val();
        efectivo = $("input[name='efectivo']").val();
        transferencia = $("input[name='transferencia']").val();
        puntos = $("input[name='puntos']").val();
        tarjeta = $("input[name='tarjeta']").val();
        pagado = $("input[name='pagado']").val();
        por_pagar = $("input[name='por_pagar']").val();
        merma = $("input[name='merma']").val();
        merma_byn = $("input[name='merma_byn']").val();
        por_pagar = $("input[name='por_pagar']").val();
            

        ids_merma = [];
        $("input[name='ids_merma[]']").each(function(index, element){
            ids_merma_actual = $(element).val();
            ids_merma.push(ids_merma_actual);
        });

        cantidades_merma = [];
        $("input[name='cantidades_merma[]']").each(function(index, element){
            cantidades_merma_actual = $(element).val();
            cantidades_merma.push(cantidades_merma_actual);
        });


        id_equipos = [];

        contadores = [];
        contadores_byn = [];

        contadores_actuales = [];
        contadores_actuales_byn = [];

        total_contadores_actuales = 0;
        total_contadores_actuales_byn = 0; 

        total_contadores = 0;
        total_contadores_byn = 0;         

        subtotal_contadores = 0;
        subtotal_contadores_byn = 0;


        total_contadores_final = 0;

        $("input[name='id_equipo[]']").each(function(index, element){
            id_equipos_actual = $(element).val();
            id_equipos.push(id_equipos_actual);

            if(typeof $(element).closest('tr').find("input[name='contador[]']").val() == 'undefined' ){
                contadores[index] = 0;
                contadores_actuales[index] = 0;
            }else{
                contadores[index] = $(element).closest('tr').find("input[name='contador[]']").val();
                contadores_actuales[index] = $(element).closest('tr').find("input[name='contador_actual[]']").val();
            }

            if(typeof $(element).closest('tr').find("input[name='contador_byn[]']").val() == 'undefined' ){
                contadores_byn[index] = 0;
                contadores_actuales_byn[index] = 0;
            }else{
                contadores_byn[index] = $(element).closest('tr').find("input[name='contador_byn[]']").val();
                contadores_actuales_byn[index] = $(element).closest('tr').find("input[name='contador_actual_byn[]']").val();
            }


            total_contadores_actuales = parseInt(total_contadores_actuales) + parseInt(contadores_actuales[index]);
            total_contadores = parseInt(total_contadores) + parseInt(contadores[index]);
            subtotal_contadores = + ( parseInt(total_contadores) - parseInt(total_contadores_actuales) );

            total_contadores_actuales_byn = parseInt(total_contadores_actuales_byn) + parseInt(contadores_actuales_byn[index]);
            total_contadores_byn = parseInt(total_contadores_byn) + parseInt(contadores_byn[index]);
            subtotal_contadores_byn = + ( parseInt(total_contadores_byn) - parseInt(total_contadores_actuales_byn) );


        });




        if(confirm("Por favor Asegurate que los datos que introdujiste son correctos, una vez guardados no podras corregirlos") == true){

            total_contadores_final = parseInt(subtotal_contadores) + parseInt(subtotal_contadores_byn);


            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "tickets" : tickets, "efectivo" : efectivo, "transferencia" : transferencia, "puntos" : puntos, "tarjeta" : tarjeta, "pagado" : pagado, "por_pagar" : por_pagar, "merma" : merma, "merma_byn" : merma_byn, "id_equipos" : JSON.stringify(id_equipos), "contadores" : JSON.stringify(contadores), "contadores_byn" : JSON.stringify(contadores_byn), 'total_contadores' : total_contadores_final, 'ids_merma' : JSON.stringify(ids_merma), 'cantidades_merma' : JSON.stringify(cantidades_merma) },
            })
            .done(function(data) {

                gastos_dia = data;

                total_ingreso = 0;

                total_ingreso = total_ingreso + (parseFloat(efectivo) + parseFloat(transferencia) + parseFloat(puntos) + parseFloat(tarjeta));

                total_caja = parseFloat(efectivo) - parseFloat( gastos_dia );

                $('#resultados-corte-caja-pv').css('display', 'block');
                $('.ocultar-corte, #content-merma').css('display', 'none');
                $('#total_contadores').text(total_contadores_final);
                $('#total_ingreso').text(total_ingreso.toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $('#total_caja').text(total_caja.toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            })
            .error(function(data) {
                alert('error');
                //
            });

        }else{

            return false;

        }

    })

///////////////////////////////////////////////////
    
    function asignar_tipo(tipo){
    
        tipo_opcion_seleccionada = $(tipo).data('tipo');

        switch(tipo_opcion_seleccionada) {
            case 'byn':
                $('input[name="contador_byn"]').removeClass('disabled');
                $('input[name="contador"]').addClass('disabled');
                break;
            case 'color':
                $('input[name="contador_byn"]').addClass('disabled');
                $('input[name="contador"]').removeClass('disabled');
                break;
            case 'byncolor':
                $('input[name="contador"]').removeClass('disabled');
                $('input[name="contador_byn"]').removeClass('disabled');
                break;
            default:
            //notting
        } 

    
    }

    asignar_tipo('.seleccionar_tipo_equipo option:selected');

    $('body').on('input', '.seleccionar_tipo_equipo', function(){
        asignar_tipo($('.seleccionar_tipo_equipo option:selected'));
    })

////////////////////////////////////////////////////

    $('body').on('input', '#efectivo_corte, #transferencia_corte, #puntos_corte, #tarjeta_corte, #por_pagar_corte', function(){

        efectivo_corte = parseFloat($('#efectivo_corte').val());
        transferencia_corte = parseFloat($('#transferencia_corte').val());
        puntos_corte = parseFloat($('#puntos_corte').val());
        tarjeta_corte = parseFloat($('#tarjeta_corte').val());
        por_pagar_corte = parseFloat($('#por_pagar_corte').val());

        if(isNaN(efectivo_corte)){
            efectivo_corte = 0;
        }
        if(isNaN(transferencia_corte)){
            transferencia_corte = 0;
        }
        if(isNaN(puntos_corte)){
            puntos_corte = 0;
        }
        if(isNaN(tarjeta_corte)){
            tarjeta_corte = 0;
        }
        if(isNaN(por_pagar_corte)){
            por_pagar_corte = 0;
        }


        pagado_corte = parseFloat(efectivo_corte) + parseFloat(transferencia_corte) + parseFloat(puntos_corte) + parseFloat(tarjeta_corte) - parseFloat(por_pagar_corte);



        $('#pagado_corte').val(pagado_corte);

    })


////////////////////////////////////////

    $('.boton-agregar-cliente').click(function(x){
        x.preventDefault();
        $('.modal-agregar-cliente').fadeIn(500);
    })


    $('.modal-agregar-cliente').click(function(x){
        if(this !== x.target){ return; }
        $(this).css('display', 'none');

    })


/////////////////////////////////////


    $('body').on('submit', '.nuevo-cliente-punto-venta', function(x){
        x.preventDefault();
        url_form = $(this).attr('action');
        elemento_actual = $(this);

        codigo = $(this).find("input[name='codigo']").val();
        nombre = $(this).find("input[name='nombre']").val();
        apellido_paterno = $(this).find("input[name='apellido_paterno']").val();
        apellido_materno = $(this).find("input[name='apellido_materno']").val();
        correo = $(this).find("input[name='correo']").val();
        telefono = $(this).find("input[name='telefono']").val();
        saldo_tarjeta = $(this).find("input[name='saldo_tarjeta']").val();
        porcentaje_tarjeta = $(this).find("input[name='porcentaje_tarjeta']").val();


        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "codigo" : codigo , "nombre" : nombre , "apellido_paterno" : apellido_paterno , "apellido_materno" : apellido_materno, "correo" : correo, "telefono" : telefono, "saldo_tarjeta" : saldo_tarjeta, "porcentaje_tarjeta" : porcentaje_tarjeta },
        })
        .done(function(data) {
            $('.modal-agregar-cliente').css('display', 'none');
            elemento_actual.find('input').val('');
            alert('Cliente agregado con éxito');
        })
        .error(function(data) {
            alert('Hubo un error porfavor intentalo más tarde');
        });

    })

////////////////////////////////////////////////////////////



    $('body').on('submit', '.modificar-estatus-ordenes', function(x){
        x.preventDefault();
        url_form = $(this).attr('action');
        elemento_actual = $(this);

        folio = $(this).find("input[name='folio']").val();
        estatus = $(this).find("select[name='estatus']").val();


        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "folio" : folio , "estatus" : estatus },
        })
        .done(function(data) {
            elemento_actual.html('<b style="color: #872d00; font-weight: bold">El estatus de los elementos ya ha sido modificado</b>');
        })
        .error(function(data) {
            alert('Hubo un error porfavor intentalo más tarde');
        });

    })




/////////////////////////////////////////////////////////

    $('body').on('input', '.filtro_productos', function(){

        elemento_actual_filtro_producto = $(this);

        clase_par = 0;

        $('.producto-buscado').each(function(index,element){

            if( $(element).data('categoriapv') == elemento_actual_filtro_producto.val() || elemento_actual_filtro_producto.val() == 0 ){
                $(element).css('display', 'block');

                switch(clase_par) {
                    case 0:
                        $(element).removeClass('par');
                        clase_par = 1;
                        break;
                    case 1:
                        $(element).addClass('par');
                        clase_par = 0;
                        break;
                    default:
                        $(element).removeClass('par');
                } 

            }else{
                $(element).css('display', 'none');                
            }

        })
    })

///////////////////////////////////////////////

    $('body').on('click', '.lista-clientes a', function(x){
        x.preventDefault();
    })    

    $('body').on('dblclick', '.lista-clientes a', function(x){
        x.preventDefault();

        url_form = $(this).data('action');
        elemento_actual = $(this);
        $('.lista-clientes a').removeClass('cliente-seleccionado');
        elemento_actual.addClass('cliente-seleccionado');

        $('.tabla-productos-pv').html('');

        $('.productos-pv').css('opacity','1');

        id = $(this).data("id");
        saldo = $(this).data("saldo");
        saldoacumulado = $(this).data("saldoacumulado");

        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "id" : id },
        })
        .done(function(data) {

            $('#pedido-total-final').html((0).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }))

            $('#datos-cliente-pv-mensaje').css('display', 'none')

            $('#datos-cliente-pv').html(data);

            $('.id-cliente-pago').val(id);

            $('.saldo-tarjeta-total').html( (saldo).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }) );

            $('.saldo-acumuladopuntos-total').html( (saldoacumulado).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }) );


        })
        .error(function(data) {
            alert('Hubo un error porfavor intentalo más tarde');
        });


    })



///////////////////////////////////////////////


    function calcular_total(){
            
            if(typeof($('#descuento')) != 'undefined'){
                if( $('#descuento').val() == ''){
                    descuento = 0;
                }else{
                    descuento = $('#descuento').val();
                }
            }else{
                descuento = 0;
            }

            cantidad_producto_actual_total = 0;
            precio_producto_actual_total = 0;
            precio_final_productos = 0;

            $('.tabla-productos-pv .id_producto').each(function(index,element){

                cantidad_producto_actual_total = 0;
                precio_producto_actual_total = 0;

                precio_producto = $(element).closest('tr').find('.precio_producto').val();

                if( $(element).closest('tr').find('.descuento-desde').val() != ''){

                    descuento_desde = $(element).closest('tr').find('.descuento-desde').val().split(',');
                    descuento_cantidad = $(element).closest('tr').find('.descuento-cantidad').val().split(',');


                       for (var i = 0; i < descuento_desde.length; i++) {
                            if( parseInt( $(element).closest('tr').find('.cantidad_producto').val() ) >= parseInt( descuento_desde[i] ) ){
                                precio_producto = descuento_cantidad[i];
                            }
                       }

                }


                cantidad_producto_actual_total = cantidad_producto_actual_total + parseInt($(element).closest('tr').find('.cantidad_producto').val());
                
                cantidad_descuento = ( precio_producto ) * descuento / 100;

                precio_producto = precio_producto - cantidad_descuento;

                precio_producto_actual_total = precio_producto_actual_total + precio_producto ;

                precio_final_productos = precio_final_productos + ( precio_producto_actual_total * cantidad_producto_actual_total );

            })

            if( $('#datos-cliente-pv-mensaje').css('display') == 'none'){

                $('#pedido-total-final, .monto-pago-total').html(precio_final_productos.toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }));

            }


    }

    $('body').on('input', '#descuento', function(){
        calcular_total();
    })

/////////////////////////////////////////////

    $('body').on('click', '.lista-busqueda-productos a, .lista-productos-populares a', function(x){
        x.preventDefault();
    })    

    $('body').on('dblclick', '.lista-busqueda-productos a, .lista-productos-populares a', function(x){
        x.preventDefault();

        url_form = $(this).data('action');
        elemento_actual = $(this);
        $('.lista-busqueda-productos a').removeClass('producto-seleccionado');
        elemento_actual.addClass('producto-seleccionado');

        id = $(this).data("id");

        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "id" : id },
        })
        .done(function(data) {

            elemento_duplicado = 0;

            $('.tabla-productos-pv .id_producto').each(function(index,element){

                if( $(element).val() == id && elemento_duplicado == 0 ){
                    elemento_produco_actual = $(element);
                    elemento_duplicado++;
                };

            })

            if(elemento_duplicado == 0){
                $('.tabla-productos-pv').append(data);
            }

            if(elemento_duplicado == 1){
                

                cantidad_producto_actual = parseInt(elemento_produco_actual.closest('tr').find('.cantidad_producto').val())+1;

                precio_visible = parseFloat(elemento_produco_actual.closest('tr').find('.precio_producto').val());

                if( elemento_produco_actual.closest('tr').find('.descuento-desde').val() != ''){

                    descuento_desde = elemento_produco_actual.closest('tr').find('.descuento-desde').val().split(',');
                    descuento_cantidad = elemento_produco_actual.closest('tr').find('.descuento-cantidad').val().split(',');


                       for (var i = 0; i < descuento_desde.length; i++) {
                            if( parseInt( elemento_produco_actual.closest('tr').find('.cantidad_producto').val() )+1 >= parseInt( descuento_desde[i] ) ){
                                precio_visible = descuento_cantidad[i];
                            }
                       }

                }

                
                precio_producto_actual = precio_visible;


                elemento_produco_actual.closest('tr').find('.cantidad_producto').val(cantidad_producto_actual);
                precio_final_producto_actual = (precio_producto_actual * cantidad_producto_actual).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 });
                elemento_produco_actual.closest('tr').find('.precio_producto_visible').html(precio_final_producto_actual);
            }

            calcular_total();


        })
        .error(function(data) {
            alert('Hubo un error porfavor intentalo más tarde');
        });


    })



    $('body').on('input', '.cantidad_producto', function(x){

        cantidad_producto_actual = $(this).val();

        precio_visible_input = $(this).closest('tr').find('.precio_producto').val();


        if( $(this).closest('tr').find('.descuento-desde').val() != ''){

            descuento_desde = $(this).closest('tr').find('.descuento-desde').val().split(',');
            descuento_cantidad = $(this).closest('tr').find('.descuento-cantidad').val().split(',');


               for (var i = 0; i < descuento_desde.length; i++) {
                    if( parseInt( cantidad_producto_actual ) >= parseInt( descuento_desde[i] ) ){
                        precio_visible_input = descuento_cantidad[i];
                    }
               }

        }

        



        precio_producto_actual = precio_visible_input;
        precio_final_producto_actual = (precio_producto_actual * cantidad_producto_actual).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 });
        $(this).closest('tr').find('.precio_producto_visible').html(precio_final_producto_actual);

        calcular_total();
    })


/////////////////////////////////////////////////////////////////

    $('#cancelar').click(function(x){
        x.preventDefault();
    })

    $('#cancelar').dblclick(function(x){
        x.preventDefault();
        $('#pedido-total-final, #pedido-anticipo-final, #pedido-saldo-final, .monto-pago-total').html((0).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }) );
        $('.tabla-productos-pv').empty();
    })


/////////////////////////////////////////////////////////////////

    $('body').on('focus', '#busqueda-por-codigo', function(x){
        
        campo = $(this).data('campo');
        url_form = $(this).data('urlsearch');
        valor = $(this).val();
        seccion = $(this).data('seccion');

        elemento_actual = $(this);

        $('.filtro_productos').val('0');

        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "campo" : campo , "valor" : valor , "seccion" : seccion },
        })
        .done(function(data) {

            $('#resultados-ajax2').html(data);

        })
        .error(function(data) {
            alert('error');
            //
        });

    })

    $("#busqueda-por-codigo").on('keyup', function (x) {
    
        codigo_pistola = $(this).val();


        if (x.keyCode == 13) {
            x.preventDefault();

            $('.producto-buscado a').each(function(index, element){

                if( codigo_pistola == $(element).data('codigo')){
                    
                    url_form = $(element).data('action');
                    elemento_actual = $(element);
                    $('.lista-busqueda-productos a').removeClass('producto-seleccionado');
                    elemento_actual.addClass('producto-seleccionado');

                    id = $(element).data('id');

                    $.ajax({
                        type: "POST",
                        url: url_form,
                        data:{ "id" : id },
                    })
                    .done(function(data) {

                        elemento_duplicado = 0;

                        $('.tabla-productos-pv .id_producto').each(function(index,element){

                            if( $(element).val() == id && elemento_duplicado == 0 ){
                                elemento_produco_actual = $(element);
                                elemento_duplicado++;
                            };

                        })

                        if(elemento_duplicado == 0){
                            $('.tabla-productos-pv').append(data);
                        }

                        if(elemento_duplicado == 1){

                            precio_producto_actual = parseFloat(elemento_produco_actual.closest('tr').find('.precio_producto').val());
                            cantidad_producto_actual = parseInt(elemento_produco_actual.closest('tr').find('.cantidad_producto').val())+1;
                            

                precio_visible = parseFloat(elemento_produco_actual.closest('tr').find('.precio_producto').val());

                if( elemento_produco_actual.closest('tr').find('.descuento-desde').val() != ''){

                    descuento_desde = elemento_produco_actual.closest('tr').find('.descuento-desde').val().split(',');
                    descuento_cantidad = elemento_produco_actual.closest('tr').find('.descuento-cantidad').val().split(',');


                       for (var i = 0; i < descuento_desde.length; i++) {
                            if( parseInt( elemento_produco_actual.closest('tr').find('.cantidad_producto').val() )+1 >= parseInt( descuento_desde[i] ) ){
                                precio_visible = descuento_cantidad[i];
                            }
                       }

                }

                
                precio_producto_actual = precio_visible;




                            elemento_produco_actual.closest('tr').find('.cantidad_producto').val(cantidad_producto_actual);
                            precio_final_producto_actual = (precio_producto_actual * cantidad_producto_actual).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 });
                            elemento_produco_actual.closest('tr').find('.precio_producto_visible').html(precio_final_producto_actual);
                        }

                        calcular_total();


                    })
                    .error(function(data) {
                        alert('Hubo un error porfavor intentalo más tarde');
                    });








                };
            })
        
            $(this).val('');

        }

    });



///////////////////////////////////////////////////////////


    $('.lista-pagos a').click(function(x){
        x.preventDefault();
        $(this).closest('ul').find('a').removeClass('actual');
        $(this).addClass('actual');
        tipopago = $(this).data('tipopago');
        $(this).closest('ul').siblings('.tipo_pago').val(tipopago);
    })


//////////////////////////////////////////

    $('.vinculo-deactivado').click(function(x){
        x.preventDefault();
    })

    $('body').on('input', '.input-anticipo', function(x){
        cantidad_anticipo = 0;

        $('.input-anticipo').each(function(index, element){
            if($(element).val() != ''){ 
                cantidad_anticipo = cantidad_anticipo + parseFloat( $(element).val() );
            }
        })


        if( $('#precio_final_productos-abono').length > 0){
            precio_final_productos = $('#precio_final_productos-abono').val();
        }


        if( precio_final_productos - cantidad_anticipo < 0 ){

            $('.monto-pago-total').html( '<b style="color: #872d00">'+(precio_final_productos - cantidad_anticipo).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 })+'</b>' );

        }else{

            $('.monto-pago-total').html( (precio_final_productos - cantidad_anticipo).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }) );

        }



    })


/////////////////////////////////////////////////////////////////////////////////////////

    $('#impresion').attr('src', '');
    $('#recarga').attr('src', '');


    function limpiar_urlvar(uri_var){

        uri_var = uri_var.replace('#','No.');
        uri_var = uri_var.replace('&','');
        uri_var = uri_var.replace('?','');
        uri_var = uri_var.replace('=','');

        return uri_var;

    }

    domicilio = encodeURI($('#datos-sucursalcaja').data('domiciliosucursal'));
    domicilio = limpiar_urlvar(domicilio);

    municipio = encodeURI($('#datos-sucursalcaja').data('municipiosucursal'));
    municipio = limpiar_urlvar(municipio);

    cp = encodeURI($('#datos-sucursalcaja').data('cpsucursal'));
    cp = limpiar_urlvar(cp);

    ciudad = encodeURI($('#datos-sucursalcaja').data('ciudadsucursal'));
    ciudad = limpiar_urlvar(ciudad);

    telefono = encodeURI($('#datos-sucursalcaja').data('telefonosucursal'));
    telefono = limpiar_urlvar(telefono);

    impresoratickets = encodeURI($('#datos-sucursalcaja').data('impresoraticketssucursal'));
    impresoratickets = limpiar_urlvar(impresoratickets);


    $('body').on('submit', '#pago-punto-venta, #pago-punto-venta-anticipo', function(x){
        x.preventDefault();

        url_form = $(this).attr('action');
        elemento_actual = $(this);


        if( elemento_actual.attr('class').indexOf('abono') < 0 ){
            area = 'punto-venta';
        }else{
            area = 'abono';
        }


        monto_pago = $(this).find("input[name='monto_pago']").val();
        tipo_pago = $(this).find("input[name='tipo_pago']").val();
        id_cliente = $(this).find("input[name='id_cliente']").val();

        efectivo = $(this).find("input[name='efectivo']").val();
        transferencia = $(this).find("input[name='transferencia']").val();
        tarjeta = $(this).find("input[name='tarjeta']").val();
        puntos = $(this).find("input[name='puntos']").val();
        puntosacumulados = $(this).find("input[name='puntosacumulados']").val();


        if(area != 'abono'){
                
            id_producto = [];
            $(this).find("input[name='id_producto[]']").each(function(index, element){
                id_producto_actual = $(element).val();
                id_producto.push(id_producto_actual);
            });

            cantidad = [];
            $(this).find("input[name='cantidad[]']").each(function(index, element){
                cantidad_actual = $(element).val();
                cantidad.push(cantidad_actual);
            });

            nombre_producto = [];
            $(".nombre_producto").each(function(index, element){
                nombre_producto_actual = $(element).val();
                nombre_producto.push(nombre_producto_actual);
            });


            precio_producto = [];
            $(".precio_producto").each(function(index, element){

                
                precio_producto_actual = $(element).val();

                if( typeof($(element).siblings(".descuento-desde")) != 'undefined' && $(element).siblings(".descuento-desde").val() != ''){

                    descuento_desde = $(element).siblings(".descuento-desde").val().split(',');
                    descuento_cantidad = $(element).siblings(".descuento-cantidad").val().split(',');

                    for (var i = 0; i < descuento_desde.length; i++) {
                        if( parseInt( $(element).closest('tr').find('.cantidad_producto').val() ) >= parseInt( descuento_desde[i] ) ){
                            precio_producto_actual = descuento_cantidad[i];
                        }
                    }

                }

                precio_producto.push(precio_producto_actual);
            
            });

        }


        if(area != 'abono'){

            if(id_producto.length <= 0){
                alert('Debes seleccionar un cliente y agregar productos para procesar la compra');
                return false;
            };

        }

        if(area != 'abono'){


            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "monto_pago" : monto_pago, "tipo_pago" : tipo_pago, "id_cliente" : id_cliente, "efectivo" : efectivo, "transferencia" : transferencia, "tarjeta" : tarjeta, "puntos" : puntos, "puntosacumulados" : puntosacumulados, "id_producto" : JSON.stringify(id_producto) , "cantidad" : JSON.stringify(cantidad), "descuento" : descuento , "ajax" : 1 },
            })
            .done(function(data) {

                $('.modal-pago-total, .contenido-modal-pago-total').css('display', 'none');

                $('.tabla-productos-pv').empty();

                alert('Compra realizada con éxito');

                $('#pedido-anticipo-final').html((precio_final_productos).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }))

                $('#pedido-saldo-final').html((0).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }));


                if( $(elemento_actual).attr('id') == 'pago-punto-venta-anticipo' ){

                    if(typeof(cantidad_anticipo) != "undefined"){

                        $('#pedido-anticipo-final').html((cantidad_anticipo).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        $('#pedido-saldo-final').html((precio_final_productos - cantidad_anticipo).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }));

                    }else{
                        cantidad_anticipo = 0;
                    }

                }else{
                    cantidad_anticipo = precio_final_productos;
                }

                src_iframe = 'http://localhost/impresion/ticket.php?domicilio='+domicilio+'&municipio='+municipio+'&cp='+cp+'&ciudad='+ciudad+'&telefono='+telefono+'&impresoratickets='+impresoratickets+'&cantidad_anticipo='+cantidad_anticipo+'&total='+precio_final_productos+'&cantidades='+encodeURI(JSON.stringify(cantidad))+'&nombre_producto='+encodeURI(JSON.stringify(nombre_producto))+'&precio_producto='+encodeURI(JSON.stringify(precio_producto))+'&efectivo='+efectivo+'&transferencia='+transferencia+'&puntos='+puntos+'&puntosacumulados='+puntosacumulados+'&tarjeta='+tarjeta+'&tipo_pago='+tipo_pago+'&descuento='+descuento+'&folio='+data;


                $('#impresion').attr('src', src_iframe );

                alert('Imprimir ticket de caja');

                $('#impresion').attr('src', src_iframe );

                setTimeout(function(){ location.reload(true); }, 1000);


            })
            .error(function(data) {
                alert('error');
                //
            });

        }else{

            folio = $(this).find("input[name='folio']").val()
            folio_2 = $(this).find("input[name='folio_2']").val()

            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "monto_pago" : monto_pago, "tipo_pago" : tipo_pago, "id_cliente" : id_cliente, "efectivo" : efectivo, "transferencia" : transferencia, "tarjeta" : tarjeta, "puntos" : puntos, "puntosacumulados" : puntosacumulados, "folio" : folio, "folio_2" : folio_2 },
            })
            .done(function(data) {

                alert('Compra realizada con éxito');

                $('.modal-pago-total, .contenido-modal-pago-total').css('display', 'none');

                total = $('#valor-total-venta').val();
                pagado = $('#valor-pagado-venta').val();

                if( $(elemento_actual).attr('id') == 'pago-punto-venta-anticipo' ){

                if(typeof(cantidad_anticipo) == "undefined"){
                    cantidad_anticipo = 0;
                }

                }else{
                    cantidad_anticipo = total - pagado;
                }


                src_iframe = 'http://localhost/impresion/ticket.php?domicilio='+domicilio+'&municipio='+municipio+'&cp='+cp+'&ciudad='+ciudad+'&telefono='+telefono+'&impresoratickets='+impresoratickets+'&folio='+folio+'&abono=1&cantidad_anticipo='+cantidad_anticipo+'&total='+total+'&pagado='+pagado+'&efectivo='+efectivo+'&transferencia='+transferencia+'&puntos='+puntos+'&puntosacumulados='+puntosacumulados+'&tarjeta='+tarjeta+'&tipo_pago='+tipo_pago+'&pago_parcial=1';


                $('#impresion').attr('src', src_iframe );

                alert('Imprimir ticket de caja');

                $('#impresion').attr('src', src_iframe );

                setTimeout(function(){ location.reload(true); }, 1000);


            })
            .error(function(data) {
                alert('error');
                //
            });


        }



    })



////////////////////////////////////////////////////


    fecha_inicio = '';
    fecha_fin = '';

    $('#ver-reporte-dias').ready(function(x){
        if($('#ver-reporte-dias').is(':visible')){
            url_inicial_reporte = $('#ver-reporte-dias').data('href');
        }
    })
            

    $('body').on('change', '.fechaInicio', function(x){
        fecha_inicio = $(this).val();
    })

    $('body').on('change', '.fechaFin', function(x){
        fecha_fin = $(this).val();
    })

    $('#ver-reporte-dias').click(function(x){
        x.preventDefault();

        if(fecha_inicio != '' && fecha_fin != ''){
            url_dias_reporte =  url_inicial_reporte+fecha_inicio+'/'+fecha_fin;
            location.href = url_dias_reporte; 
        }


    })




////////////////////////////////////////////////////


    $('body').on('click', '.lista-clientes-pedidos a', function(x){
        x.preventDefault();
    })    

    $('body').on('dblclick', '.lista-clientes-pedidos a', function(x){
        x.preventDefault();

        url_form = $(this).data('action');
        elemento_actual = $(this);
        $('.lista-clientes-pedidos a').removeClass('cliente-seleccionado');
        elemento_actual.addClass('cliente-seleccionado');

        $('.tabla-clientes-pedidos').html('');

        id = $(this).data("id");

        $('.estatus-pedidos').css('display','block');

        $('.estatus-pedidos a').removeClass('actual');

        $('.estatus-pedidos a').each( function(index, element){
            if( $(element).data('estatus') == 'todas' ){
                $(element).addClass('actual');
            }
        })

        $('.estatus-pedidos a').attr('data-id', id);
        $('.estatus-pedidos a').data('id', id);

        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "id" : id },
        })
        .done(function(data) {
            $('#datos-cliente-pv').html(data);
        })
        .error(function(data) {
            alert('Hubo un error porfavor intentalo más tarde');
        });

        url_form_pedido = $(this).data('actionpedido');

        $.ajax({
            type: "POST",
            url: url_form_pedido,
            data:{ "id" : id },
        })
        .done(function(data) {
            $('#tabla-clientes-pedidos').html(data);
        })
        .error(function(data) {
            alert('Hubo un error porfavor intentalo más tarde');
        });

    })


    ///////


    $('body').on('click', '.estatus-pedidos a', function(x){
        x.preventDefault();

        elemento_actual = $(this);

        $('.estatus-pedidos a').removeClass('actual');
        elemento_actual.addClass('actual');

        id = $(this).data("id");
        estatus = $(this).data("estatus");


        url_form_pedido = $(this).data('actionpedido');

        $.ajax({
            type: "POST",
            url: url_form_pedido,
            data:{ "id" : id, "estatus" : estatus },
        })
        .done(function(data) {
            $('#tabla-clientes-pedidos').html(data);
        })
        .error(function(data) {
            alert('Hubo un error porfavor intentalo más tarde');
        });

    })


    $('body').on('click', '.pedido-cancelado, .pedido-devuelto', function(x){
        x.preventDefault();

        elemento_actual = $(this);
        id = $(this).data("id");
        url_form = $(this).data('action');

        if( elemento_actual.attr('class').indexOf('pedido-cancelado') < 0 ){
            tipo_modificacion_pedido_mensaje = 'cancelar este pedido';
            tipo_modificacion_pedido = 'cancelar';
        }else{
            tipo_modificacion_pedido_mensaje = 'dar devolución a este pedido';
            tipo_modificacion_pedido = 'devolucion';
        }

        if(confirm("Estas seguro de "+ tipo_modificacion_pedido_mensaje +" esta acción no podrá deshacerse") == true){

            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "id" : id, "tipo_modificacion" : tipo_modificacion_pedido },
            })
            .done(function(data) {

                if(tipo_modificacion_pedido == 'cancelar'){
                    elemento_actual.closest('tr').html('<td colspan="6" style="text-align: center">Pedido cancelado</td>');
                }

                if(tipo_modificacion_pedido == 'devolucion'){
                    dinero_a_devolver = parseFloat(data).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    elemento_actual.closest('tr').html('<td colspan="6" style="text-align: center">Ha quedado registrada la devolución del pedido <br> Dinero a regresar descontando los puntos <b>'+dinero_a_devolver+'</b></td>');
                }


            ////////

            })
            .error(function(data) {
                alert('Hubo un error porfavor intentalo más tarde');
            });

        }

    })


//////////////////////////////////////

    $('body').on('input', '.comprobar-duplicado', function(x){
        x.preventDefault();

        url_form = $(this).data('action');
        elemento_actual = $(this);

        campo_duplicado = $(this).attr('name');
        valor_duplicado = $(this).val();


        // Clear previous timeout
        if ($(this).data('timeout')) {
            clearTimeout($(this).data('timeout'));
        }

        // Set up new one
        $(this).data('timeout', setTimeout(function() {
            //save


            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "campo" : campo_duplicado, "valor" : valor_duplicado },
            })
            .done(function(data) {


                if(data == 'duplicado'){
                    elemento_actual.css('color', 'red');
                    elemento_actual.siblings('.mensaje-duplicado').css('display', 'block');
                }else{
                    elemento_actual.removeAttr('style');
                    elemento_actual.siblings('.mensaje-duplicado').css('display', 'none');
                }
     
     
            })
            .error(function(data) {
                //
            });


    

        }, 500));


    })


////////////////////////////////////

    $('#generar-facturas').click(function(x){
        x.preventDefault();
        importe_tickets = $(this).closest('.formulario_tickets-contenedor').find('input[name="importe"]').val();
        folio_tickets = $(this).closest('.formulario_tickets-contenedor').find('input[name="folio"]').val();
        desde_tickets = $(this).closest('.formulario_tickets-contenedor').find('input[name="desde"]').val();
        hasta_tickets = $(this).closest('.formulario_tickets-contenedor').find('input[name="hasta"]').val();
        sucursal_tickets = $(this).closest('.formulario_tickets-contenedor').find('select[name="sucursal"]').val();
        fecha_tickets = $(this).closest('.formulario_tickets-contenedor').find('input[name="fecha"]').val();



        url_form = $(this).data('urlform');

        if(importe_tickets == '' ||  folio_tickets == '' || desde_tickets == '' || hasta_tickets == '' || fecha_tickets == ''){
            alert('Debes rellenar todos los campos');
        }else{


            $.ajax({
                type: "POST",
                url: url_form,
                data:{ "importe_tickets" : importe_tickets, "folio_tickets" : folio_tickets, "desde_tickets" : desde_tickets, "hasta_tickets" : hasta_tickets, "sucursal" : sucursal_tickets, "fecha_tickets" : fecha_tickets },
            })
            .done(function(data) {

                $('.modal-tickets').css('display','block');
                $('.modal-tickets-mascara').css('display','block');

                $('#formulario_tickets').html(data+'<br><br');



            })
            .error(function(data) {
                alert('Hubo un error por favor intentalo más tarde');
                //
            });


        }
    
    })

     $('.modal-tickets-mascara, .cerrar-modal-tickets').click(function(x){
        x.preventDefault();
        $('.modal-tickets, .modal-tickets-mascara').css('display', 'none');

     })

//////////////////////////////////////

    $('body').on('submit', '.recarga-puntos', function(x){
        x.preventDefault();

        url_form = $(this).attr('action');
        elemento_actual = $(this);

        sucursal = $(this).find("input[name='sucursal']").val();

        if(typeof sucursal == 'undefined'){
            sucursal = $(this).find("select[name='sucursal']").val();
        }
        
        id_cliente = $(this).find("input[name='id_cliente']").val();
        importe = $(this).find("input[name='importe']").val();
        tipo_pago = $(this).find("input[name='tipo_pago']").val();


        $.ajax({
            type: "POST",
            url: url_form,
            data:{ "id_cliente" : id_cliente, "importe" : importe, "tipo_pago" : tipo_pago, "sucursal" : sucursal },
        })
        .done(function(data) {

            alert('Recarga de puntos exitosa');

            resultados_recarga = data.split("||");

            elemento_actual.closest('tr').find('.saldo_tarjeta_actual').html( '<b style="color: #872d00">' + parseFloat(resultados_recarga[0]).toLocaleString("es-MX", { style: 'currency', currency: 'MXN', minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</b>');

            $('.modal-recargar, .contenido-modal-recargar').css('display','none');


            cliente = encodeURI(resultados_recarga[1]);
            cliente = limpiar_urlvar(cliente);

            domicilio = encodeURI(resultados_recarga[2]);
            domicilio = limpiar_urlvar(domicilio);

            cp = encodeURI(resultados_recarga[3]);
            cp = limpiar_urlvar(cp);

            municipio = encodeURI(resultados_recarga[4]);
            municipio = limpiar_urlvar(municipio);

            ciudad = encodeURI(resultados_recarga[5]);
            ciudad = limpiar_urlvar(ciudad);

            telefono = encodeURI(resultados_recarga[6]);
            telefono = limpiar_urlvar(telefono);

            impresoratickets = encodeURI(resultados_recarga[7]);
            impresoratickets = limpiar_urlvar(impresoratickets);



            src_iframe = 'http://localhost/impresion/ticket-recargas.php?importe='+importe+'&tipo_pago='+tipo_pago+'&cliente='+cliente+'&domicilio='+domicilio+'&municipio='+municipio+'&cp='+cp+'&ciudad='+ciudad+'&telefono='+telefono+'&impresoratickets='+impresoratickets;

            $('#recarga').attr('src', src_iframe );

            alert('Imprimir ticket de caja');

            $('#recarga').attr('src', src_iframe );



        })
        .error(function(data) {
            alert('Hubo un error por favor intentalo más tarde');
            //
        });

    })


////////////////////////////////////////

    $('body').on('submit', '#nueva-requisicion', function(x){
        solicitar_requisicion = 1;
        $('.requisicion_inventarioalto').each(function(index, element){


            if( parseInt($(element).text()) < ( parseInt($(element).siblings('.requisicion_inventariocantidad').text()) + parseInt($(element).siblings('.requisicion-cantidades').val()) ) ){

                alert( 'El producto '+ $(this).closest('tr').find('.nombre_producto_requisicion').text() +' tiene limite solo puedes solicitar ' + ( parseInt($(element).text()) - parseInt($(element).siblings('.requisicion_inventariocantidad').text()) + ' unidades' ) );

                solicitar_requisicion--;
            
            }
        })

        if(solicitar_requisicion != 1){
            x.preventDefault();        
        }
    })

    /////////////////////

    $('body').on('click', '.borrar-producto-requisicion-frontend', function(x){
        x.preventDefault();
        $(this).closest('tr').remove();
    }) 


/////////////////////////////////////

    $('.cancelar.igualar').click(function(x){
        x.preventDefault();
        $('.modal-inventario.igualar').css('display','none');
        $('.contenido-modal-inventario.igualar').css('display','none');
    })

//////////////////////////////////////

    $("body").on("input", '.filtrar-catalogo-clientes', function() {
        var value = $(this).val().toLowerCase();
        $('.catalogo-clientes').find('tr').find('.nombre-cliente-catalogo').filter(function() {
          $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

//////////////////////////////////////

    $("body").on("input", '.filtrar-catalogo-productos', function() {
        var value = $(this).val().toLowerCase();
        $('.catalogo-productos').find('tr').find('.nombre-producto-catalogo').filter(function() {
          $(this).closest('tr').toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

//////////////////////////////////////


    $('#abrir-caja, #abrir-caja-vinculo').click(function(x){
        x.preventDefault();
        $('#impresion').attr('src', 'http://localhost/impresion/abrir-caja.php');
    })

//////////////////////////////////////


 
      $('body').on('change', '.fechadinamica', function(){
        $(this).siblings('.fechadinamica_oculta').val($(this).val());
      })

///////////////////////////////////


        $('body').on('input', '.completar_ceros', function(){
            $(this).val( ("00000000" + $(this).val()).slice(-8) );
        })


/////////////////////////////////////

        $('#revisar_inventario').click(function(x){
            x.preventDefault;
            $('.listado-inventario-bajo').fadeIn(500);
        })


        $('.cerrar-inventario-bajo').click(function(x){
            x.preventDefault();
            $('.listado-inventario-bajo').fadeOut(500);
        })

///////////////////////////////////////////////

    $('#habilitar-botones').load(function(x){
        $('.vinculos-caja').css('display', 'block');
    })

///////////////////////////////////////////////

    $('body').on('click', '.agregar-desc', function(x){
        x.preventDefault();
        $(this).siblings('.descuentos-modal, .mascara-modal-descuentos').fadeIn(500);
    })

    $('body').on('click', '.agregar-descuento-boton', function(x){
        x.preventDefault();

        desde_descuento = '';
        cantidad_descuento = '';

        desde_descuento = $(this).siblings( '.desde-contenedor-descuento' ).find('input').val();
        cantidad_descuento = $(this).siblings( '.cantidad-contenedor-descuento' ).find('input').val();

        if(desde_descuento == '' || cantidad_descuento == ''){
            alert('Por favor completa los campos de cantidad y precio antes de agregar el descuento')
        }else{

            $(this).siblings('.descuentos-agregados').prepend('\
                <div class="descuento-agregado">\
                    <div class="col-md-5">\
                        A partir de\
                        <input type="text" class="form-control desde-input" value="'+desde_descuento+'" readonly>\
                    </div> <div class="col-md-5">\
                        Descuento\
                        <input type="text" class="form-control cantidad-input" value="'+cantidad_descuento+'" readonly>\
                    </div>\
                    <div class="col-md-2">\
                        <div class="clearfix"></div><br>\
                        <a href="#" class="btn btn-rojo borrar-descuento"><i class="fa fa-times"></i></a>\
                    </div>\
                    <div class="clearfix"></div><hr>\
                </div>\
            ');

             $(this).siblings( '.desde-contenedor-descuento' ).find('input').val('');
             $(this).siblings( '.cantidad-contenedor-descuento' ).find('input').val('');

        }

    })

    $('body').on('click', '.borrar-descuento', function(x){
        x.preventDefault();
        $(this).closest('.descuento-agregado').remove();
    })


    $('body').on('click', '.actualizar-descuentos', function(x){
        x.preventDefault();
        array_desde = [];
        array_cantidad = [];
        $(this).siblings('.descuentos-agregados').find('.desde-input').each(function(index, element){
            array_desde.push($(element).val());
            array_cantidad.push( $(element).closest('.descuento-agregado').find('.cantidad-input').val());
        })

        $(this).siblings('input[name="desde_descuentos[]"]').val(array_desde);
        $(this).siblings('input[name="cantidad_descuentos[]"]').val(array_cantidad);

        $(this).closest('.descuentos-modal').css('display','none');
        $(this).closest('.descuentos-modal').siblings('.mascara-modal-descuentos').css('display','none');

    })

    $('#ver-facturas').click(function(x){
        x.preventDefault();
        sucursal_tickets = $(this).closest('ul').find('select[name="sucursal"]').val();
        fechainicio_tickets = $(this).closest('ul').find('.fechaInicio').val();
        fechafin_tickets = $(this).closest('ul').find('.fechaFin').val();

        if(fechainicio_tickets != '' && fechafin_tickets != ''){
            window.location.href =  $(this).data('urlinicial')+sucursal_tickets+'/'+fechainicio_tickets+'/'+fechafin_tickets;
        }

    })


/////////////////////////////////////////////////////////

    $('body').on('click', '.ver-descuentos-pv', function(x){
        x.preventDefault();
        if($(this).siblings('.descuentos-pv').find('.descuentos-pv-modal').is(':visible')){
            $(this).find('i').addClass('fa-tag');
            $(this).find('i').removeClass('fa-times');
            $(this).siblings('.descuentos-pv').find('.descuentos-pv-modal').css('display', 'none');                        
        }else{
            $(this).find('i').removeClass('fa-tag');
            $(this).find('i').addClass('fa-times');
            $(this).siblings('.descuentos-pv').find('.descuentos-pv-modal').css('display', 'block');            
        }
    
    })

////////////////////////////////////////////////////////////////


    $('.siguiente').click(function(x){
        x.preventDefault();
        $(this).closest('li').css('display','none');
        $(this).closest('li').next().css('display','block');
    })

    $('.anterior').click(function(x){
        x.preventDefault();
        $(this).closest('li').css('display','none');
        $(this).closest('li').prev().css('display','block');
    })



/////////////////////////////////////////////////////



    $('body').on('click', '.lista-carreras', function(x){
        x.preventDefault();
        url_form = $(this).data('action');
        elemento = $(this);

        $.ajax({
            type: "POST",
            url: url_form,
            // data:{ "id_carrera" : id_carrera },
        })
        .done(function(data) {
            $('.lista-carreras').removeClass('actual');
            elemento.addClass('actual');
            $('.lista-grados-contenedor').css('display', 'block').html(data);
        })
        .error(function(data) {

        });

    })

    $('body').on('click', '.lista-grados', function(x){
        x.preventDefault();
        url_form = $(this).data('action');
        elemento = $(this);

        $.ajax({
            type: "POST",
            url: url_form,
            // data:{ "id_carrera" : id_carrera },
        })
        .done(function(data) {
            $('.lista-grados').removeClass('actual');
            elemento.addClass('actual');
            $('.lista-materias-contenedor').css('display', 'block').html(data);
        })
        .error(function(data) {

        });

    })


    $('body').on('click', '.lista-materias', function(x){
        x.preventDefault();
        url_form = $(this).data('action');
        elemento = $(this);

        $.ajax({
            type: "POST",
            url: url_form,
            // data:{ "id_carrera" : id_carrera },
        })
        .done(function(data) {
            $('.lista-materias').removeClass('actual');
            elemento.addClass('actual');
            $('.lista-horarios-contenedor').css('display', 'block').html(data);

        })
        .error(function(data) {

        });

    })


})

    //////////////////////////// Imorimir


$(document).ready(function(){


    $('body').on('click', '#ver-ficha', function(x){
        x.preventDefault();
        $('.modal_imprimir').css('display','block');
    })


    $('body').on('click', '#cerrar-modal-imprimir', function(x){
        x.preventDefault();
        $('.modal_imprimir').css('display','none');
    })



///////////////////////////////////



    $('body').on("keyup", "#busqueda", function() {
        var value = $(this).val().toLowerCase();
        $(".listado-alumnos li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

///////////////////////////////////////

    $('body').on('change', '#licenciatura-select', function(x){
        x.preventDefault();

        $('#grado-select').load($(this).data('url')+$(this).val());

    })


///////////////////////////////////////

    $('body').on('change', '#modalidad-select', function(x){
        x.preventDefault();

        console.log($(this).val());

        $('#turno-select').load($(this).data('url')+$(this).val());

    })

/////////////////////////////////////


    $('body').on('change', '#selector-modalidad', function(x){

        $('.lista-materias.actual').data('action', $("option:selected", this).data('action'));
        $('.lista-materias.actual').trigger('click');
    })


///////////////////////////////////////


    $('body').on('change', '#licenciatura-select-pagos', function(x){
        x.preventDefault();

        selector = $('#licenciatura-select-pagos');
        $('#grado-select-pagos').load(selector.data('url')+selector.val(), function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")

                $('#alumno-select').load(selector.data('url-alumnos')+$('#grado-select-pagos').val());
            
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        }) 
    })



    $('body').on('change', '#grado-select-pagos', function(x){
        x.preventDefault();

        selector = $('#licenciatura-select-pagos');
        $('#alumno-select').load(selector.data('url-alumnos')+$('#grado-select-pagos').val());
            
    })


////////////////////////////////////////////editar calificaciones maestros


$('body').on('click', '#editar-calificaciones' ,function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $('#formulario-calificaciones');
    var url = form.data('action');
    elemento = $(this);
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
                alert('Las calificaciones han sido modificadas'); // show response from the php script.
                $('.lista-materias.actual').trigger('click');
           }
         });

    
});



////////////////////////////////////////////editar calificaciones maestros


$('body').on('click', '#editar-horarios' ,function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $('#formulario-horarios');
    var url = form.data('action');
    elemento = $(this);
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
                alert('Los horarios han sido modificados'); // show response from the php script.
                $('.lista-materias.actual').trigger('click');
           }
         })
        .done(function(data) {

            console.log(data);
            
        })
        .error(function(data) {

            console.log(data);

        });
    
});



//////////////////////////////////////////////////

    $('body').on('click', '.grados-filtro a', function(x){

        url_materias  = $('.grados-filtro').data('url');
        id_grado = $('.select-grados-materias select').val();
        id_materia = $('.select-carreras-materias select').val();

        $('.grados-filtro a').attr('href', url_materias+'/'+id_materia+'/'+id_grado);
    });


/////////////////////////////////////////////////


    $('body').on('click', '.disponibilidad-menos', function(x){
        x.preventDefault();
        $(this).closest('tr').empty();
    });

    $('body').on('click', '.disponibilidad-mas', function(x){
        x.preventDefault();
        $('.tabla-disponibilidad').append(fila_disponibilidad);
        $('.hora').timepicker({ 'timeFormat': 'H:i A' });
    });


    // /////////////////////////////////////////////////

    $('body').on('change', '#select_tipo_usuario', function(x){
        valor_select_tipo_usuario = $(this).val();
    
        if(valor_select_tipo_usuario == 'cliente'){
            $('#anuncios_asociados_cliente').css('display','table-row');
        }else{
            $('#anuncios_asociados_cliente').css('display','none');
        }

    })
    
    


})


    function printDiv(nombreDiv) {
         var contenido= document.getElementById(nombreDiv).innerHTML;
         var contenidoOriginal= document.body.innerHTML;

         document.body.innerHTML = contenido;

         window.print();

         document.body.innerHTML = contenidoOriginal;
    }




