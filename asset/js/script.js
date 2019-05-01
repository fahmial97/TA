$(document).ready(function () {

  // ============================== Sidebar Nav ==============================
  $('#btnRes').click(function () {
    $('#mySidenav').css('width', '80%');
  });

  $('.closebtn').click(function () {
    $('#mySidenav').css('width', '0');
  });
  // ============================== /Sidebar Nav ==============================

  $('.card.header').on('click', '.ubahWaktu', function (e) {
    // e.preventDefault();
    let data = $(this).parentsUntil('.card.shadow-sm').find('select');
    $(data).removeAttr('disabled');
    $(this).addClass('d-none').next().removeClass('d-none');
  })

  // =================================== deadline ==============================
  $('.timer p').each((el) => {
    let timer = $('.timer p')[el]
    valid = $(timer).text()

    let eliminasi = valid.substr(0, 1)
    let cariJam = (valid / 60 / 60).toString()
    let cariMenit = '0' + cariJam.toString().substr(cariJam.toString().indexOf("."))
    let cariArray = (cariMenit * 60).toString()
    let cariDetik = '0.' + cariArray.split('.')[1]
    let jam = cariJam.split('.')[0]
    let menit = cariArray.split('.')[0]
    let detik = parseInt(cariDetik * 60)

    function changeclock() {
      $(timer).removeClass('d-none')
      if (detik == '0' && menit == '0' && jam == '0') {
        clearInterval();
        $(timer).text(`Done`).removeClass('text-danger')
      } else {
        if (eliminasi !== '-') {
          detik--;
          if (detik < 0) {
            detik = 59;
            menit--;

            if (menit < 0) {
              menit = 59
              jam--;
              if (jam < 0) {

                jam--;
              }
            }
          }

          if (jam < 1) {
            if (menit < 6) {
              $('.timer p').addClass('text-danger')
            }
          }

          $(timer).text(`${jam} : ${menit} : ${detik}`)

        }
      }
    }
    // changeclock()
    setInterval(changeclock, 1000)
  })




  // ============================== deadline ==============================




  // ============================== Button Tambah Data ==============================
  $("#btn-tambah-form").click(function () {

    let data = parseInt($('[name="no-data"]').val())
    let no = data + 1
    $('[name="no-data"]').val(no)

    if (data < 5) {
      $(".insert-form").append(
        `  <div class="row mb-3">
            <h6 class="pl-3 pt-md-2"> Data ${no} :</h6>
            <div class="col-sm mb-2">
              <input type="text" class="form-control form-control-user" id="fullname" name="nama_pinjam[]" placeholder="Nama" required>
            </div>
            <div class="col-sm mb-2">
              <input type="number" class="form-control form-control-user" id="nim" name="nim_pinjam[]" placeholder="NIM" required>

            </div>
            <div class="col-sm mb-2">
              <input type="number" class="form-control form-control-user" id="no_telp" name="no_telpon_pinjam[]" placeholder="Nomor Telepon">
            </div>
          </div>
        `);
    }

    $('.list-reset').removeClass('d-none')

    if (data == 4) {
      $('.list-btn-hidden').addClass('d-none')
    }
  });
  // ============================== Button Tambah Data ==============================

  // ============================== Button Reset Data ==============================
  $('#btn-reset-form').click(function () {
    $('.insert-form').empty()
    $('[name="no-data"]').val('3')
    $('.list-btn-hidden').removeClass('d-none')
    $('.list-reset').addClass('d-none')
  })
  // ============================== Button Reset Data ==============================

  $('.aksi-td').on('click', '.UpdateModal', function (e) {
    e.preventDefault();

    let href = $(this).attr('href');

    if (href.indexOf('selesai') !== -1) {
      $('#ModalStatus #judulModal').html('Ruangan selesai digunakan?');
      $('#ModalStatus .modal-body').html('Klik Selesai jika Peminjaman telah selesai');
      $('#ModalStatus #btn-StatusModal').html('Selesai');
    } else if (href.indexOf('cancel') !== -1) {
      $('#ModalStatus #judulModal').html('Yakin Ingin membatalkan Peminjaman?');
      $('#ModalStatus .modal-body').html('Klik ok jika peminjaman dibatalkan');
      $('#ModalStatus #btn-StatusModal').html('OK');
    } else {
      $('#ModalStatus #judulModal').html('Yakin Ingin konfirmasi');
      $('#ModalStatus .modal-body').html('Klik ok jika ingin konfirmasi');
      $('#ModalStatus #btn-StatusModal').html('OK');
    }

    $('#ModalStatus').modal('show');
    $('#ModalStatus #btn-StatusModal').attr('href', href);
  })


});