<?php

if(isset($_POST['kapcs'])){

    $hibak = [];
    $ertekek = [];

    $mezok = [
        'email',
        'nev',
        'uzenet'
    ];

    foreach ($mezok as $mezo) {
        if (!isset($_POST[$mezo]) || $_POST[$mezo] == "") {
            $hibak[$mezo][] = "Mező megadása kötelező";
        } else {
            $ertekek[$mezo] = $_POST[$mezo];

            if (strlen($ertekek[$mezo]) <= 2)
                $hibak[$mezo][] = "Minimum 3 karakter";

            if (strlen($ertekek[$mezo]) >= 200)
                $hibak[$mezo][] = "Maximum 200 karakter";
        }
    }

    if(count($hibak)==0){
        $sqlKapcs = "insert into kapcsolat(id, email, nev, uzenet)
                          values(0, :email , :nev, :uzenet)";
        $stmt = $db->prepare($sqlKapcs);
        $stmt->execute(
            array(
                ':email' => $ertekek['email'],
                ':nev' => $ertekek['nev'],
                ':uzenet' => $ertekek['uzenet']
                )
        );

        if($stmt->rowCount()) {
            $newid = $db->lastInsertId();
            unset($ertekek);
            $allapot = array(
                'allapot' => 1,
                'uzenet' => "Kapcsolatfelvétel sikeres. Azonosítója: $newid",
            );

        }
        else {
            $allapot = array(
                'allapot' => 0,
                'uzenet' => "A kapcsolatfelvéátel sikertelen :(",
            );

        }
    }

}

?>