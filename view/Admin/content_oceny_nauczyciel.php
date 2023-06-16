<style>
    .tabela {
        margin-left: 10vw;
        margin-top: 10vh;
        width: 60vw;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
    }

   td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        color: white;
    }
    th {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        color: grey;
    }

    th {
        background-color: #f9f9f9;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: grey;
    }

    tr:hover {
        background-color: grey;
    }
    .m-0{
        padding-left:2vw;
    }
    .form-container {
        width: 400px;
        margin-left: 25vw;
        margin-top:30px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-heading {
        text-align: center;
        margin-bottom: 20px;
    }

    .grade-form {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        margin-bottom: 10px;
        font-weight: bold;
    }

    .form-input {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .form-submit {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .form-submit:hover {
        background-color: #0056b3;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Oceny uczniów</h1>
                    <table>
                        <?php

                        $conn = new mysqli("localhost", "root", "", "dziennik");

                        $sql = "SELECT * FROM users JOIN grades ON users.id = grades.student_id WHERE users.role = 'uczeń'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='tabela'>";
                            echo "<tr><th>Imie</th><th>Nazwisko</th><th>Ocena</th><th>Przedmiot</th><th>Opis</th><th>Akcje</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["LastName"] . "</td>";
                                echo "<td>" . $row["grade"] . "</td>";
                                echo "<td>" . $row["subject"] . "</td>";
                                echo "<td>" . $row["opis"] . "</td>";
                                echo "<td><a href='CRUD operations/edit_grade.php?id=" . $row["id"] . "'>Edytuj</a> | <a href='CRUD operations/delete_grade.php?id=" . $row["id"] . "'>Usuń</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "Brak danych do wyświetlenia.";
                        }
                        ?>
                    </table>
                    <div class="form-container">
                        <h1 class="form-heading">Wpisz ocenę</h1>

                        <form class="grade-form" action="CRUD operations/insert_grade.php" method="POST">
                            <label class="form-label">Imię ucznia:</label>
                            <input class="form-input" type="text" name="imie_ucznia"><br>

                            <label class="form-label">Nazwisko ucznia:</label>
                            <input class="form-input" type="text" name="nazwisko_ucznia"><br>

                            <label class="form-label">Ocena:</label>
                            <input class="form-input" type="text" name="ocena"><br>

                            <label class="form-label">Przedmiot:</label>
                            <input class="form-input" type="text" name="przedmiot"><br>

                            <label class="form-label">Opis:</label>
                            <input class="form-input" type="text" name="opis"><br>

                            <input class="form-submit" type="submit" value="Dodaj ocenę">
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>


</div>



