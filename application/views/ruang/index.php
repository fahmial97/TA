<div class="col-9 offset-3 col-md-2 offset-md-9 ">
  <p>
    <span class="jam"></span>
  </p>
</div>
<div class="container">


      <?php foreach ($tb_ruang as $r): ?>
        <div class="card mb-3" style="max-width: 800px;" >
          <div class="row no-gutters">
        <div class="col-md-5">
          <img class="card-img-top" src="<?= base_url('asset/img/ruang/'.$r->image) ?>" max_width="500" />
        </div>
        <div class="col-md-7 text-center text-md-left">
          <div class="card-body ">
            <h4 class="card-title border-bottom"> <?= $r->no_ruang ?></h4>
            <p class="card-text"><?= $r->status ?></p>
            <div class="text-md-right pt-md-5 mt-md-5 pl-md-5 ">
              <a class="btn btn-info" href="<?= base_url('booking'); ?>">
               <i class="far fa-bookmark pr-2"></i> Pinjam
              </a>
            </div>
          </div>
        </div>

          </div>
        </div>
    <?php endforeach; ?>
    <br class="d-sm-block">


</div> <!--container-->
