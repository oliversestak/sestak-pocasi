<?php

use Config\Database;
?>
<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<h1>Přehled meteorologických stanic ve spolkové zemi <?= $nazev->name ?></h1> 



<div class="card">
  <div class="card-body">Místo:  <?= $stanice->place ?> </div>
</div>



<?= $this->endSection(); ?>