<?php
    session_start();
    $_SESSION["logged"]["content"] = 2;
    header("location: ../view/logged.php");
