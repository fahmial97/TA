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



});
