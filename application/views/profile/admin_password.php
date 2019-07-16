<div class="container text-center">
    <div class="col-md-8 col-12  mx-md-auto">
        <div class="card  o-hidden border-0 rounded shadow my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h3 class="text-primary pb-4"> Ubah Password</h3>
                                <?= ($this->session->flashdata('message')); ?>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="<?= base_url('profile/ubahPasswordAdmin') ?>" method="post">

                                            <div class="form-group row">
                                                <label for="password_ini" class="col-4 col-form-label">Password saat ini</label>
                                                <div class="col-8">
                                                    <input type="password" class="form-control" id="password_ini" name="password_ini">
                                                    <?= form_error('password_ini', '<small class="text-danger">', '</small>'); ?>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="new_password1" class="col-4 col-form-label">Password Baru</label>
                                                <div class="col-8">
                                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                                    <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="new_password2" class="col-4 col-form-label">Ulangi Password</label>
                                                <div class="col-8">
                                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                                    <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                                                </div>

                                            </div>

                                            <div class="form-group py-2">
                                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




</div>