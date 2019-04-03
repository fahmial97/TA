$(document).ready(function() {

  /** Sidebar Nav */
  $('#btnRes').click(function() {
    $('#mySidenav').css('width', '80%');
  });

  $('.closebtn').click(function() {
    $('#mySidenav').css('width', '0');
  });
  /** Sidebar Nav */

/** Membuat function hitung() sebagai Penghitungan Waktu mundur */
             var detik = 0;
             var menit = 15;

            /**
              * Membuat function hitung() sebagai Penghitungan Waktu
            */
           function hitung() {
               /** setTimout(hitung, 1000) digunakan untuk
                   * mengulang atau merefresh halaman selama 1000 (1 detik)
               */
               setTimeout(hitung,1000);

              /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
              if(menit < 10){
                    var peringatan = 'style="color:red"';
              };

              /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
              $('#timer').html(
                     // '<h5'+peringatan+'> sisa ' + menit + ' menit : ' + detik + ' detik</h5>'
                     `<h5 ${peringatan}> ${menit} : ${detik} <h5> `
               );

               /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
               detik --;

               /** Jika var detik < 0
                   * var detik akan dikembalikan ke 59
                   * Menit akan Berkurang 1
               */
               if(detik < 0) {
                   detik = 59;
                   menit --;

                   /** Jika menit < 0
                       * Maka menit akan dikembali ke 59
                       * Jam akan Berkurang 1
                   */
                   if(menit < 0) {
                       menit = 59;
                       jam --;

                       /** Jika var jam < 0
                           * clearInterval() Memberhentikan Interval dan submit secara otomatis
                       */
                       if(jam < 0) {
                           clearInterval();
                       }
                   }
               }
           }
           /** Menjalankan Function Hitung Waktu Mundur */
           hitung();
/** - Hitung Waktu Mundur */


  /** Jam RealTime */
  function jam() {
    var time = new Date(),
      hours = time.getHours(),
      minutes = time.getMinutes(),
      seconds = time.getSeconds();
    document.querySelectorAll('.jam')[0].innerHTML = harold(hours) + " : " + harold(minutes) + " : " + harold(seconds);

    function harold(standIn) {
      if (standIn < 10) {
        standIn = '0' + standIn
      }
      return standIn;
    }
  }
  setInterval(jam, 1000);
  /** Jam RealTime */


  $("#btn-tambah-form").click(function(){

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
    }else{
    }

    if (data == 4) {
      $('.list-btn-hidden').addClass('d-none')
    }
});

    $('#btn-reset-form').click(function() {
      $('.insert-form').empty()
      $('[name="no-data"]').val('3')
      $('.list-btn-hidden').removeClass('d-none')

      if (data == 3) {
        $('.list-reset').addClass('d-none')
      }
    })


});
