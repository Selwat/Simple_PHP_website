<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli("localhost", "root", "", "dziennik");

    $sql = "SELECT * FROM users JOIN grades ON users.id = grades.student_id WHERE grades.id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $name = $row["Name"];
        $lastName = $row["LastName"];
        $grade = $row["grade"];
        $subject = $row["subject"];
        $opis = $row["opis"];

    } else {
        echo "Błąd!";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $grade = $_POST["grade"];
        $subject = $_POST["subject"];
        $opis = $_POST["opis"];

        $sql2 = "UPDATE users JOIN grades ON users.id = grades.student_id SET users.Name = '$name', users.LastName = '$lastName', grades.grade = '$grade', grades.subject = '$subject', grades.opis = '$opis' WHERE grades.id = $id";

        if ($conn->query($sql2) === TRUE) {

            $oldGrade = $row["grade"];
            $newGrade = $grade;

            $sql3 = "INSERT INTO history (Student_Name, Student_LastName, OldGrade, NewGrade, subject, opis) VALUES ('$name', '$lastName', $oldGrade, $newGrade, '$subject', '$opis')";
            if ($conn->query($sql3) === TRUE) {
                header("Location: ../logged.php");
            }
            else {
                echo "Wystąpił błąd podczas dodawania wpisu do historii: " . $conn->error;
            }
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

    <label for="role">Ocena:</label>
    <input type="text" id="grade" name="grade" value="<?php echo $grade; ?>"><br>

    <label for="email">Przedmiot:</label>
    <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>"><br>

    <label for="phoneNumber">Opis: </label>
    <input type="text" id="opis" name="opis" value="<?php echo $opis; ?>"><br>

    <input type="submit" value="Zapisz zmiany">
</form>
</body>
</html>
