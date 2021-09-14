<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Balkezesek</title>
    <link rel='stylesheet' type='text/css' href='stilus.css' />
</head>
<body>
    <?php
        $myfile = fopen('balkezesek.txt', 'r') or die('Nem találom ezt az állományt!');
        
        $adatTomb = array();
        $kiir = '<table>';

        $elsoSor = fgets($myfile);
        $elsoTomb = explode(';', $elsoSor);

        $kiir .= '<tr>';
        for ($i = 0; $i < count($elsoTomb); $i++) {
            $kiir .= '<th>' . $elsoTomb[$i] . '</th>';
        }
        $kiir .= '</tr>';

        while (!feof($myfile)) {
            $sor = fgets($myfile);
            $tomb = explode(';', $sor);
            array_push($adatTomb, $tomb);
            $kiir .= '<tr>';
            for ($i = 0; $i < count($tomb); $i++) {
                $kiir .= '<td>' . $tomb[$i] . '</td>';
            }
            $kiir .= '</tr>';
        }

        $kiir .= '</table>';

        /* echo $kiir; */
        echo '<p>3. Feladat: ' . count($adatTomb) . '</p>';

        fclose($myfile);
    ?>

    <p>4. Feladat: </p>
    <?php
        $kiir1 = '<table>';

        for ($i = 0; $i < count($adatTomb); $i++) {
            if (substr($adatTomb[$i][2], 0, 7) == '1999-10') {
                $kiir1 .= '<tr>';
                $kiir1 .= '<td>' . $adatTomb[$i][0] . '</td>';
                $kiir1 .= '<td style="text-align:right;">' . (int)$adatTomb[$i][4] * 2.54 . ' cm</td>';
                $kiir1 .= '</tr>';
            }
        }
            
        $kiir1 .= '</table>';
        
        echo $kiir1;
    ?>

    <p>5. Feladat:</p>
    <form method='post' action='<?php echo $_SERVER["PHP_SELF"];?>'>
        <spam>Kérek egy 1990 és  1999 közötti évszámot: <spam>
        <input type='number' name='esztendo' min='1990' max='1999' />
        <button type='submit'>Elküld</button>
    </form>

    <?php
        $esztendo = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $esztendo = $_POST['esztendo'];
        }

        $osszTomeg = 0;
        $darab = 0; 
        for ($i = 0; $i < count($adatTomb); $i++) {
            $kezd = (int)substr($adatTomb[$i][1], 0, 4);
            $veg = (int)substr($adatTomb[$i][2], 0, 4);
            if ($kezd <= $esztendo && $esztendo <= $veg) {
                $osszTomeg += (int)$adatTomb[$i][3];
                $darab++;
            }
        }  
        if ($darab == 0) {
            echo '<p>6. Feladat: </p>';
        }
        else {
            echo '<p>6. Feladat: ' . round($osszTomeg / $darab, 2) . ' font</p>';
        }
          
    ?>
</body>
</html>