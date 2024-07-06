<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <script src="https://unpkg.com/intersection-observer@2.0.0/dist/intersection-observer.umd.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
  <title>E-Simaksi | {{ $title }}</title>
  
</head>
<body>
  
@include('partials.navbar')

@include('partials.carousel')

<div class="wrapper mx-5 mt-n1" >
  <div class="col-md-12">
      <div class="total-pendaki text-center mt-4">
        <h1 class="display-1 fw-bolder" id="jumlahPendaki">0</h1>
        <p>Jumlah Pendaki</p>
      </div>
    
      <section>
        @livewire('contents')
      </section>
      <div class="divider"></div>

      <div class="alur-booking mt-5">
        <div class="col-md-4 text-center mx-auto" >
          <h1>Alur Booking</h1>
          <p>Booking dapat dilakukan 24/7 dan proses Verifikasi dilakukan pada hari Senin - Jumat pukul 08.00 - 16.00. Booking dilakukan maksimal H-3 sebelum tanggal keberangkatan.</p>
        </div>
        <ol>
          <div class="row mt-5 mb-5">
            <div class="col-md-6">
              <ol>
                <li><span>Portal Booking</span><br>
                  Klik tombol Book Now. Disarankan menggunakan laptop untuk melakukan Booking.</li>
                <li><span>SOP Pendakian</span><br>
                  Pahami dan taati SOP dan peraturan pendakian yang berlaku.</li>
                <li><span>Pilih Tujuan dan Tanggal Pendakian</span><br>
                  Pilih Tujuan jalur pendakian serta tentukan tanggal keberangkatan dan turunnya.</li>
                  <li><span>Mengisi Form</span><br>
                    Lengkapi semua kolom yang telah disediakan dan pastikan semua data dengan benar dan sesuai dengan kartu identitas.</li>
              </ol>
            </div>
    
            <div class="col-md-6">
              <ol start="4">
                <li><span>Pembayaran</span><br>
                  Pembayaran melalui pengiriman bukti transfer dan ticket yang dikirimkan melalui WhatsApp.</li>
                <li><span>Cetak SIMAKSI</span><br>
                  SIMAKSI (Surat Izin Memasuki Kawasan Konservasi) dapat dilihat di My Ticket melalui menu di website. Cetak SIMAKSI dan tunjukkan ke petugas di pos pendakian.</li>
                <li><span>Verifikasi SIMAKSI di Pos</span><br>
                  Petugas akan melakukan validasi SIMAKSI dengan scan QRCode yang terdapat pada lembar SIMAKSI.</li>
              </ol>
            </div>
          </div>
      </div>
  </div>
</div>

@include('partials.footer')

<script>
  function animateCount(element, targetValue, duration) {
    $({ Counter: 0 }).animate(
      { Counter: targetValue },
      {
        duration: duration,
        easing: 'swing',
        step: function () {
          $(element).text(Math.ceil(this.Counter));
        }
      }
    );
  }

  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function handleIntersection(entries, observer) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        var targetValue = {{ \App\Models\pendaftaran::count() }};
        animateCount('#jumlahPendaki', targetValue, 2000);
        observer.disconnect();
      }
    });
  }

  var observer = new IntersectionObserver(handleIntersection);
  observer.observe(document.getElementById('jumlahPendaki'));
</script>
</body>
</html>
