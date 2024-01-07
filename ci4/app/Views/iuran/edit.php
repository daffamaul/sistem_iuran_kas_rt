<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-3">
    <div class="row">
        <div class="col-8">
            <h2>Ubah Data</h2>
            <form method="post" action="/iuran/update/<?= $iuran['id'] ?>">
                <input type="hidden" name="id" value="<?= $iuran['id'] ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $iuran_warga['tanggal'] ?>" autofocus required>
                </div>
                <select class="form-select mb-3" name="jenis_iuran" required>
                    <option>Jenis Iuran</option>
                    <?php foreach ($jenis_iuran as $ji) : ?>
                        <option value="<?= $ji['id'] ?>" <?= ($iuran_warga['jenis_iuran'] == $ji['jenis_iuran']) ? 'selected' : '' ?>><?= $ji['jenis_iuran'] ?></option>
                    <?php endforeach ?>
                </select>
                <select class="form-select mb-3" name="warga_id" required>
                    <option>Daftar Warga</option>
                    <?php foreach ($warga as $w) : ?>
                        <option value="<?= $w['id'] ?>" <?= ($iuran_warga['warga_id'] == $w['id']) ? 'selected' : '' ?>><?= $w['nama'] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" class="form-control" name="nominal" value="<?= $iuran_warga['nominal'] ?>">
                    <span class="input-group-text">.00</span>
                </div>
                <div class="mb-3 ">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="2" name="keterangan" required><?= $iuran_warga['keterangan'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>