$(document).ready(function (x) {


  // Animar boton

  $.fn.extend({
    animateCss: function (animationName, callback) {
      var animationEnd =
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
      this.addClass("animate__animated " + animationName).one(animationEnd, function () {
        $(this).removeClass("animate__animated " + animationName);
        if (callback) {
          callback();
        }
      });
      return this;
    }
  });

  // Fin animar boton


  function formato_moneda(monto){

    return '$' + parseFloat(monto, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();

  }


  function actualizar_boton_carrito() {
    
    $('.ver-carrito').animateCss("animate__bounce");
    $('.ver-carrito span').html(productos.nombres.length);

    total = 0;

    for (var i = 0; i < productos.precios.length; i += 1) {

      total +=  ( productos.precios[i] * productos.cantidades[i] );

    }


    $('.total-carrito').html( 'Total: ' + formato_moneda(total) );

    vinculo_whatsapp = $('#boton-whatsapp').data('linkwhatsapp');


    for (var i = 0; i < productos.nombres.length; i += 1) {

      vinculo_whatsapp += 
        productos.cantidades[i] + 
        ` - ` + 
        productos.nombres[i] + 
        ` - ` + 
        formato_moneda( productos.precios[i] ) + 
        ` - ` + 
        formato_moneda( productos.precios[i] * productos.cantidades[i] ) + 
        `%0A`;

    }

    vinculo_whatsapp += '*'+$('.total-carrito').text()+'*';


    $('#boton-whatsapp').attr('href', vinculo_whatsapp);

  

  
  
  }






  // localStorage.clear();
  
  function obtener_campo_json(campo_buscar, valor_buscar, valor_retornar) {


    for (var i = 0; i < campo_buscar.length; i += 1) {

      if (campo_buscar[i] == valor_buscar) {
        return valor_retornar[i]
      }

    }

  }

  function actualizar_json(campo_buscar, valor_buscar, campo_reemplazar, valor_reemplazar) {

    for (var i = 0; i < campo_buscar.length; i += 1) {

      if (campo_buscar[i] == valor_buscar) {
        campo_reemplazar[i] = valor_reemplazar;
      }

    }

  }

  function eliminar_json(campo_buscar, valor_buscar, campos_borrar, variable_objeto, nombre_variable_storage ) {

    for (var i = 0; i < campo_buscar.length; i += 1) {

      if (campo_buscar[i] == valor_buscar) {

        for (var ii = 0; ii < campos_borrar.length; ii += 1) {
          campos_borrar[ii].splice(i, 1);
        }

        localStorage.setItem( nombre_variable_storage , JSON.stringify( variable_objeto ) );

        console.log(variable_objeto);

      }

    }

  }

  // Establecer valor json de localstorage si no esta y si esta poner variable con valor de existente locastorage

  if (localStorage.getItem('productos') == undefined) {

    productos = {

      "nombres": [],
      "precios": [],
      "imagenes": [],
      "cantidades": [],

    };

    localStorage.setItem('productos', JSON.stringify(productos));


  } else {

    productos = localStorage.getItem('productos');

    productos = JSON.parse(productos);

    actualizar_boton_carrito();

  }



  // Accion agregar productos

  $('.agregar').click(function (x) {
    x.preventDefault();

    nombre = $(this).data('nombre');
    precio = $(this).data('precio');
    imagen = $(this).data('imagen');
    cantidad = parseInt($(this).parent('.producto').find('.cantidad').val());


    // obtener valor

    producto_cantidad = obtener_campo_json(productos.nombres, nombre, productos.cantidades);


    // Si no exite el campo inserta valores si existe modifica
    if (producto_cantidad == undefined) {
      // inserta
      productos.nombres.push(nombre);
      productos.precios.push(precio);
      productos.imagenes.push(imagen);
      productos.cantidades.push(cantidad);

    } else {
      // modifica
      actualizar_json(productos.nombres, nombre, productos.cantidades, cantidad);
    }


    localStorage.setItem('productos', JSON.stringify(productos));


    // actualizar boton carrito
    actualizar_boton_carrito();

    console.log(productos);


  })


  // Accion eliminar productos

  $('body').on('click', '.eliminar-producto', function(x){
    x.preventDefault();

    campo_valor = $(this).data('nombre');
    eliminar_campos = [ productos.nombres, productos.precios, productos.imagenes, productos.cantidades ];

    eliminar_json(productos.nombres, campo_valor, eliminar_campos, productos, 'productos');

    $(this).closest('.fila-producto').remove();

    $('.ver-carrito span').html(productos.nombres.length);

    actualizar_boton_carrito()

  })


  // actualizar carrito 


  $('body').on('click', '.actualizar-carrito', function(x){
    x.preventDefault();

    $('.cantidades-carrito').each(function(index, element){

      productos.cantidades[index] = $(element).val();

      localStorage.setItem('productos', JSON.stringify(productos));

      console.log(productos);

    })

    actualizar_boton_carrito()

    console.log(productos);

  })

  ///////////////////////////// Acciones modal carrito






  $('.ver-carrito').click(function (x) {
    x.preventDefault();

    filas_productos = '';

    for (var i = 0; i < productos.nombres.length; i += 1) {

      filas_productos += `
        <div class="col-md-12 fila-producto">
          <div class="row">
            <div class="col-xs-1 col-xs-offset-1">
              <img src="` + productos.imagenes[i] + `" class="img-responsive">
            </div>
            <div class="col-xs-2 padding-carrito">` + productos.nombres[i] + `</div>
            <div class="col-xs-2"> 
              <input type="number" value="`+ productos.cantidades[i] + `" class="form-control cantidades-carrito">    
            </div>
            <div class="col-xs-2 padding-carrito">` + formato_moneda( productos.precios[i] ) + `</div>
            <div class="col-xs-2 padding-carrito"><b>` + formato_moneda( productos.precios[i] * productos.cantidades[i] ) + `</b></div>
            <div class="col-xs-1 padding-carrito">
              <a href="#" class="eliminar-producto" data-nombre="` + productos.nombres[i] + `"><i class="fa fa-times"></i></a>
            </div>
          </div>
        </div>
      `;


    }


    $('.modal-carrito').css('display', 'block');

    $('.carrito').html(filas_productos);

  })


  $('.modal-carrito').click(function (x) {
    if (x.target === this) {
      $(this).css('display', 'none');
    }
  })


})