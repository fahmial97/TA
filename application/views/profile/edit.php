<div class="container">
  <?php {?>
    <table cellpadding="8">
      <form class="user col-7" method="post" action="<?= base_url('profile/update') ?>">
        <div class="form-group">
          <input type="number" class="form-control form-control-user" id="nim" name="nim" placeholder="NIM" value="<?= $u['nim'] ?>" readonly>
        </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="fullname" name="nama" placeholder="Nama" >
          </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="fakultas" name="fakultas" placeholder="Fakultas">
        </div>
        <div class="form-group">
          <input type="number" class="form-control form-control-user" id="no_telp" name="no_telpon" placeholder="Nomor Telepon" >
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">

          </div>
          <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
          </div>
        </div>

        <tr>
  				<td></td>
  				<td><input type="submit" value="Simpan"></td>
  			</tr>

      </form>
    </table>
	<?php } ?>

  </div>
