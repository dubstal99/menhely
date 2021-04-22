<?php
if (isset($_POST['belep'])) {
    include('././logika/belepes.php');
}
?>

<form action="" method="POST">

    <div class="row">

        <div class="form-group col-sm-6">
            <label for="">Email</label>
            <input type="text" name="email"
                <?php if (isset($ertekek['email'])) { ?>
                    value="<?= $ertekek['email'] ?>"
                <?php } ?>
                   class="form-control <?= (isset($hibak['email'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['email'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['email'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>

        <div class="form-group col-sm-6">
            <label for="">Jelszó</label>
            <input type="password" name="jelszo"
                <?php if (isset($ertekek['jelszo'])) { ?>
                    value="<?= $ertekek['jelszo'] ?>"
                <?php } ?>
                   class="form-control <?= (isset($hibak['jelszo'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['jelszo'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['jelszo'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>

        <div class="col-sm-12 mt-4">
            <button type="submit" name="belep" class="btn btn-primary btn-block">Bejelentkezés</button>
        </div>

        <?php if (isset($allapot)) { ?>
            <div class="mt-3 alert alert-<?= ($allapot['allapot'] == 1) ? 'success' : 'danger' ?>" role="alert">
                <?= $allapot['uzenet'] ?>
            </div>
        <?php } ?>

    </div>
</form>
