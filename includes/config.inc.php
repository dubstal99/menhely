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
        'fent_cim' => 'Főoldal | '.$alapAblakCim
    ),
    'galeria' => array(
        'fajl' => 'galeria',
        'szoveg' => 'Galéria',
        'fent_cim' => 'Galéria | '.$alapAblakCim,
    ),
    'bejelntkezes' => array(
        'fajl' => 'bejelntkezes',
        'szoveg' => 'Bejelentkezés',
        'fent_cim' => 'Bejelentkezés | '.$alapAblakCim,
    ),
    'regisztracio' => array(
        'fajl' => 'regisztracio',
        'szoveg' => 'Regisztráció',
        'fent_cim' => 'Regisztráció | '.$alapAblakCim,
    ),
    'kilepes' => array(
        'fajl' => 'kilepes',
        'szoveg' => 'Kilépés',
        'fent_cim' => 'Kilépés | '.$alapAblakCim
    ),
);

$hiba_oldal = array(
    'fajl' => '404',
    'szoveg' => 'A keresett oldal nem található!'
);
?>