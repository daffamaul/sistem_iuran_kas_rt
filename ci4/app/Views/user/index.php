<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h1>Daftar Warga</h1>
    <div class="row">
        <div class="col-sm-8">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input name="keyword" type="text" class="form-control" placeholder="Masukkan keyword...">
                    <button class="btn btn-outline-secondary" type="button">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('berhasil') ?>
        </div>
    <?php elseif (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('gagal') ?>
        </div>
    <?php endif ?>
    <table class="table table-success table-striped">
        <thead class="text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1 + (5 * ($currentPage - 1)); ?>
            <?php foreach ($warga as $w) : ?>
                <tr>
                    <th scope="row" class="text-center"><?= $nomor ?></th>
                    <td><?= $w['nama'] ?></td>
                    <td class="text-center">
                        <?php if ($w['status'] == 1) : ?>
                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                        <?php else : ?>
                            <span class="badge rounded-pill text-bg-danger">Non Aktif</span>
                        <?php endif ?>
                    </td>
                    <?php $nomor++ ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $pager->links('warga', 'warga_pagination') ?>
</div>
<?= $this->endSection(); ?>