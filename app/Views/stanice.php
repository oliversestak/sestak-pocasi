<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<h1>Naměřená data <?= $stanice->place ?> </h1>
<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading("datum", "vlhkost", "sluneční dosvit", "tlak", "maximální vítr");



foreach($tabulka as $row) {
    $table->addRow($row->date, $row->sun_length,$row->mid_air_pressure,$row->max_wind);
}




echo $table->generate();
?>


<?= $this->endSection(); ?>