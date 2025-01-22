

<?= $this->extend("layout/template"); ?>


<?= $this->section("content");  ?>

<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading("");
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
                <td> <?php anchor("obrazky/") ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<?=$table->generate(); ?>


<?= $this->endSection(); ?>