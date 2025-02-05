
<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<h1>Přehled meteorologických stanic ve spolkové zemi <?= $nazev->name ?></h1> 

<div class="row">
<?php

foreach($stanice as $row) {
?>

  
    <div class=" col-md-4">
      <div class="card mt-2">
        <div class="card-body"><?=  anchor("stanice/".$row->S_ID, $row->place)   ?>   </div>
        <div class="card-text ms-2">
           <p> <span class="fw-bold"> šířka: <?= $row->geo_latitude ?> </p> </span> 
           <p> <span class="fw-bold">  délka: <?= $row->geo_longtitude ?></p> </span>
           <p> <span class="fw-bold"> výška: <?= $row->height ?></p> </span>
        </div>
        <div>
         
        </div>
     </div>
     </div>
<?php 
}
?>



<?= $this->endSection(); ?>