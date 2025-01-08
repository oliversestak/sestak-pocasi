
<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<h1>Přehled meteorologických stanic ve spolkové zemi <?= $nazev->name ?></h1> 


<?php

foreach($stanice as $row){
  ?>
<div class="card">
  <div class="card-body">Místo:  <?= $row->place ?> </div>
</div>
<?php 
}
?>



<?= $this->endSection(); ?>