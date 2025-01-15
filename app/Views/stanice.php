<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading("datum", "vlhkost", "sluneční dosvit", "tlak", "maximální vítr");


foreach($stanice as $row) {
    $table->addRow($row->date, $row->sun_lenght,$row->mid_air_pressure,$row->max_wind);
}




echo $table->generate();
?>


<?= $this->endSection(); ?>