<?php
    session_start();

if ($_POST["Email"] != $_POST["ConfirmEmail"]){
    $errors[] = "Adresy email muszą być identyczne";
}

if ($_POST["Password"] != $_POST["ConfirmPassword"]){
    $errors[] = "Hasła muszą być identyczne";
}

if (!isset($_POST["Term"]))
    $errors[] = "Zatwierdź regulamin";



