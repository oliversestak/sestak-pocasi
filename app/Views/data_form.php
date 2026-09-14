<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h1><?= isset($isCreate) && $isCreate ? 'Přidat nový záznam' : 'Upravit naměřený záznam'; ?></h1>

<?php
$action = isset($isCreate) && $isCreate
    ? base_url('data/create')
    : base_url('data/update/' . $row->id);
?>

<form method="post" action="<?= $action; ?>">
    <?= csrf_field(); ?>
    <input type="hidden" name="Stations_ID" value="<?= esc($row->Stations_ID); ?>">

    <div class="mb-3">
        <label for="date">Datum</label>
        <input type="date" name="date" id="date" value="<?= old('date', $row->date ?? ''); ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="humidity">Vlhkost (%)</label>
        <input type="number" step="0.01" name="humidity" id="humidity" value="<?= old('humidity', $row->humidity ?? ''); ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="sun_length">Sluneční dosvit (h)</label>
        <input type="number" step="0.01" name="sun_length" id="sun_length" value="<?= old('sun_length', $row->sun_length ?? ''); ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="mid_air_pressure">Tlak (hPa)</label>
        <input type="number" step="0.01" name="mid_air_pressure" id="mid_air_pressure" value="<?= old('mid_air_pressure', $row->mid_air_pressure ?? ''); ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="max_wind">Maximální vítr (km/h)</label>
        <input type="number" step="0.01" name="max_wind" id="max_wind" value="<?= old('max_wind', $row->max_wind ?? ''); ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary"><?= isset($isCreate) && $isCreate ? 'Vytvořit' : 'Uložit změny'; ?></button>
    <a href="<?= base_url('stanice/' . $row->Stations_ID); ?>" class="btn btn-secondary">Zpět</a>
</form>

<?= $this->endSection(); ?>
