<?php
$sqlSelect = "SELECT * FROM `kapcsolat` ORDER BY `kapcsolat`.`kuldve` DESC";
$sth = $db->prepare($sqlSelect);
$sth->execute();
?>


<div class="table-responsive">
    <table class="table rable-hover">
        <thead>
        <tr>
            <th>Feladó</th>
            <th>Email</th>
            <th>Üzenet</th>
            <th>Küldte</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sth->fetchAll() as $kapcs){?>
        <tr>
            <td class="align.middle"><?= $kapcs['nev'] ?></td>
            <td class="align.middle"><?= $kapcs['email'] ?></td>
            <td class="align.middle"><?= $kapcs['uzenet'] ?></td>
            <td class="align.middle"><?= $kapcs['kuldve'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
