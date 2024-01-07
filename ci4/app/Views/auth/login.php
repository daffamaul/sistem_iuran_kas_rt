<?= $this->extend('layouts/auth_template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
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
                                <form class="user" action="/login" method="post">
                                    <div class="form-group">
                                        <input value="<?= set_value('email') ?>" type="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : 'is-valid' ?>" id="email" name="email" placeholder="Enter Email Address...">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : 'is-valid' ?>" id="password" name="password" placeholder="Password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('register') ?>">Buat Akun!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>