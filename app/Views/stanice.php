<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<h1>Naměřená data <?= $stanice->place ?> </h1>

<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading("datum", "vlhkost", "sluneční dosvit", "tlak", "maximální vítr");

?>


<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Datum</th>
                <th>Vlhkost (%)</th>
                <th>Sluneční dosvit (h)</th>
                <th>Tlak (hPa)</th>
                <th>Maximální vítr (km/h)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tabulka as $row): ?>
                <tr>
                    <td><?= esc($row->date); ?></td>
                    <td><?= esc($row->humidity); ?></td>
                    <td><?= esc($row->sun_length); ?> %</td>
                    <td><?= esc($row->mid_air_pressure); ?> hPa</td>
                    <td><?= esc($row->max_wind); ?> km/h</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $table->generate(); ?>
    


<?= $this->endSection(); ?>