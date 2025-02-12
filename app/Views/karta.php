<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>


<div class="row">
<?php

foreach($karta as $row) {
?>

  
    <div class=" col-md-4">
      <div class="card mt-2">
        <div class="card-body"><?=  anchor("stanice/".$row->S_ID, $row->place)   ?>   </div>
        <div class="card-text ms-2">
           <p> <span class="fw-bold"> šířka: <?= $row->geo_latitude ?> </p> </span> 
           <p> <span class="fw-bold">  délka: <?= $row->geo_longtitude ?></p> </span>
           <p> <span class="fw-bold"> výška: <?= $row->height ?></p> </span>
           <img src="<?= base_url('node_modules/obrazky/vlajky/'.$row->flag) ?>", width="120", height="auto">
        </div>
     </div>
     </div>
<?php 
}
?>


<?= $this->endSection(); ?>