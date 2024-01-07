<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Contact Page</h1>

    <ul>
        <li><?= $contacts['no_phone'] ?></li>
        <li><?= $contacts['address'] ?></li>
        <li><?= $contacts['country'] ?></li>
    </ul>
</div>
<?= $this->endSection(); ?>