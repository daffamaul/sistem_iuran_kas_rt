<?php $this->extend('layouts/template'); ?>

<?php $this->section('content'); ?>

<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $warga['nama'] ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $warga['nik'] ?></h6>
            <p class="card-text"><?= $warga['alamat'] ?> | <?= $warga['no_rumah'] ?></p>
            <p class="card-text"><?= $warga['no_hp'] ?></p>
            <a href="/warga/edit/<?= $warga['id'] ?>" class="btn btn-info btn-sm">Ubah</a>
            <a href="/warga/delete/<?= $warga['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?');">Hapus</a>
            <br><br>
            <a href="/" class="card-link">Kembali</a>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>