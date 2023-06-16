<?php
    session_start();
    if (!isset($_SESSION["logged"]) || $_SESSION["logged"]["session_id"] != session_id() || session_status() != 2)
    {
        header("location: ./");
        exit();
    }
    else
    {
        if ($_SESSION["logged"]["role"] == "admin")
        {
            $path="Admin";
        }
        else if ($_SESSION["logged"]["role"] == "nauczyciel")
        {
            $path="Nauczyciel";
        }
        else
        {
            $path="Uczen";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dziennik elektroniczny | Pulpit</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php
    require_once "./navbar.php";
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    require_once "./$path/aside.php";
    ?>

    <!-- Content Wrapper. Contains page content -->
    <?php
    switch($_SESSION["logged"]["content"]){
        case 1:
            $path2 = "content.php";
            break;
        case 2:
            $path2 = "content_oceny.php";
            break;
        case 3:
            $path2 = "content_historia_ocen.php";
            break;
        case 4:
            $path2= "content_panel_administracyjny.php";
            break;
        case 5:
            $path2= "content_wyszukaj.php";
            break;
        case 7:
            $path2= "content_historia_ocen_nauczyciel.php";
            break;
        case 8:
            $path2= "content_oceny_nauczyciel.php";
            break;
    }

    require_once "./$path/$path2";
    ?>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
</body>
</html>
