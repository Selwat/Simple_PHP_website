<?php
    session_start();
    $_SESSION["logged"]["content"] = 3;
    header("location: ../view/logged.php");