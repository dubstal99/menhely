<?php

if (isset($_POST['kepfel'])) {

    $hibak = [];

    $mezok = [
        'cim',
    ];

    foreach ($mezok as $mezo) {
        if (!isset($_POST[$mezo]) || $_POST[$mezo] == "") {
            $hibak[$mezo][] = "Mező megadása kötelező";
        } else {
            $ertekek[$mezo] = $_POST[$mezo];

            if (strlen($ertekek[$mezo]) <= 2)
                $hibak[$mezo][] = "Minimum 3 karakter";

            if (strlen($ertekek[$mezo]) >= 100)
                $hibak[$mezo][] = "Maximum 100 karakter";
        }
    }

    $hely = "images/galeria/";
    $celfajl = $hely . basename($_FILES["kep"]["name"]);
    $fajlTipus = strtolower(pathinfo($celfajl, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $ellenorzes = getimagesize($_FILES["kep"]["tmp_name"]);
        if ($ellenorzes !== false) {
        } else {
            $hibak['kep'][] = "A file nem kép!";
        }
    }

    if ($fajlTipus != "jpg" && $fajlTipus != "png" && $fajlTipus != "jpeg") {
        $hibak['kep'][] = "Csak JPG, JPEG, PNG!";
    }

    if ($_FILES["kep"]["size"] > 500000) {
        $hibak['kep'][] = "A kép túl nagy méretű max 5mb!";
    }

    if (count($hibak) == 0) {
        $ujnev = $hely . $ertekek['cim'] . rand(1, 100) . "." . $fajlTipus;

        if (move_uploaded_file($_FILES["kep"]["tmp_name"],$ujnev )) {
            $allapot = array(
                'allapot' => 1,
                'uzenet' => "Kép sikeresen feltötve",
            );
        } else {
            $allapot = array(
                'allapot' => 0,
                'uzenet' => "Kép sikertelen feltöltés",
            );
        }


        $sqlGaleria = "insert into galeria(id, cim, url)
                          values(0, :cim , :url)";
        $stmt = $db->prepare($sqlGaleria);
        $stmt->execute(
            array(
                ':cim' => $ertekek['cim'],
                ':url' => $ujnev,
            )
        );

        if($stmt->rowCount()) {
            $newid = $db->lastInsertId();
            unset($ertekek);
            $allapot = array(
                'allapot' => 1,
                'uzenet' => "Sikeres kép feltötlés azonosito: $newid",
            );

        }
        else {
            $allapot = array(
                'allapot' => 0,
                'uzenet' => "A képfeltöltés sikertelen :(",
            );

        }


    }


}

?>