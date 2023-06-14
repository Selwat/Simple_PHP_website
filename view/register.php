<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dziennik Zarejestruj</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <?php
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
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="register.php" class="h1"><span style="color: #007bff"><b>Dziennik</b></a></span>
        </div>
        <div class="card-body">
            <p class="text-center h3"><span style="color: #007bff">Rejestracja użytkownika</p>

            <form action="../scripts/register.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Podaj imię" name="Imie">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Podaj nazwisko" name="Nazwisko">
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Podaj email" name="Email">

                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Powtórz email" name="PotwierdźEmail">

                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Podaj hasło" name="Hasło">
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Powtórz hasło" name="PotwierdźHasło">
                </div>

                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="DataUrodzenia">
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Numer telefonu" name="NumerTelefonu">
                </div>

                <div class="row">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="Term" value="agree">
                            <label for="agreeTerms">
                                Zgadzam się z <a href="regulamin.php">regulaminem</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">Rejestracja</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="./" class="text-center">Mam już konto</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>




</html>