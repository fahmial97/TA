<div class="container">

  <h1 class="h3 mb-4 text-gray-800 text-center">Edit Profile</h1>

  <div class="row justify-content-center">
    <div class="col-lg-9 col-sm-10">

      <form method="post" enctype="multipart/form-data" action="<?= base_url('profile/editUser/' . $dataEdit->id . ''); ?>">

        <div class="form-group row">
          <label for="nim" class="col-3 col-form-label">NIM</label>
          <div class="col-9">
            <input class="form-control " type="text" name="nama" value="<?= $dataEdit->nim ?>" readonly />
            <div class="invalid-feedback">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="nama" class="col-3 col-form-label">Nama</label>
          <div class="col-9">
            <input class="form-control " type="text" name="nama" value="<?= $dataEdit->nama ?>" required />
            <div class="invalid-feedback">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="fakultas" class="col-3 col-form-label">Fakultas</label>
          <div class="col-9">
            <select class="custom-select" name="fakultas" id="fakultas" required>
              <option>Pilih Fakultas</option>
              <?php foreach ($fakultas as $value) : ?>
                <?php if ($value['id'] == $dataEdit->id) : ?>
                  <option value="<?= $value['id'] ?>" selected><?= $value['nama_fakultas'] ?></option>
                <?php else : ?>
                  <option value="<?= $value['id'] ?>"><?= $value['nama_fakultas'] ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-3 col-form-label">Email</label>
          <div class="col-9">
            <input class="form-control" type="text" name="email" placeholder="" value="<?= $dataEdit->email ?>" readonly />
            <div class="invalid-feedback">
            </div>
          </div>

        </div>
        <div class="form-group row">
          <label for="no_telpon" class="col-3 col-form-label">No Telpon</label>
          <div class="col-9">
            <input class="form-control" type="number" name="no_telpon" placeholder="" value="<?= $dataEdit->no_telpon ?>" required />
            <div class="invalid-feedback">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="image" class="col-3 col-form-label">Foto</label>
          <div class="col-9">
            <div class="row">
              <div class="col-3">
                <img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" class="img-thumbnail">
              </div>
              <div class="col-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="text-right">
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </div>
      </form>

    </div>
  </div>




</div>