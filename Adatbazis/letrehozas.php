<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'tanfolyamka';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error) {
        die('Nem jött létre a kapcsolódás!' . $conn -> connect_error);
    }

    // echo 'Létrejött a kapcsolódás!';

    /* $sql = "CREATE DATABASE `Tanfolyamka` DEFAULT CHARACTER SET 'utf8' COLLATE utf8_hungarian_ci";

    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött jött az adatbázis!';
    }
    else {
        echo 'Nem jött létre az adatbázis!' . $conn -> error; 
    } */

    /* $sql = 'CREATE TABLE `tanulok` (
        `id` INT(11) AUTO_INCREMENT,
        `nev` VARCHAR(100) NOT NULL,
        `telefonszam` VARCHAR(20),
        `szuletesiido` DATE NOT NULL,
        `email` VARCHAR(100) NOT NULL UNIQUE,
        PRIMARY KEY(`id`)
    )';

    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött a tanulok tábla!';
    }
    else {
        echo 'Nem jött létre a tanulok tábla!' . $conn -> error; 
    }

    $sql = 'CREATE TABLE `tantargyak` (
        `id` INT(11) AUTO_INCREMENT,
        `megnevezes` VARCHAR(100) NOT NULL UNIQUE,
        `tanar` VARCHAR(100) NOT NULL,
        PRIMARY KEY(`id`)
    )';

    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött a tantargyak tábla!';
    }
    else {
        echo 'Nem jött létre a tantargyak tábla!' . $conn -> error; 
    }

    $sql = 'CREATE TABLE `ertekelesek` (
        `id` INT(11) AUTO_INCREMENT,
        `tanuloid` INT(11) NOT NULL,
        `tantargyid` INT(11) NOT NULL,
        `jegy` INT(11) NOT NULL,
        PRIMARY KEY(`id`),
        FOREIGN KEY(`tanuloid`) REFERENCES `tanulok`(`id`),
        FOREIGN KEY(`tantargyid`) REFERENCES `tantargyak`(`id`)
    )';

    if ($conn -> query($sql) === TRUE) {
        echo 'Létrejött a eredmenyek tábla!';
    }
    else {
        echo 'Nem jött létre a eredmenyek tábla!' . $conn -> error; 
    } */

    /* $sql = "INSERT INTO `tantargyak` (`megnevezes`,`tanar`) VALUES ('Angol nyelv','Nemes Angéla'), ('Informatika','Kis Ede')";

    if ($conn -> query($sql) === TRUE) {
        echo 'Feltöltődött a tantargyak tábla!';
    }
    else {
        echo 'Nem töltődött fel a tantargyak tábla!' . $conn -> error; 
    }

    $sql = "INSERT INTO `tanulok` (`nev`,`telefonszam`,`szuletesiido`,`email`) VALUES 
    ('Kovács Elek', '', '1991-02-28','elek0228@email.com'),
    ('Nagy Béla', '+36-55-335223', '1999-12-31','nagy.bela@drotposta.com'),
    ('Tóth Emil', '+36-55-475319', '1987-06-16','emil@e-level.com')";

    if ($conn -> query($sql) === TRUE) {
        echo 'Feltöltődött a tanulok tábla!';
    }
    else {
        echo 'Nem töltődött fel a tanulok tábla!' . $conn -> error; 
    }

    $sql = 'INSERT INTO `ertekelesek` (`tanuloid`,`tantargyid`,`jegy`) VALUES
    (1,1,3),
    (1,2,5),
    (2,2,5),
    (3,2,5),
    (1,1,5)';

    if ($conn -> query($sql) === TRUE) {
        echo 'Feltöltődött az eredmenyek tábla!';
    }
    else {
        echo 'Nem töltődött fel az eredmenyek tábla!' . $conn -> error; 
    } */

?>