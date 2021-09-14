<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <title>Törpe tárna</title>
    <!-- A href azért ilyen alakú, mert a következő tanévben a webfejlesztés órákon
        így fogjuk, használni, bizonyos megfontolásokból. Itt a ./-jelöli azt, hogy
        a mögötte álló file, ugyanabban a mappában van mint a torpeTarna.php. -->
    <link rel='stylesheet' type='text/css' href='./stilus.css' />
</head>
<body>
    <p>4. Feladat: </p>
    <?php
        require_once('feltolt.php');

        $sql = 'SELECT `nev` AS `Legmagasabb törpe neve`, `magassag` AS `Magassága` 
                FROM `torpek`
                WHERE `magassag` = (SELECT MAX(`magassag`) FROM `torpek`)';
        $result = $conn -> query($sql);

        $kiir = '<table><tr>';
        while ($mezonev = $result -> fetch_field()) {
            $kiir .= '<th>' . $mezonev -> name . '</th>';
        }
        $kiir .= '</tr>';

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $kiir .= '<tr><td>' . $row["Legmagasabb törpe neve"] . '</td>';
                $kiir .= '<td>' . $row["Magassága"] . 'cm</td></tr>';
            }
        }

        $kiir .= '</table>';
        echo $kiir;
    ?>

    <p>5. Feladat: </p>
    <?php
        $sql = "SELECT COUNT(DISTINCT `torpek`.`nev`) AS `Ennyi törpe dolgozott Gir Lodur-ban`
                FROM (`torpek` INNER JOIN
                    `kihol` ON `torpek`.`id` = `kihol`.`torpe_id`) INNER JOIN 
                        `tarnak` ON `kihol`.`tarna_id` = `tarnak`.`id`
                WHERE `tarnak`.`nev` = 'Gir Lodur'";
        $result = $conn -> query($sql);

        $kiir = '<table><tr>';
        while ($mezonev = $result -> fetch_field()) {
            $kiir .= '<th>' . $mezonev -> name . '</th>';
        }
        $kiir .= '</tr>';

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $kiir .= '<tr><td>' . $row["Ennyi törpe dolgozott Gir Lodur-ban"] . '</td></tr>';
            }
        }

        $kiir .= '</table>';
        echo $kiir;
    ?>

    <p>6. Feladat: </p>
    <?php
        $sql = "SELECT `tarnak`.`nev` AS `Bánya neve`, SUM(`kitermelt_mennyiseg`) AS `Kitermelt mennyiség`
                FROM (`kozetek` INNER JOIN
                    `tarnak` ON `kozetek`.`id` = `tarnak`.`kozet_id`) INNER JOIN
                        `kihol` ON `tarnak`.`id` = `kihol`.`tarna_id`
                WHERE `kozetek`.`nev` = 'arany'
                GROUP BY `Bánya neve`
                ORDER BY `Kitermelt mennyiség` DESC";
        $result = $conn -> query($sql);

        $kiir = '<table><tr>';
        while ($mezonev = $result -> fetch_field()) {
            $kiir .= '<th>' . $mezonev -> name . '</th>';
        }
        $kiir .= '</tr>';

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $kiir .= '<tr><td>' . $row["Bánya neve"] . '</td>';
                $kiir .= '<td>' . $row["Kitermelt mennyiség"] . '</td></tr>';
            }
        }

        $kiir .= '</table>';
        echo $kiir;
    ?>

    <p>7. Feladat: </p>
    <?php
        $sql = "SELECT `torpek`.`nev` AS `Sarsi Duri jelöltje`, SUM(`kihol`.`kitermelt_mennyiseg`) AS `Kitermelt mennyiség`
                FROM `torpek` INNER JOIN `kihol` ON `torpek`.`id` = `kihol`.`torpe_id`
                WHERE `torpek`.`klan` = 'Vasököl' AND `torpek`.`nem` = 'N'
                GROUP BY `Sarsi Duri jelöltje`
                ORDER BY `Kitermelt mennyiség` DESC
                LIMIT 1";
        $result = $conn -> query($sql);

        $kiir = '<table><tr>';
        while ($mezonev = $result -> fetch_field()) {
            $kiir .= '<th>' . $mezonev -> name . '</th>';
        }
        $kiir .= '</tr>';

        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $kiir .= '<tr><td>' . $row["Sarsi Duri jelöltje"] . '</td>';
                $kiir .= '<td>' . $row["Kitermelt mennyiség"] . '</td></tr>';
            }
        }

        $kiir .= '</table>';
        echo $kiir;

        // Ez sajnos néha nálam is lemarad.
        $conn -> close();
    ?>
</body>
</html>