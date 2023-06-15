<?php
    session_start();
    if (isset($_SESSION["logged"]) && $_SESSION["logged"]["session_id"] == session_id() && session_status() == 2) {
        header("location: ./logged.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dziennik Zaloguj</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <?php
    if (isset($_SESSION["sukces"])){
        echo <<< ERROR
        <div class="callout callout-success">
           <h5>Operacja powiodła się!</h5>
           <p>$_SESSION[sukces]</p>
        </div>
ERROR;
        unset($_SESSION["sukces"]);
    }

    if (isset($_SESSION["bledy"])){
        echo <<< ERROR
        <div class="callout callout-danger">
           <h5>Błąd!</h5>
           <p>$_SESSION[bledy]</p>
        </div>
ERROR;

        unset($_SESSION["bledy"]);
    }
    ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="./" class="h1"><span style="color: #007bff"><b>Dziennik</b></a></span>
        </div>
        <div class="card-body">
            <p class="text-center h5"><span style="color: #007bff">Zaloguj się do dziennika</p>

            <form action="../scripts/login.php" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="Email">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Hasło" name="Hasło">
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center mt-2 mb-3">
                <button onclick="window.location.href = 'register.php';" class="btn btn-primary btn-block">Zarejestruj</button>
            </div>
            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="forgot-password.php" class="btn btn-block btn-danger">Zapomniałem hasła</a>
            </div>
<!--            <p class="mb-0">-->
<!--                <a href="register.php" class="text-center">Zarejestruj</a>-->
<!--            </p>-->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
