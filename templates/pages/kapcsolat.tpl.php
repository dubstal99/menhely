<?php
if (isset($_POST['kapcs'])) {
    include('././logika/kapcs.php');
}
?>
<h2>Vegye fel velünk a kapcsolatot!</h2>
<form action="" method="POST">
    <div class="row">
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
            <label for="">Teljes név</label>
            <input type="text" name="nev"
                <?php if (isset($ertekek['nev'])) { ?>
                    value="<?= $ertekek['nev'] ?>"
                <?php } ?>
                   class="form-control <?= (isset($hibak['nev'])) ? 'is-invalid' : '' ?>">
            <?php if (isset($hibak['nev'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($hibak['nev'] as $hiba) {
                        echo $hiba . "<br>";
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>


    <div class="form-group">
        <label for="">Üzenet</label>
        <textarea class="form-control" name="uzenet" id="" rows="3"><?php if(isset($ertekek['nev'])) echo $ertekek['uzenet']; ?></textarea>
        <?php if (isset($hibak['uzenet'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($hibak['uzenet'] as $hiba) {
                    echo $hiba . "<br>";
                } ?>
            </div>
        <?php } ?>
    </div>


    <button type="submit" name="kapcs" class="btn btn-primary mt-3">Küldés</button>
</form>

<?php if (isset($allapot)) { ?>
    <div class="mt-3 alert alert-<?= ($allapot['allapot'] == 1) ? 'success' : 'danger' ?>" role="alert">
        <?= $allapot['uzenet'] ?>
    </div>
<?php } ?>
