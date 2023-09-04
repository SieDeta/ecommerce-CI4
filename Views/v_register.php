<?= $this->extend('components/layout_clear') ?>
<?= $this->section('content') ?>

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4">
		                    <a href="index.html" class="logo d-flex align-items-center w-auto">
		                        <img src="<?php echo base_url() ?>public/NiceAdmin/assets/img/logo.png" alt="">
		                        <span class="d-none d-lg-block">Tokoku</span>
		                    </a>
		                </div><!-- End Logo -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Register New Account</h5>
                            <p class="text-center small">Enter your desired username & password</p>
                        </div>

                        <?php if (session()->getFlashData('success')) : ?>
                            <div class="col-12 alert alert-success" role="alert">
                                <hr>
                                <p class="mb-0">
                                    <?= session()->getFlashData('success') ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashData('error')) : ?>
                            <div class="col-12 alert alert-danger" role="alert">
                                <hr>
                                <p class="mb-0">
                                    <?= session()->getFlashData('error') ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?= form_open('register', 'class="row g-3 needs-validation"') ?>

                        <div class="col-12">
		                            <label for="username" class="form-label">Username</label>
		                            <div class="input-group has-validation">
		                                <span class="input-group-text" id="inputGroupPrepend">@</span>
		                                <?= form_input('username', '', 'id="username" class="form-control" required') ?>
		                                <div class="invalid-feedback">Please enter a username.</div>
		                            </div>
		                        </div>
                                <!-- 
                                    <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <?= form_input('username', '', 'id="username" class="form-control" required') ?>
                            <div class="invalid-feedback">Please enter a username.</div>
                            </div>
                                 -->
                        
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <?= form_password('password', '', 'id="password" class="form-control" required') ?>
                            <div class="invalid-feedback">Please enter a password.</div>
                        </div>

                        <div class="col-12">
                            <?= form_submit('submit', 'Register', ['class' => 'btn btn-primary w-100']) ?>
                        </div>

                        <?= form_close() ?>

                    </div>
                </div>

                <div class="credits">
                    Designed by <a href=".">Tokoku</a>
                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
