<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading("id", "název", "zkratka");


foreach($zeme as $row) {
    $table->addRow($row->id, anchor('stranka/'.$row->id, $row->name), $row->short_name);
}




echo $table->generate();
?>

<?= $this->endSection(); ?>