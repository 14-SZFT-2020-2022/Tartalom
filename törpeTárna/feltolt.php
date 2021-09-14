<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'torpetarna';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error) {
        die('Nem tudtam csatlakozni!' . $conn -> connect_error);
    }

    // echo 'Sikeresen csatlakoztam!';

    // 1. feladat: Az adatbázi létrehozása itt, feltöltése a localhostban a file-ok segítségével.
    /* $sql = "CREATE DATABASE `TorpeTarna` DEFAULT CHARACTER SET 'utf8' COLLATE utf8_hungarian_ci;";

    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött az adatbázis!';
    }
    else {
        echo 'Nem jött létre az adatbázis!' . $conn -> error;
    } */

    // 3. feladat: Idegen kulcsok feltöltése.
    /* $sql = 'ALTER TABLE `torpetarna`.`kihol`
            ADD FOREIGN KEY(`torpe_id`) REFERENCES `torpek`(`id`)';
    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött az idegen kulcs!';
    }
    else {
        echo 'Nem jött létre az idegen kulcs!' . $conn -> error;
    }

    $sql = 'ALTER TABLE `torpetarna`.`kihol`
            ADD FOREIGN KEY(`tarna_id`) REFERENCES `tarnak`(`id`)';
    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött az idegen kulcs!';
    }
    else {
        echo 'Nem jött létre az idegen kulcs!' . $conn -> error;
    }

    $sql = 'ALTER TABLE `torpetarna`.`tarnak`
            ADD FOREIGN KEY(`kozet_id`) REFERENCES `kozetek`(`id`)';
    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött az idegen kulcs!';
    }
    else {
        echo 'Nem jött létre az idegen kulcs!' . $conn -> error;
    } */

    // 8. feladat: Új törp
    // Ha az elsődleges kulcs AUTO_INCREMENT-re van állítva, akkor ez a szabályos 
    // feltöltés, azaz a táblák felsorolásánál nem írjuk be a nevét és VALUES-nél nem 
    // adunk neki értéket, mert 1-től kezdve automatikusan eggyel növeli, jelen esetben
    // 31-re.
    /* $sql = "INSERT INTO `torpek` (`nev`, `klan`, `nem`, `suly`, `magassag`) 
            VALUES ('Trad Morf', 'Vasököl', 'F', 69, 136)";
    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött az új törp!';
    }
    else {
        echo 'Nem jött létre az új törp!' . $conn -> error;
    } */

    // 9. feladat: Termelékenysége az új törpnek
    /* $sql = "INSERT INTO `kihol` (`torpe_id`, `tarna_id`, `kitermelt_mennyiseg`)
            VALUES (31, 1, 43),(31, 3, 28)";
    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött az új törp termelékenysége!';
    }
    else {
        echo 'Nem jött létre az új törp termelékenysége!' . $conn -> error;
    } */
?>