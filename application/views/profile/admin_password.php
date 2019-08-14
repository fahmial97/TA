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
                                                <label for="password_lama" class="col-4 col-form-label">Password saat ini</label>
                                                <div class="col-8">
                                                    <input type="password" class="form-control" id="password_lama" name="password_lama">
                                                    <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password_baru1" class="col-4 col-form-label">Password Baru</label>
                                                <div class="col-8">
                                                    <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                                                    <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password_baru2" class="col-4 col-form-label">Ulangi Password</label>
                                                <div class="col-8">
                                                    <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                                                    <?= form_error('password_baru2', '<small class="text-danger">', '</small>'); ?>
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