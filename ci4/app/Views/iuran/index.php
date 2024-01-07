<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h1>Iuran Warga</h1>
    <div class="row">
        <div class="col-sm-8">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input name="keyword" type="text" class="form-control" placeholder="Masukkan keyword...">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" value="<?= number_format((int)$nominal['total_nominal'], 0, ',', '.') ?>" disabled>
                    <span class="input-group-text">.00</span>
                </div>
            </form>
        </div>
        <div class="col-sm-4 mb-3">
            <a href="/iuran/create" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('berhasil') ?>
        </div>
    <?php endif ?>
    <div class="table-responsive">
        <table class="table table-success table-striped align-middle text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">ID Warga</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($iuran as $i) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $nomor ?></th>
                        <td><?= $i['tanggal'] ?></td>
                        <td><?= $i['warga_id'] ?></td>
                        <td><?= $i['keterangan'] ?></td>
                        <td><?= number_format($i['nominal'], 0, ',', '.') ?></td>
                        <td>
                            <a href="/iuran/detail/<?= $i['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                        </td>
                        <?php $nomor++ ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?= $pager->links('iuran', 'iuran_pagination') ?>
</div>
<?= $this->endSection(); ?>