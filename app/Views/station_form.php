<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h1><?= isset($station->S_ID) ? 'Upravit stanici' : 'Přidat stanici'; ?></h1>

<?php
$action = isset($station->S_ID)
    ? base_url('station/update/' . $station->S_ID)
    : base_url('station/create');
?>

<form method="post" action="<?= $action; ?>">
    <?= csrf_field(); ?>

    <div class="mb-3">
        <label>BUNDESLAND</label>
        <input type="text" name="bundesland" value="<?= old('bundesland', $station->bundesland ?? ''); ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Název stanice</label>
        <input type="text" name="place" value="<?= old('place', $station->place ?? ''); ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        <?= isset($station->S_ID) ? 'Uložit změny' : 'Vytvořit'; ?>
    </button>
</form>

<?= $this->endSection(); ?>