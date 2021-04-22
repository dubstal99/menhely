<?php
if (isset($_POST['regi'])) {

    $hibak = [];
    $ertekek = [];

    $mezok = [
        'csaladi_nev',
        'uto_nev',
        'fn_nev',
        'jelszo',
        'jelszo1',
        'email',
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

    if (count($hibak) == 0) {
        $email_lekeres = "select id from felhasznalok where email = :email";
        $sth = $db->prepare($email_lekeres);
        $sth->execute(array(':email' => $ertekek['email']));
        if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $hibak['email'][] = "Az email már foglalt";
        }

        $nev_lekeres = "select id from felhasznalok where fn_nev = :fn_nev";
        $sth = $db->prepare($nev_lekeres);
        $sth->execute(array(':fn_nev' => $ertekek['fn_nev']));
        if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $hibak['fn_nev'][] = "Az név már foglalt";
        }

        if($ertekek['jelszo'] != $ertekek['jelszo1']){
            $hibak['jelszo1'][] = "A két jelszó nem eggyezik meg!";
        }
    }

    if (count($hibak) == 0) {
        $sqlRegi = "insert into felhasznalok(id, csaladi_nev, uto_nev, fn_nev, jelszo,email)
                          values(0, :csaladi_nev, :uto_nev, :fn_nev, :jelszo , :email)";
        $stmt = $db->prepare($sqlRegi);
        $stmt->execute(
            array(
                ':csaladi_nev' => $ertekek['csaladi_nev'],
                ':uto_nev' => $ertekek['uto_nev'],
                ':fn_nev' => $ertekek['fn_nev'],
                ':email' => $ertekek['email'],
                ':jelszo' => sha1($ertekek['jelszo']
                ))
        );

        if($stmt->rowCount()) {
            $newid = $db->lastInsertId();
            $allapot = array(
                'allapot' => 1,
                'uzenet' => "A regisztrációja sikeres. Azonosítója: $newid",
            );

        }
        else {
            $allapot = array(
                'allapot' => 0,
                'uzenet' => "A regisztrációja sikertelen :(",
            );

        }
    }


}

?>