<?php
session_start();
if (isset($_SESSION['felhasznalo'])) {
    $belepve = 1;
} else {
    $belepve = 0;
}

?>
<!doctype html>
<html lang="hu">
<head>

    <title><?= (isset($keres['fent_cim'])) ? $keres['fent_cim'] : "Hiba" ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 col-sm-4 p-3">
            <img src="images/logo.jpg" alt="" style="max-width:80%">
        </div>
        <div class="col-8 col-sm-8 p-3 my-auto">
            <h1>Menhely az állatokért</h1>
            <a href="http://www.menhely.eu/" target="_blank">Eredeti oldal</a>
            <?php if(isset($_SESSION['felhasznalo'])){ ?>
                <p>
                    <?= $_SESSION['felhasznalo']['csaladi_nev'] ?>
                    <?= $_SESSION['felhasznalo']['uto_nev'] ?>
                    (<?= $_SESSION['felhasznalo']['fn_nev'] ?>)
                </p>
            <?php } ?>
        </div>
    </div>
</div>

<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <?php foreach ($oldalak as $url => $oldal) {
                    if ($oldal['latszik'][$belepve] == 1) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($oldal == $keres) ? 'active' : '' ?>"
                               href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                                <?= $oldal['szoveg'] ?>
                            </a>
                        </li>
                        <?php
                    }
                } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3">
    <div id="content">
        <h1><?= $keres['szoveg'] ?></h1>
        <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </div>
</div>

<div class="my-footer py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 my-auto">
                <?= $lablec['copyright'] ?> - <?= $lablec['ceg'] ?>
            </div>
            <div class="col-sm-6">
                <p>Közösségi média</p>
                <a class="footer-icon" href="https://www.facebook.com/MenhelyAzAllatokertAlapitvany" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
            </div>
        </div>
    </div>

</div>

</body>
</html>