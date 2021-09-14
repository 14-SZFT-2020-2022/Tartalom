<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Első feladat</title>
</head>
<body>
    <?php
        $adatTomb = array();
        $negativSzam = false;

        $myfile = fopen('szamok.txt', 'r') or die('Nem tudom megnyitni ezt az állományt');

        while (!feof($myfile)) {
            $ertek = fgets($myfile);
            array_push($adatTomb, $ertek);
            if ($ertek < 0) {
                $negativSzam = true;    
            }
        }

        fclose($myfile);
    ?>

    <p>1. Feladat. Hány eleme van a sorozatnak: <?php echo count($adatTomb)?></p>
    <p>2. Feladat. Van-e a sorozatban negatív szám: 
    <?php
        $foo = true;
        echo json_encode($foo);
        /*if ($negativSzam == true) echo 'Igaz';
        else echo 'Hamis';*/
    ?>
    </p>
</body>
</html>