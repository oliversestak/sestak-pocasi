<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>



<h1></h1>
<?php echo $row->name; ?>



<?= $table->generate(); ?>
    


<?= $this->endSection(); ?>