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
                            echo "<table>";
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
                        <h1 class="m-0">Dodaj uzytkownika</h1>
                    <form method="post" action="CRUD operations/insert_user.php">
                        <label for="role">Rola:</label>
                        <select name="role" id="role">
                            <option value="admin">Admin</option>
                            <option value="uczeń">Uczeń</option>
                            <option value="nauczyciel">Nauczyciel</option>
                        </select>
                        <br><br>
                        <label for="name">Imię:</label>
                        <input type="text" name="name" id="name" required>
                        <br><br>
                        <label for="lastname">Nazwisko:</label>
                        <input type="text" name="lastname" id="lastname" required>
                        <br><br>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required>
                        <br><br>
                        <label for="password">Hasło:</label>
                        <input type="password" name="password" id="password" required>
                        <br><br>
                        <label for="phone">Numer telefonu:</label>
                        <input type="tel" name="phone" id="phone" required>
                        <br><br>
                        <label for="birthday">Data urodzenia:</label>
                        <input type="date" name="birthday" id="birthday" required>
                        <br><br>
                        <input type="submit" value="Dodaj użytkownika">
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


