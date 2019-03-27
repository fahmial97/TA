<div class="container-fluid">
	<h3>Tambah Ruang</h3>
				<div class="card mb-3">
					<div class="card-header text-right">
						<a href="<?= site_url('admin/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<!-- <form method="post" enctype="multipart/form-data" > -->
							<?= form_open_multipart('Ruang/add');?>

              <div class="form-group">
                <label for="image">Foto</label>
                <input class="form-control-file <?= form_error('image') ? 'is-invalid':'' ?>"
                 type="file" name="image" />
								 <input type="hidden" name="old_image">
                <div class="invalid-feedback">
                  <?= form_error('image') ?>
                </div>
              </div>

							<div class="form-group">
								<label for="no_ruang">Nomor Ruang</label>
								<input class="form-control <?= form_error('no_ruang') ? 'is-invalid':'' ?>"
								 type="text" name="no_ruang" />
								<div class="invalid-feedback">
									<?= form_error('no_ruang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="Status">Status</label>
								<input class="form-control <?= form_error('status') ? 'is-invalid':'' ?>"
								 type="number" name="status" min="0" />
								<div class="invalid-feedback">
									<?= form_error('status') ?>
								</div>
							</div>

              <div class="text-right">
                <input class="btn btn-success" type="submit" name="btn" value="Save" />
              </div>
							<?= form_close(); ?>
						<!-- </form> -->

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>

</div>
