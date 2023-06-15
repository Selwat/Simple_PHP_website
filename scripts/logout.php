<?php
    session_start();
    session_destroy();
    $_SESSION["sukces"] = 'Prawidłowo wylogowano użytkownika';
    header("location: ../view");