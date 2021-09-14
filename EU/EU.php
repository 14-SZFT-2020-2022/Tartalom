<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <title>EU csatlakozás</title>
    <link rel='stylesheet' type='text/css' href='stilus.css' />
</head>
<body>
    <?php
        $adatTomb = array();
        $myfile = fopen('EUcsatlakozas.txt', 'r') or die('Nem találom az állományt!');
        $kiir = '';

        while (!feof($myfile)) {
            $row = fgets($myfile);
            $tomb = explode(';', $row);
            array_push($adatTomb, $tomb);
        }

        fclose($myfile);
    ?>

    <p>3. feladat: EU tagállamainak száma: <?php echo count($adatTomb)?> db</p>

    <?php
        $kettoezerHet = 0;
        for ($i = 0; $i < count($adatTomb); $i++) {
            if (substr($adatTomb[$i][1], 0, 4) === '2007') {
                $kettoezerHet++;
            }
        }
    ?>

    <p>4. feladat: 2007-ben <?php echo $kettoezerHet?> ország csatlakozott.</p>

    <?php
        $magyar = '';
        for ($i = 0; $i < count($adatTomb); $i++) {
            if ($adatTomb[$i][0] === 'Magyarország') {
                $magyar = $adatTomb[$i][1];
            }
        }
    ?>

    <p>5. feladat: Magyarország csatlakozásának dátuma: <?php echo $magyar?></p>

    <?php
        $majusban = FALSE;
        for ($i = 0; $i < count($adatTomb); $i++) {
            if (substr($adatTomb[$i][1], 5, 2) === '05') {
                $majusban = TRUE;
            }
        }

        if ($majusban) {
            echo '6. feladat: Májusban volt csatlakozás!';
        }
        else {
            echo '6. feladat: Májusban nem volt csatlakozás!';
        }

        $datum = '1900.01.01';
        $legutolso = '';

        for ($i = 0; $i < count($adatTomb); $i++) {
            // Lexikografikus rendezés!
            if ($adatTomb[$i][1] > $datum) {
                $legutolso = $adatTomb[$i][0];
                $datum = $adatTomb[$i][1];
            }
        }
    ?>

    <p>7. feladat: Legutoljára csatlakozott ország: <?php echo $legutolso?></p>

    <?php
        $statisztika = array();
        
        for ($i = 0; $i < count($adatTomb); $i++) {
            $ertek = TRUE;
            foreach ($statisztika as $key => $value) {
                if ($key === (int)substr($adatTomb[$i][1], 0, 4)) {
                    $statisztika[substr($adatTomb[$i][1], 0, 4)] = $value + 1;
                    $ertek = FALSE;
                }
            }

            if ($ertek) {
                $statisztika[substr($adatTomb[$i][1], 0, 4)] = 1;
            }           
        }

        echo '8. feladat: Statisztika';
        $kiir = '';

        foreach ($statisztika as $key => $value) {
            $kiir .= '<p>' . $key . ' - ' . $value . ' ország</p>';
        }

        echo $kiir;
    ?>
</body>
</html>