<div class="container-fluid">
	<h3>Tambah Ruang</h3>
				<div class="card mb-3">
					<div class="card-header text-right">
						<a href="<?= site_url('admin/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<!-- <form method="post" enctype="multipart/form-data" > -->
							<?= form_open_multipart('admin/addRuang');?>

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
								<label for="status">Status</label>
								<select class="custom-select" name="status" id="status">
									<option selected>Pilih Status</option>
									<?php foreach ($status as $s): ?>
										<option value="<?= $s['id'] ?>"><?= $s['nama_status'] ?></option>
									<?php endforeach; ?>
								</select>

								<?= form_error('status') ?>
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
