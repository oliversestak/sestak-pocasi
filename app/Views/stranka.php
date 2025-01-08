
<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<h1>Přehled meteorologických stanic ve spolkové zemi <?= $nazev->name ?></h1> 


<?php

foreach($stanice as $row){
  ?>
<div class="card">
  <div class="card-body"><?= $row->place ?> </div>
  <div class="card-text ms-2">geo: <?= $row->geo_latitude ?> </div>
</div>
<?php 
}
?>



<?= $this->endSection(); ?>