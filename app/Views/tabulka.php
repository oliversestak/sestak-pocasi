

<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading("");

$cesta = "node_modules/obrazky/vlajky/";
$cesta2 = "node_modules/obrazky/mapy/"
?>


<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Název</th>
            <th>Zkratka</th>
            <th>Mapa/Vlajka</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($zeme as $row): ?>
            <tr>
                <td> <?php echo $row->id; ?> </td>
                <td> <a href="stranka/<?php echo $row->id; ?>" class="text-decoration-none"> <?php echo $row->name; ?> </a> </td>
                <td> <?php echo $row->short_name; ?> </td>
                <td> <?php 
                $obrazek = [
                    "src"=>$cesta.$row->flag,
                    "width"=>80
                ];

                
                echo img($obrazek) ?> 
                </td>
                <td>
                    <?php  
                    $obrazek2 = [
                        "src"=>$cesta2.$row->map,
                        "width"=>120
                        //"height"=>80
                    ];
                    
                    echo img($obrazek2) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<?=$table->generate(); ?>


<?= $this->endSection(); ?>