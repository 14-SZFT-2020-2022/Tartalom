<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <title>Katica</title>
    <link rel='stylesheet' type='text/css' href='./stilus.css' />
</head>
<body>
    <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'katica';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn -> connect_error) {
            die('Nem sikerült a csatlakozás az adatbázishoz!' . $conn -> connect_error);
        }

        // echo 'Sikerült a csatlakozás az adatbázishoz!';

        $sql = 'SELECT `id` AS `ID`,
                    `termek` AS `Termék neve`,
                    `vevo` AS `Vevő`,
                    `kategoriaId` AS `Kategória id`,
                    `egyseg` AS `Egység`,
                    `nettoar` AS `Nettó ár`,
                    `mennyiseg` AS `Mennyiség`,
                    `kiadva` AS `Kiadva` FROM `forgalom`';
        $result = $conn -> query($sql);

        $kiir = '<table>';
        $kiir .= '<tr>';
        while ($mezonev = $result -> fetch_field()) {
            $kiir .= '<th>' . $mezonev -> name . '</th>';
        }      
        $kiir .= '</tr>';

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $kiir .= '<tr><td>' . $row["ID"] . '</td>';
                $kiir .= '<td>' . $row["Termék neve"] . '</td>';
                $kiir .= '<td>' . $row["Vevő"] . '</td>';
                $kiir .= '<td>' . $row["Kategória id"] . '</td>';
                $kiir .= '<td>' . $row["Egység"] . '</td>';
                $kiir .= '<td>' . $row["Nettó ár"] . '</td>';
                $kiir .= '<td>' . $row["Mennyiség"] . '</td>';
                $kiir .= '<td>' . $row["Kiadva"] . '</td></tr>';
            }
        }


        $kiir .= '</table>';

        echo $kiir;
    ?>
</body>
</html>