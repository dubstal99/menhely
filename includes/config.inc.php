<?php

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
    'cim' => 'Mini honlap',
    'motto' => ''
);

$lablec = array(
    'copyright' => 'Copyright ' . date("Y") . '.',
    'ceg' => 'Menhely.eu'
);

$index = "index.php";


$alapAblakCim = "Menhely.eu";

$oldalak = array(
    '/' => array(
        'fajl' => 'fooldal',
        'szoveg' => 'Főoldal',
        'fent_cim' => 'Főoldal | '.$alapAblakCim,
        'latszik'=> array(1,1)
    ),
    'galeria' => array(
        'fajl' => 'galeria',
        'szoveg' => 'Galéria',
        'fent_cim' => 'Galéria | '.$alapAblakCim,
        'latszik'=> array(1,1)
    ),
    'bejelntkezes' => array(
        'fajl' => 'bejelntkezes',
        'szoveg' => 'Bejelentkezés',
        'fent_cim' => 'Bejelentkezés | '.$alapAblakCim,
        'latszik'=> array(1,0)
    ),
    'regisztracio' => array(
        'fajl' => 'regisztracio',
        'szoveg' => 'Regisztráció',
        'fent_cim' => 'Regisztráció | '.$alapAblakCim,
        'latszik'=> array(1,0)
    ),
    'regisztral' => array(
        'fajl' => 'regisztral',
        'szoveg' => 'Regisztráció',
        'fent_cim' => 'Regisztráció | '.$alapAblakCim,
        'latszik'=> array(0,0)
    ),
    'kilepes' => array(
        'fajl' => 'kilepes',
        'szoveg' => 'Kilépés',
        'fent_cim' => 'Kilépés | '.$alapAblakCim,
        'latszik'=> array(0,1)
    ),
);

$hiba_oldal = array(
    'fajl' => '404',
    'szoveg' => 'A keresett oldal nem található!'
);

try {
    $db = new PDO('mysql:host=localhost;dbname=menhely', 'root', '');
}catch (PDOException $e){
    die("Sikertelen kapcsolódás az adatbázishoz");
}



?>