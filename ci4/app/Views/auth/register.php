<?= $this->extend('layouts/auth_template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun-mu!</h1>
                        </div>
                        <form class="user" method="post" action="/register">
                            <div class="form-group row">
                                <div class="col-sm mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : 'is-valid' ?>" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : 'is-valid' ?>" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : 'is-valid' ?>" id="email" name="email" placeholder="Alamat email" value="<?= set_value('email') ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user <?= ($validation->hasError('password1')) ? 'is-invalid' : 'is-valid' ?>" id="password1" name="password1" placeholder="Password">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password1'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user <?= ($validation->hasError('password2')) ? 'is-invalid' : 'is-valid' ?>" id="password2" name="password2" placeholder="Ulangi Password">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password2'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary btn-user btn-block">
                                Buat Akun!
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('login') ?>">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>