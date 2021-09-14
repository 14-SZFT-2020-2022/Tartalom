-- 1. feladat:

CREATE DATABASE `TorpeTarna` DEFAULT CHARACTER SET 'utf8' COLLATE utf8_hungarian_ci;

-- 3. feladat:

ALTER TABLE `kihol`
ADD FOREIGN KEY(`torpe_id`) REFERENCES `torpek`(`id`);

ALTER TABLE `kihol`
ADD FOREIGN KEY(`tarna_id`) REFERENCES `tarnak`(`id`); 

ALTER TABLE `tarnak`
ADD FOREIGN KEY(`kozet_id`) REFERENCES `kozetek`(`id`);

-- 4. feladat:

SELECT `nev` AS `Legmagasabb törpe neve`, `magassag` AS `Magassága` 
FROM `torpek`
WHERE `magassag` = (SELECT MAX(`magassag`) FROM `torpek`);

-- 5. feladat:

SELECT COUNT(DISTINCT `torpek`.`nev`) AS `Ennyi törpe dolgozott Gir Lodur-ban`
FROM (`torpek` INNER JOIN
	`kihol` ON `torpek`.`id` = `kihol`.`torpe_id`) INNER JOIN 
    	`tarnak` ON `kihol`.`tarna_id` = `tarnak`.`id`
WHERE `tarnak`.`nev` = 'Gir Lodur';

-- 6. feladat:

SELECT `tarnak`.`nev` AS `Bánya neve`, SUM(`kitermelt_mennyiseg`) AS `Kitermelt mennyiség`
FROM (`kozetek` INNER JOIN
	`tarnak` ON `kozetek`.`id` = `tarnak`.`kozet_id`) INNER JOIN
    	`kihol` ON `tarnak`.`id` = `kihol`.`tarna_id`
WHERE `kozetek`.`nev` = 'arany'
GROUP BY `Bánya neve`
ORDER BY `Kitermelt mennyiség` DESC;

-- 7. feladat:

SELECT `torpek`.`nev` AS `Sarsi Duri jelöltje`, SUM(`kihol`.`kitermelt_mennyiseg`) AS `Kitermelt mennyiség`
FROM `torpek` INNER JOIN `kihol` ON `torpek`.`id` = `kihol`.`torpe_id`
WHERE `torpek`.`klan` = 'Vasököl' AND `torpek`.`nem` = 'N'
GROUP BY `Sarsi Duri jelöltje`
ORDER BY `Kitermelt mennyiség` DESC
LIMIT 1;

-- 8. feladat:

INSERT INTO `torpek` (`nev`, `klan`, `nem`, `suly`, `magassag`) 
VALUES ('Trad Morf', 'Vasököl', 'F', 69, 136);

-- 9. feladat:

INSERT INTO `kihol` (`torpe_id`, `tarna_id`, `kitermelt_mennyiseg`)
VALUES (31, 1, 43),(31, 3, 28);

-- +5. feladat:

SELECT `klan` AS `Klán neve`, COUNT(`id`) AS `Klán tagjainak száma`
FROM `torpek`
GROUP BY `Klán neve`;

SELECT `klan` AS `Klán neve`, COUNT(`id`) AS `Klán tagjainak száma`, 
(SELECT COUNT(`id`) FROM `torpek` WHERE `nem` = 'N' AND `klan` = `Klán neve`) AS `Klán női tagjainak száma`,
(SELECT COUNT(`id`) FROM `torpek` WHERE `nem` = 'F' AND `klan` = `Klán neve`) AS `Klán férfi tagjainak száma`
FROM `torpek`
GROUP BY `Klán neve`;

-- +6. feladat:

SELECT `torpek`.`nev` AS `Törp neve`, SUM(`kihol`.`kitermelt_mennyiseg`) AS `Kitermelt mennyisége`
FROM `torpek`
INNER JOIN `kihol` ON `torpek`.`id` = `kihol`.`torpe_id`
WHERE `torpek`.`klan` = 'Acél'
GROUP BY `Törp neve`
ORDER BY `Kitermelt mennyisége` DESC;

-- +8. feladat: 

SELECT `torpek`.`klan` AS `Klán neve`, SUM(`kihol`.`kitermelt_mennyiseg`) AS `Kitermelt mennyisége`
FROM `torpek`
INNER JOIN `kihol` ON `torpek`.`id` = `kihol`.`torpe_id`
GROUP BY `Klán neve`
ORDER BY `Kitermelt mennyisége` DESC;