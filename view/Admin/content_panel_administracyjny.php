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
        margin-left:25vw;
        margin-top: 30px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .form-heading {
        text-align: center;
        margin-bottom: 20px;
    }

    .user-form {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        margin-bottom: 10px;
        font-weight: bold;
      
    }

    .form-select,
    .form-input {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: grey;
        color:white;
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
    option{
        background-color:white;
        color:black;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">CRUD Panel</h1><br>
                    <table>
                        <?php
                        $conn = new mysqli("localhost", "root", "", "dziennik");
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo "<table class='tabela'>";
                            echo "<tr><th>Imie</th><th>Nazwisko</th><th>Rola</th><th>Email</th><th>Numer Telefonu</th><th>Data Urodzenia</th><th>Akcje</th></tr>";
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["LastName"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";
                                echo "<td>" . $row["PhoneNumber"] . "</td>";
                                echo "<td>" . $row["Birthday"] . "</td>";
                                echo "<td><a href='CRUD operations/edit_user.php?id=" . $row["id"] . "'>Edytuj</a> | <a href='CRUD operations/delete_user.php?id=" . $row["id"] . "'>Usuń</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else
                        {
                            echo "Brak użytkowników w bazie danych";
                        }
                        ?>

                    </table><br>
                    <div class="form-container">
                        <h1 class="form-heading">Dodaj użytkownika</h1>

                        <form class="user-form" method="post" action="CRUD operations/insert_user.php">
                            <label class="form-label" for="role">Rola:</label>
                            <select class="form-select" name="role" id="role">
                                <option value="admin">Admin</option>
                                <option value="uczeń">Uczeń</option>
                                <option value="nauczyciel">Nauczyciel</option>
                            </select>
                            <br>

                            <label class="form-label" for="name">Imię:</label>
                            <input class="form-input" type="text" name="name" id="name" required>
                            <br>

                            <label class="form-label" for="lastname">Nazwisko:</label>
                            <input class="form-input" type="text" name="lastname" id="lastname" required>
                            <br>

                            <label class="form-label" for="email">Email:</label>
                            <input class="form-input" type="email" name="email" id="email" required>
                            <br>

                            <label class="form-label" for="password">Hasło:</label>
                            <input class="form-input" type="password" name="password" id="password" required>
                            <br>

                            <label class="form-label" for="phone">Numer telefonu:</label>
                            <input class="form-input" type="tel" name="phone" id="phone" required>
                            <br>

                            <label class="form-label" for="birthday">Data urodzenia:</label>
                            <input class="form-input" type="date" name="birthday" id="birthday" required>
                            <br>

                            <input class="form-submit" type="submit" value="Dodaj użytkownika">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>


