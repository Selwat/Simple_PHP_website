<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Wszyscy użytkownicy</h1>
                        <table>
                            <?php
                                $conn = new mysqli("localhost", "root", "", "dziennik");
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo "<table>";
                                    echo "<tr><th>Imie</th><th>Nazwisko</th><th>Rola</th><th>Email</th><th>Numer Telefonu</th><th>Data Urodzenia</th></tr>";
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["Name"] . "</td>";
                                        echo "<td>" . $row["LastName"] . "</td>";
                                        echo "<td>" . $row["role"] . "</td>";
                                        echo "<td>" . $row["Email"] . "</td>";
                                        echo "<td>" . $row["PhoneNumber"] . "</td>";
                                        echo "<td>" . $row["Birthday"] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                else
                                {
                                    echo "Brak użytkowników w bazie danych";
                                }
                            ?>
                        </table>
                    <h1 class="m-0">Wyszukaj użytkownika</h1>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $firstName = $_POST["Name"];
                        $lastName = $_POST["LastName"];

                        $conn = new mysqli("localhost", "root", "", "dziennik");
                        $sql = "SELECT * FROM users WHERE Name = '$firstName' AND LastName = '$lastName'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<tr><th>Imie</th><th>Nazwisko</th><th>Rola</th><th>Email</th><th>Numer Telefonu</th><th>Data Urodzenia</th></tr>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["LastName"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";
                                echo "<td>" . $row["PhoneNumber"] . "</td>";
                                echo "<td>" . $row["Birthday"] . "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "Brak użytkownika o podanym imieniu i nazwisku w bazie danych. <br>";
                        }
                    }
                    ?>

                    <table>
                        <form method="post">
                            <input type="text" name="Name" placeholder="Podaj imię"><br><br>
                            <input type="text" name="LastName" placeholder="Podaj nazwisko"><br><br>
                            <input type="submit" value="Wyszukaj Użytkownika">
                        </form>
                    </table>

                </div>
            </div>
        </div>
    </div>


</div>


