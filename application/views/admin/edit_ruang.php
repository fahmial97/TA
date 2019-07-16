<div class="container">
	<h4>Edit Ruang</h4>
				<div class="card mb-3">
					<div class="card-header text-right">
						<a href="<?= site_url('admin/ruang') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>

					<div class="card-body">
						<form method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="image">Foto</label>
                <input class="form-control-file <?= form_error('image') ? 'is-invalid':'' ?>"
                 type="file" name="image" placeholder="" value="<?=$tb_ruang->image ?>"/>
                <div class="invalid-feedback">
                  <?= form_error('image') ?>
                </div>
              </div>

							<div class="form-group">
								<label for="no_ruang">Nomor Ruang</label>
								<input class="form-control <?= form_error('no_ruang') ? 'is-invalid':'' ?>"
								 type="text" name="no_ruang" value="<?=$tb_ruang->no_ruang ?>"/>
								<div class="invalid-feedback">
									<?= form_error('no_ruang') ?>
								</div>
							</div>

							<!-- <div class="form-group">
								<label for="status">Status</label>
								<select class="custom-select" name="status" id="status">
									<?php foreach ($status as $s): ?>
									<?php if($tb_ruang->id_status == $s['id']) : ?>
											<option value="<?= $s['id'] ?>" selected><?= $s['nama_status'] ?></option>
										<?php else : ?>
											<option value="<?= $s['id'] ?>"><?= $s['nama_status'] ?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<?= form_error('status') ?>
							</div> -->

              <div class="text-right">
                <input class="btn btn-success" type="submit" name="btn" value="Save" />
              </div>
						</form>

					</div>

</div>
