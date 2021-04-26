<h3>Videók</h3>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <iframe class="ard-img-top" width="100%" height="315" src="https://www.youtube.com/embed/2NOPj5lDVSA"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <div class="card-body">
                <h5 class="card-title">Athos és a vizespalack (www.menhely.eu)</h5>
                <p class="card-text">Kecskemét, Menhely <br>örökbefogadott kutyus</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <video style="width: 100%" controls>
                <source src="images/csont.mp4" type="video/mp4">
            </video>
            <div class="card-body">
                <h5 class="card-title">Athos és a csont</h5>
                <p class="card-text">Kecskemét, Menhely <br>örökbefogadott kutyus</p>
            </div>
        </div>
    </div>
</div>

<hr>
<h3>Hírek</h3>

<?php

$posztok = array(
    array(
        'cim' => "2018-február-16 - Mentor napi meghívó",
        'szoveg' => "Szeretettel várunk Minden Kilátogatót, Érdeklődőt, leendő Örökbefogadót, meglévő és új Pártfogót
                    2018.02.17.-n, 9-12 óra között rendhagyó módon megrendezésre kerülő Örökbefogadó és Mentor napunkra!",
    ),
    array(
        'cim' => "2018-február-13 - Közérdekű információ-Tudnivalók az 1%-ról",
        'szoveg' => "A felajánlás Önnek semmibe sem kerül, csupán két percet kérünk, amíg kitölti a rendelkező nyilatkozatot.
            Kérjük, ha egyet ért céljainkkal, és Ön is segíteni szeretne a bajba jutott négylábú Barátokon, rendelkezzen javunkra adója 1%-ról!",
    ),
    array(
        'cim' => "2018-február-12 - Beruházésok-fejlesztések 2017",
        'szoveg' => "2017 a fejlesztés éve volt a Menhely az Állatokért Alapítvány számára.
Több lépcsőben lassan lassan megvalósulni látszó beruházásaink mindegyike Értük történt...hogy átmeneti otthonuk valóban az igényekhez igazodva, rászolgáljon nevére.",
    ),
    array(
        'cim' => "2018-február-12 - Legyél Munkatársunk!",
        'szoveg' => "Álláslehetőség a Menhely az Állatokért Alapítványnál!

Állatbarát beállítottságú, szociális médiában jártas (facebook), felhasználó szintű számítógépes ismeretekkel valamint kiváló kommunikációs kézséggel rendelkező irodai munkatársat keresünk azonnali kezdéssel.",
    ),
    array(
        'cim' => "2018-február-06 - Bentley segítséget kér",
        'szoveg' => "Egy különleges lélek...tekintete tükre a vágynak, a hitnek, a gyermeki bájnak...a küzdésnek...Ő élni akar...",
    ),
)
?>

<div class="row">
    <?php foreach ($posztok as $poszt) { ?>
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $poszt['cim'] ?>
                    </h5>
                    <p class="card-text">
                        <?= $poszt['szoveg'] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>