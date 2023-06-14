<?php
    session_start();
    function protection_sql_injection($input){
        $input = htmlspecialchars(addslashes(trim($input)));
        return $input;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fields_required = ["Imie", "Nazwisko", "Email", "PotwierdźEmail", "Hasło", "PotwierdźHasło", "DataUrodzenia", "NumerTelefonu"];
        $errors = [];
        foreach ($fields_required as $value){
            if (empty($_POST[$value])){
                $errors[] = "Pole <b>$value</b> jest wymagane";
            }
        }

        if ($_POST["Email"] != $_POST["PotwierdźEmail"]) {
            $errors[] = "Adresy email muszą być identyczne";
        }

        if ($_POST["Hasło"] != $_POST["PotwierdźHasło"]) {
            $errors[] = "Hasła muszą być identyczne";
        }

        if (!isset($_POST["Term"]))
            $errors[] = "Zatwierdź regulamin";

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>])(?!.*\s).{4,}$/', $_POST["Hasło"])) {
            $errors[] = "Hasło nie spełnia wymagań";
        }

        if (!empty($errors)) {
            $_SESSION["bledy"] = implode("<br>", $errors);
            echo "<script>history.back();</script>";
        }
        else
        {
            $Email =  filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);

            foreach ($_POST as $key => $value){
                if ($key != "Hasło" && $key != "PotwierdźHasło" && $key != "Term" && $key != "DataUrodzenia")
                    $$key = protection_sql_injection($value);
            }

            $password_hash = password_hash($_POST["Hasło"], PASSWORD_ARGON2I);
            $rola="uczeń";

            $newDate = date("Y-m-d", strtotime($_POST["DataUrodzenia"]));

            require_once "./db_conn.php";

            $sql = 'INSERT INTO `users` (`role`, `Name`, `LastName`, `Email`, `Password`, `PhoneNumber`,`Birthday`) VALUES (:role, :name, :lastname, :email, :password, :phonenumber, :birthday);';

            $sth = $dbh->prepare($sql);

            $sth->bindParam(':role', $rola, PDO::PARAM_STR);
            $sth->bindParam(':name', $Imie, PDO::PARAM_STR);
            $sth->bindParam(':lastname', $Nazwisko, PDO::PARAM_STR);
            $sth->bindParam(':email', $Email, PDO::PARAM_STR);
            $sth->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $sth->bindParam(':phonenumber', $NumerTelefonu, PDO::PARAM_STR);
            $sth->bindParam(':birthday', $newDate, PDO::PARAM_STR);

            try {
                $sth->execute();
                if ($sth->rowCount() == 1){
                    $_SESSION["sukces"] = "Prawidłowo dodano użytkownika $_POST[Imie] $_POST[Nazwisko]";
                }
                header("location: ../view");
                exit();

            }catch (PDOException $e){

                $_SESSION["bledy"] = "Nie dodano użytkownika: ".$e->errorInfo[2];
                echo "<script>history.back();</script>";

            }
        }

    }



