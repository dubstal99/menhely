<?php

if(isset($_POST['kepfel'])){
    include('././logika/kepfel.php');
}

$sqlSelect = "SELECT * FROM `galeria` ORDER BY `galeria`.`feltoltve` DESC";
$sth = $db->prepare($sqlSelect);
$sth->execute();
?>

<div class="row">
    <?php  foreach ($sth->fetchAll() as $kep){  ?>
    <div class="col-sm-4 mb-2">
        <div class="p-2 border">
            <h4><?= $kep['cim'] ?></h4>
            <p><i class="fa fa-clock"></i> <?= $kep['feltoltve'] ?></p>
            <img src="<?= $kep['url'] ?>" alt="" style="max-width: 100%">
        </div>
    </div>
    <?php  }?>
</div>

<?php if(isset($_SESSION['felhasznalo'])){ ?>
    <hr>
<h2>Új kép feltöltése</h2>
<form action="" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="form-group col-sm-6">
            <label for="">Kép címe</label>
            <input type="text"
                <?php if (isset($ertekek['cim'])) { ?>
                    value="<?= $ertekek['cim'] ?>"
                <?php } ?>
                   class="form-control" name="cim" id=""
            >
        </div>
        <div class="form-group col-sm-6">
            <label for="">Kép kiválasztása</label>
            <input type="file" class="form-control-file" name="kep" id="kep">
            <small><br>CSAk jpg/jpeg/png formátum engedélyezett!</small>
        </div>

        <div class="col-sm-12" id="elobox" style="display: none">
            <p>Előnézeti kép</p>
            <img src="" id="elonezet" alt="" style="max-width: 300px">
        </div>
    </div>


    <button type="submit" id="kepfel" disabled class="btn btn-primary mt-5" name="kepfel">Feltötlés</button>
</form>

    <script>
        var kep = document.getElementById('kep');
        kep.addEventListener('change',function (e){
            let tipus = event.target.files[0].type;
            console.log(tipus);
            if(tipus != "image/jpeg" && tipus != "image/png" && tipus != "image/jpg"){
                document.getElementById('elobox').style.display = "none";
                document.getElementById('kepfel').disabled = true;
            }else{
                let ujkep = URL.createObjectURL(event.target.files[0]);
                document.getElementById('elonezet').src = ujkep;
                document.getElementById('elobox').style.display = "block";
                document.getElementById('kepfel').disabled = false;
            }

        });
    </script>

    <?php if (isset($allapot)) { ?>
        <div class="mt-3 alert alert-<?= ($allapot['allapot'] == 1) ? 'success' : 'danger' ?>" role="alert">
            <?= $allapot['uzenet'] ?>
        </div>
    <?php } ?>

<?php } ?>