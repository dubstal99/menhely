<?php
if (isset($_POST['regi'])) {
    include('././logika/regisztral.php');
}
?>
<form action="" method="POST">

    <div class="row">

        <div class="form-group col-sm-6">
            <label for="">Családi név</label>
            <input type="text" name="csaladi_nev"
                <?php if (isset($ertekek['csaladi_nev'])) { ?>
                    value="<?= $ertekek['csaladi_nev'] ?>"
                <?php } ?>
                   class="form-control <?= (isset($hibak['csaladi_nev'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['csaladi_nev'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['csaladi_nev'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>

        <div class="form-group col-sm-6">
            <label for="">Utónév</label>
            <input type="text" name="uto_nev"
                <?php if (isset($ertekek['uto_nev'])) { ?>
                    value="<?= $ertekek['uto_nev'] ?>"
                <?php } ?>
                   class="form-control <?= (isset($hibak['uto_nev'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['uto_nev'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['uto_nev'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>


        <div class="form-group col-sm-6">
            <label for="">Felhasználónév</label>
            <input type="text" name="fn_nev"
                <?php if (isset($ertekek['fn_nev'])) { ?>
                    value="<?= $ertekek['fn_nev'] ?>"
                <?php } ?>
                   class="form-control <?= (isset($hibak['fn_nev'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['fn_nev'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['fn_nev'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>


        <div class="form-group col-sm-6">
            <label for="">Email</label>
            <input type="email" name="email"
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
                   class="form-control <?= (isset($hibak['jelszo'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['jelszo'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['jelszo'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>

        <div class="form-group col-sm-6">
            <label for="">Jelszó újra</label>
            <input type="password" name="jelszo1"
                   class="form-control <?= (isset($hibak['jelszo1'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['jelszo1'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['jelszo1'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>


        <div class="col-sm-12 mt-4">
            <button type="submit" name="regi" class="btn btn-primary btn-block">Regisztráció</button>
        </div>
    </div>

    <?php if (isset($allapot)) { ?>
        <div class="mt-3 alert alert-<?= ($allapot['allapot'] == 1) ? 'success' : 'danger' ?>" role="alert">
            <?= $allapot['uzenet'] ?>
        </div>
    <?php } ?>


</form>