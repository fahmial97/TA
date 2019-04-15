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
  <div class="col-9 offset-3 col-md-2 offset-md-9 ">
    <p>
      <span class="jam"></span>
    </p>
  </div>

  <div class="container">
    <?php foreach ($tb_ruang as $r) : ?>
      <div class="card mb-4 shadow">
        <div class="row no-gutters">
          <div class="col-md-3">
            <img class="card-img-top" src="<?= base_url('asset/img/ruang/' . $r->image) ?>" max_width="500" />
          </div>
          <div class="col-md-9 text-center text-md-left">
            <div class="card-body ">
              <h4 class="card-title border-bottom "> <?= $r->no_ruang ?></h4>
              <div class="mb-2 btn btn-sm btn-<?= statusHelpers($r->id_status)['style'] ?>"><?= statusHelpers($r->id_status)['status'] ?></div>
              <div class="text-md-right pt-md-5 pl-md-5 ">
                <a class="btn btn-info" href=" <?= base_url('ruang/booking/') ?><?= $r->id ?>">
                  <i class="far fa-bookmark pr-2"></i> Pinjam
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    <?php endforeach; ?>
    <br class="d-sm-block">

  </div>
  <!--container-->