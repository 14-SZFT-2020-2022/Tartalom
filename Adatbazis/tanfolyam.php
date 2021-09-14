<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <title>Tanfolyam</title>
    <link rel='stylesheet' type='text/css' href='stilus.css' />
</head>
<body>
    <?php
        require_once('letrehozas.php');

        $sql = 'SELECT `megnevezes` AS `Megnevezés`, `tanar` AS `Tanár` FROM `tantargyak`';
        $result = $conn -> query($sql);
        
        $kiir = '<table><tr>';
        while ($mezonev = $result -> fetch_field()) {
            $kiir .= '<th>' . $mezonev -> name . '</th>';
        }

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $kiir .= '<tr><td>' . $row["Megnevezés"] . '</td>';
                $kiir .= '<td>' . $row["Tanár"] . '</td></tr>';    
            }
        }
        $kiir .= '</tr></table><br />';

        echo $kiir;

        $sql = 'SELECT `nev` AS `Név`, 
                       `telefonszam` AS `Telefonszám`,
                       `szuletesiido` AS `Születési idő`,
                       `email` AS `E-mail` FROM `tanulok`';
        $result = $conn -> query($sql);
        
        $kiir1 = '<table><tr>';
        while ($mezonev = $result -> fetch_field()) {
            $kiir1 .= '<th>' . $mezonev -> name . '</th>';
        }

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $kiir1 .= '<tr><td>' . $row["Név"] . '</td>';
                $kiir1 .= '<td>' . $row["Telefonszám"] . '</td>';
                $kiir1 .= '<td>' . $row["Születési idő"] . '</td>';
                $kiir1 .= '<td>' . $row["E-mail"] . '</td></tr>';    
            }
        }
        $kiir1 .= '</tr></table><br />';

        echo $kiir1;
    ?>
</body>
</html>