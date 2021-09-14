<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adatbázis</title>
</head>
<body>
    <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';

        /*$conn = new mysqli($servername, $username, $password);

        if ($conn -> connect_error) {
            die('Nincs kapcsolat!' . $conn -> connect_error);
        }

        $sql = 'CREATE DATABASE `tagdij`';

        if ($conn -> query($sql) === TRUE) {
            echo 'Létrejött az adatbázis';
        }
        else {
            echo 'Már létezik ilyen adatbázis!';
        }*/
        $dbname = 'katica';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn -> connect_error) {
            die('Nincs kapcsolat' . $conn -> connect_error);
        }

        $sql = 'SELECT `termek` AS `Termék megnevezése` FROM `forgalom`';
        $result = $conn -> query($sql);
        $mezoNev = $result -> fetch_field();
        echo $mezoNev -> name;

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                
            }
        }
        else {
            echo '0 találat.';
        }

        $conn -> close();
    ?>
</body>
</html>