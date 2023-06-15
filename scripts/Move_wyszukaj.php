<?php
    session_start();
    $_SESSION["logged"]["content"] = 5;
    header("location: ../view/logged.php");