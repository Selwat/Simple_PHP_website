<style>
    .tabela {
        margin-top: 10vh;
        width: 50vw;
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
        padding-left:30px;
    }
    .tabela2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top:4vw;
        max-width: 400px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .tabela2 h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .tabela2 form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .tabela2 input[type="text"], .tabela2 input[type="submit"] {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        width: 100%;
    }

    .tabela2 input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    .tabela2 input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .col-sm-6 {
        display: flex;
        flex-direction: column;
        align-items: center;

    }
    

</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <h1 class="m-0">Wszyscy użytkownicy</h1>
                <div class="col-sm-6">
                    
                        <table>
                            <?php
                                $conn = new mysqli("localhost", "root", "", "dziennik");
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo "<table class='tabela'>";
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

                    <div class="tabela2">
                        <h1>Wyszukaj użytkownika</h1>
                        <form method="post">
                            <input type="text" name="Name" placeholder="Podaj imię"><br><br>
                            <input type="text" name="LastName" placeholder="Podaj nazwisko"><br><br>
                            <input type="submit" value="Wyszukaj Użytkownika">
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>


</div>


