<?php // include('includes/admin-header.php');
include('includes/webservice-header.php');


$decimals = 2;

$proveedores->ver(NULL, array('id_categoria' => $id_categoria));


foreach ($proveedores->proveedores as $i => $proveedor) {
  $proveedor = (object)$proveedor;

  if ($proveedor->activo == 0) {
    unset($proveedores->proveedores[$i]);
  } else {

    // Obtener horarios

    //Obtener dia actual


    /// Si no esta marcado ningun dia esta abierto de lo contrario se ve el horario

    if (
      $proveedor->lunes != 0 ||
      $proveedor->martes != 0 ||
      $proveedor->miercoles != 0 ||
      $proveedor->jueves != 0 ||
      $proveedor->viernes != 0 ||
      $proveedor->sabado != 0 ||
      $proveedor->domingo != 0
    ) {

      $proveedores->proveedores[$i]['dia_actual'] = date("N", time());
      $proveedores->proveedores[$i]['hora_actual'] = date("H:i", time());


      switch ($proveedores->proveedores[$i]['dia_actual']) {

        case 1:
          if ($proveedor->lunes == 1) {

            if (
              $proveedores->proveedores[$i]['hora_actual'] >= $proveedor->desde_lunes &&
              $proveedores->proveedores[$i]['hora_actual'] <= $proveedor->hasta_lunes
            ) {
              $abierto = TRUE;
            } else {
              $abierto = FALSE;
            }
          } else {
            $abierto = FALSE;
          }
          break;

        case 2:
          if ($proveedor->martes == 1) {

            if (
              $proveedores->proveedores[$i]['hora_actual'] >= $proveedor->desde_martes &&
              $proveedores->proveedores[$i]['hora_actual'] <= $proveedor->hasta_martes
            ) {
              $abierto = TRUE;
            } else {
              $abierto = FALSE;
            }
          } else {
            $abierto = FALSE;
          }
          break;

        case 3:
          if ($proveedor->miercoles == 1) {

            if (
              $proveedores->proveedores[$i]['hora_actual'] >= $proveedor->desde_miercoles &&
              $proveedores->proveedores[$i]['hora_actual'] <= $proveedor->hasta_miercoles
            ) {
              $abierto = TRUE;
            } else {
              $abierto = FALSE;
            }
          } else {
            $abierto = FALSE;
          }
          break;

        case 4:
          if ($proveedor->jueves == 1) {

            if (
              $proveedores->proveedores[$i]['hora_actual'] >= $proveedor->desde_jueves &&
              $proveedores->proveedores[$i]['hora_actual'] <= $proveedor->hasta_jueves
            ) {
              $abierto = TRUE;
            } else {
              $abierto = FALSE;
            }
          } else {
            $abierto = FALSE;
          }
          break;

        case 5:
          if ($proveedor->viernes == 1) {

            if (
              $proveedores->proveedores[$i]['hora_actual'] >= $proveedor->desde_viernes &&
              $proveedores->proveedores[$i]['hora_actual'] <= $proveedor->hasta_viernes
            ) {
              $abierto = TRUE;
            } else {
              $abierto = FALSE;
            }
          } else {
            $abierto = FALSE;
          }
          break;

        case 6:
          if ($proveedor->sabado == 1) {

            if (
              $proveedores->proveedores[$i]['hora_actual'] >= $proveedor->desde_sabado &&
              $proveedores->proveedores[$i]['hora_actual'] <= $proveedor->hasta_sabado
            ) {
              $abierto = TRUE;
            } else {
              $abierto = FALSE;
            }
          } else {
            $abierto = FALSE;
          }
          break;

        case 7:
          if ($proveedor->domingo == 1) {

            if (
              $proveedores->proveedores[$i]['hora_actual'] >= $proveedor->desde_domingo &&
              $proveedores->proveedores[$i]['hora_actual'] <= $proveedor->hasta_domingo
            ) {
              $abierto = TRUE;
            } else {
              $abierto = FALSE;
            }
          } else {
            $abierto = FALSE;
          }
          break;
      }
    } else {

      $abierto = TRUE;
    }



    $proveedores->proveedores[$i]['abierto'] = $abierto;




    if ($data['latitud'] != NULL && $data['latitud'] != '') {

      // calcula distancia entre un punto y otro
      $degrees =
        rad2deg(acos(
          (sin(deg2rad((float)$data['latitud'])) * sin(deg2rad((float)$proveedor->latitud))) +
            (cos(deg2rad((float)$data['latitud'])) * cos(deg2rad((float)$proveedor->latitud)) *
              cos(deg2rad((float)$data['longitud'] - floatval((float)$proveedor->longitud))))
        ));

      $distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735) 

      // agrega el key distancia al nodo
      $proveedores->proveedores[$i]['distancia'] = round($distance, $decimals);

      // remueve nodos que son menores a la distancia
      if (
        $proveedores->proveedores[$i]['distancia'] > $distancia_usuario &&
        $proveedor->id_categoria != 33 &&
        $proveedor->id_categoria != 35 &&
        $proveedor->mostrar == 0
      ) {

        // No funciona unset se hace el if despues
  
        unset($proveedores->proveedores[$i]);
      }
    } else {
      $proveedores->proveedores[$i]['distancia'] = '?';
    }
  }
}

$proveedores_filtrados = array();

foreach ($proveedores->proveedores as $proveedor) {
  $proveedor = (object)$proveedor;
  if($proveedor->distancia < $distancia_usuario){
    $proveedores_filtrados[] = $proveedor;
  }
}


echo json_encode(array_reverse($proveedores_filtrados));


// // Get memory size
// $disk_free_memory = memory_get_usage();

// // Specify memory unit
// $memory_unit = array('Bytes','KB','MB','GB','TB','PB');

// // Display memory size into kb, mb etc.
// echo 'All Used Memory : '.round($disk_free_memory/pow(1024,($x=floor(log($disk_free_memory,1024)))),2).' '.$memory_unit[$x]."\n";