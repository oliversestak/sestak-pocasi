<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<h1>Naměřená data <?= $stanice->place ?> </h1>

<a href="<?= base_url('data/new/' . $stanice->S_ID); ?>" class="btn btn-success mb-3">Přidat nový záznam</a>

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
                <th>Akce</th>
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
                    <td class="d-flex gap-2">
                        <a href="<?= base_url('data/edit/' . $row->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?= base_url('data/delete/' . $row->id); ?>" method="post" onsubmit="return confirm('Opravdu chcete smazat tento záznam?')">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $table->generate(); ?>
    


<?= $this->endSection(); ?>