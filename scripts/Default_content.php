<?php
    session_start();
    $_SESSION["logged"]["content"]=1;
    header("location: ../view/logged.php");

