<?php

    $conn = new mysqli("localhost", "root", "", "dziennik");

    $role = $_POST['role'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST["password"], PASSWORD_ARGON2I);
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];

    $sql = "INSERT INTO users (role, Name, LastName, Email, Password, PhoneNumber, Birthday)
            VALUES ('$role', '$name', '$lastname', '$email', '$password_hash', '$phone', '$birthday')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>history.back()</script>";
    } else {
        echo "Wystąpił błąd podczas dodawania użytkownika: " . $conn->error;
    }

?>

