<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli("localhost", "root", "", "dziennik");

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["Name"];
        $lastName = $row["LastName"];
        $role = $row["role"];
        $email = $row["Email"];
        $phoneNumber = $row["PhoneNumber"];
        $birthday = $row["Birthday"];
    } else {
        echo "Nie znaleziono użytkownika o podanym identyfikatorze.";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $role = $_POST["role"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];
        $birthday = $_POST["birthday"];

        $sql = "UPDATE users SET Name = '$name', LastName = '$lastName', role = '$role', Email = '$email', PhoneNumber = '$phoneNumber', Birthday = '$birthday' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../logged.php");
        } else {
            echo "Wystąpił błąd podczas aktualizacji danych użytkownika: " . $conn->error;
        }
    }

} else {
    echo "Nieprawidłowy identyfikator użytkownika.";
    exit;
}

?>

<form method="POST" action="">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>

    <label for="lastName">Nazwisko:</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>"><br>

    <label for="role">Rola:</label>
    <input type="text" id="role" name="role" value="<?php echo $role; ?>"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>

    <label for="phoneNumber">Numer Telefonu:</label>
    <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>"><br>

    <label for="birthday">Data Urodzenia:</label>
    <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>"><br>

    <input type="submit" value="Zapisz zmiany">
</form>
</body>
</html>