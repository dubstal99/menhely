<?php
if (isset($_POST['belep'])) {
    $hibak = [];
    $ertekek = [];

    $mezok = [
        'jelszo',
        'email',
    ];

    foreach ($mezok as $mezo) {
        if (!isset($_POST[$mezo]) || $_POST[$mezo] == "") {
            $hibak[$mezo][] = "Mező megadása kötelező";
        } else {
            $ertekek[$mezo] = $_POST[$mezo];
        }
    }

    if (count($hibak) == 0) {
        $sqlSelect = "select * from felhasznalok where email = :email and jelszo = sha1(:jelszo)";
        $sth = $db->prepare($sqlSelect);
        $sth->execute(array(':email' => $ertekek['email'], ':jelszo' => $ertekek['jelszo']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if ($row) {

            $_SESSION['felhasznalo'] = array(
                'csaladi_nev' => $row['csaladi_nev'],
                'uto_nev' => $row['uto_nev'],
                'fn_nev' => $row['fn_nev'],
                'email' => $row['email'],
            );

            header("Location: .");

        } else {
            $allapot = array(
                'allapot' => 0,
                'uzenet' => "Nincs ilyen felhasználó",
            );
        }
    }
}
?>