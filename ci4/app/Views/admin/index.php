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
        <div class="col-sm-4 mb-3">
            <a href="/warga/create" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('berhasil') ?>
        </div>
    <?php endif ?>
    <div class="table-responsive">

        <table class="table table-success table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Info</th>
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
                        <td class="text-center">
                            <a href="/warga/detail/<?= $w['id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                        <?php $nomor++ ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?= $pager->links('warga', 'warga_pagination') ?>
</div>
<?= $this->endSection(); ?>