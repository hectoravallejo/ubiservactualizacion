<?php /*include('config/vars.php');*/ ?>
<?php if(!@include('config/vars.php')){ include('../sistema/config/vars.php'); } ?>
<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS-->

    <link rel="stylesheet" type="text/css" href="<?= $path.'/css/admin/main.css'; ?>">

    <link rel="stylesheet" type="text/css" href="<?= $path.'/css/admin/jquery.timepicker.css'; ?>">

    <link rel="stylesheet" type="text/css" href="<?= $path.'/css/admin/wheelcolorpicker.css'; ?>">

    <!-- Font-icon css-->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  media='screen,print'>

    <title><?php echo $nombre_sitio; if(isset($title)){ echo ($title == '') ? $title : ' - '.$title; } ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->

    <!--if lt IE 9

    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')

    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')

    -->



    <!-- Javascripts-->

    <script src="<?= $path.'/js/admin/jquery-2.1.4.min.js'; ?>"></script>

    <script src="<?= $path.'/js/admin/jquery-ui.min.js'; ?>"></script>

    <script src="<?= $path.'/js/admin/bootstrap.min.js'; ?>"></script>

    <script src="<?= $path.'/js/admin/jquery.stringToSlug.min.js'; ?>"></script>

    <script src="<?= $path.'/js/admin/jquery.timepicker.js'; ?>"></script>

    <script src="<?= $path.'/js/admin/jquery.wheelcolorpicker.js'; ?>"></script>

    <script src="<?= $path.'/js/admin/main.js'; ?>"></script>

    <script type="text/javascript" src="<?= $path.'/js/admin/plugins/bootstrap-notify.min.js'; ?>"></script>

    <script type="text/javascript" src="<?= $path.'/js/admin/plugins/bootstrap-datepicker.min.js'; ?>"></script>

    <script type="text/javascript" src="<?= $path.'/js/admin/plugins/sweetalert.min.js'; ?>"></script>

    <script type="text/javascript" src="<?= $path.'/js/admin/plugins/select2.min.js'; ?>"></script>

    <script type="text/javascript" src="<?= $path.'/js/admin/tinymce/tinymce.min.js'; ?>"></script>

    <script type="text/javascript" src="<?= $path.'/js/admin/es_MX.js'; ?>"></script>

    <script src="<?= $path.'/js/admin/charts/chart.js'; ?>"></script>





    <script>

    tinymce.init({

        selector: ".editor",

        menubar: false,

        convert_urls : false,

        plugins: [

            "advlist autolink lists link image charmap print preview anchor",

            "searchreplace visualblocks code fullscreen",

            "insertdatetime media table contextmenu paste imgsurfer"

        ],

        // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist | imgsurfer media"

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist "

    });

    </script>





    <script>

    tinymce.init({

        selector: ".editor-simple",

        menubar: false,

        statusbar: false,

        convert_urls : false,

        plugins: [

        ],

        toolbar: "bold"

    });

    </script>



  </head>

  <body class="sidebar-mini fixed">

<script>
    $(document).ready(function(){
        $('.hora').timepicker({ 'timeFormat': 'H:i A' });
    })
</script>
