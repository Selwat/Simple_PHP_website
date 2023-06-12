<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cashon Zaloguj</title>

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
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="./" class="h1"><span style="color: #007bff"><b>Cashon</b></a></span>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Zaloguj się do banku</p>

            <form method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Hasło">
                </div>
                <div class="row">
                    <div class="col-8">
                        <button type="submit" formaction="register.php" class="btn btn-primary btn-block">Zarejestruj</button>
                    </div>
                    <div class="col-4">
                        <button type="submit" formaction="login.php" class="btn btn-primary btn-block">Zaloguj</button>
                    </div>
                </div>
            </form>

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
