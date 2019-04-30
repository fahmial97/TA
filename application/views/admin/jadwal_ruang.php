 <!-- Begin Page Content -->
 <div class="container">
     <?php if ($this->session->flashdata('success')) : ?>
         <div class="alert alert-success" role="alert">
             <?= $this->session->flashdata('success'); ?>
         </div>
     <?php endif; ?>
     <?php if ($this->session->flashdata('error')) : ?>
         <div class="alert alert-danger" role="alert">
             <?= $this->session->flashdata('error'); ?>
         </div>
     <?php endif; ?>

     <div class="container">
         <div class="row">
             <div class="col-6">
                 <h3>Jadwal Ruang</h3>
             </div>
             <div class="col-6 text-right">
                 <a href="<?= site_url('admin/ruang') ?>" class="text-decoration-none">
                     <i class="fas fa-arrow-left fa-fw"></i> Back</a>
             </div>
         </div>

         <div class="card header p-4">
             <?php foreach ($jam_buka as $jam) : ?>
                 <form method="post" action="<?= base_url('admin/updateWaktuRuang') ?>">
                     <input type="hidden" name="id" value="<?= $jam->id; ?>">
                     <div class="card shadow-sm mb-5">
                         <div class="row no-gutters m-2 text-center">
                             <div class="col-6 col-md-1 p-md-2">
                                 <h6 class="font-weight-bold">Hari</h6>
                                 <h6><?= ucfirst($jam->hari) ?></h6>
                             </div>
                             <div class="col-6 col-md-2 p-md-2">
                                 <h6 class="font-weight-bold">Status<h6>
                                         <select class="custom-select" id="inputGroupSelect01" name="status" disabled>
                                             <option>Pilih Status</option>

                                             <?php foreach ($status_buka as $buka) : ?>
                                                 <?php if ($jam->status == $buka) : ?>
                                                     <option value="<?= $buka; ?>" selected><?= ucfirst($buka); ?></option>
                                                 <?php else : ?>
                                                     <option value="<?= $buka; ?>"><?= ucfirst($buka); ?></option>
                                                 <?php endif; ?>
                                             <?php endforeach; ?>

                                         </select>
                             </div>
                             <div class="col-6 col-md-4  p-md-2">
                                 <h6 class="font-weight-bold">Buka</h6>
                                 <div class="row">
                                     <div class="col-6">
                                         <select class="custom-select" id="inputGroupSelect01" name="jam_buka" disabled>
                                             <option>Pilih Jam Buka</option>

                                             <?php $jamBuka = substr($jam->jam_buka, 0, 2);

                                                for ($i = 0; $i <= 23; $i++) : ?>
                                                 <?php if ($i < 10) : ?>
                                                     <?php if ($jamBuka == '0' . $i) : ?>
                                                         <option value="<?= '0' . $i; ?>" selected><?= '0' . $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php else : ?>
                                                     <?php if ($jamBuka == $i) : ?>
                                                         <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= $i; ?>"><?= $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php endif; ?>
                                             <?php endfor; ?>
                                         </select>
                                     </div>
                                     <div class="col-6">
                                         <select class="custom-select" id="inputGroupSelect01" name="menit_buka" disabled>
                                             <option>Pilih Menit Buka</option>
                                             <?php
                                                $menitBuka = substr($jam->jam_buka, 3, 2);
                                                for ($i = 0; $i <= 59; $i++) : ?>
                                                 <?php if ($i < 10) : ?>
                                                     <?php if ($menitBuka == '0' . $i) : ?>
                                                         <option value="<?= '0' . $i; ?>" selected><?= '0' . $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php else : ?>
                                                     <?php if ($menitBuka == $i) : ?>
                                                         <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= $i; ?>"><?= $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php endif; ?>
                                             <?php endfor; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-6 col-md-4 p-md-2">
                                 <h6 class=" font-weight-bold">Tutup</h6>
                                 <div class="row">
                                     <div class="col-6">
                                         <select class="custom-select" id="inputGroupSelect01" name="jam_tutup" disabled>
                                             <option>Pilih Jam Tutup</option>

                                             <?php $jamTutup = substr($jam->jam_tutup, 0, 2);
                                                $menitTutup = substr($jam->jam_tutup, 3, 2);
                                                for ($i = 0; $i <= 23; $i++) : ?>
                                                 <?php if ($i < 10) : ?>
                                                     <?php if ($jamTutup == '0' . $i) : ?>
                                                         <option value="<?= '0' . $i; ?>" selected><?= '0' . $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php else : ?>
                                                     <?php if ($jamTutup == $i) : ?>
                                                         <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= $i; ?>"><?= $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php endif; ?>
                                             <?php endfor; ?>
                                         </select>
                                     </div>
                                     <div class="col-6">
                                         <select class="custom-select" id="inputGroupSelect01" name="menit_tutup" disabled>
                                             <option>Pilih Menit Tutup</option>
                                             <?php for ($i = 0; $i <= 59; $i++) : ?>
                                                 <?php if ($i < 10) : ?>
                                                     <?php if ($menitTutup == '0' . $i) : ?>
                                                         <option value="<?= '0' . $i; ?>" selected><?= '0' . $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php else : ?>
                                                     <?php if ($menitTutup == $i) : ?>
                                                         <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                                     <?php else : ?>
                                                         <option value="<?= $i; ?>"><?= $i; ?></option>
                                                     <?php endif; ?>
                                                 <?php endif; ?>
                                             <?php endfor; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-6 col-md-1 p-md-2">
                                 <h6 class=" font-weight-bold">Aksi</h6>
                                 <a href="#" class="btn btn-primary btn-sm ubahWaktu">Ubah</a>
                                 <button class="btn btn-success btn-sm d-none" type="submit">Update</button>
                             </div>
                         </div>
                     </div>
                 </form>

             <?php endforeach; ?>
         </div>
     </div>