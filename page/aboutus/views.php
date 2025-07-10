<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Kelompok 6 SPK</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Tambahkan CSS framework jika ada (misalnya Bulma) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      background: #F1E7E7;

    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

    .has-background-maroon {
      background-color: #800000 !important;
    }

    .button.is-maroon {
      background-color: #800000;
      color: #fff;
      border: none;
    }

    .button.is-maroon:hover {
      background-color: #a00000;
    }

    .pagination-container {
      margin-top: 1rem;
    }
  </style>
</head>

<body>

  <section class="section">
    <div class="container">
      <h1 class="title has-text-centered" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" data-aos="fade-up" data-aos-duration="1000">Anggota Kelompok 6 SPK</h1>

      <!-- Baris pertama (3 kolom) -->
      <div class="columns">
        <div class="column is-one-third">
          <div class="card has-text-centered" data-aos="fade-down" data-aos-duration="1000" style="border-radius: 15px; box-shadow:2px 1px 3px 3px maroon ">
            <div class="card-content">
              <figure class="image is-inline-block mb-3">
                <center><img src="../asset/img/Salsa2.png" alt="Automobile Technology" style="width: 75%; height:75%;"></center>
              </figure>
              <p class="title is-6">🧑‍🎓 Salsabilla <br>2311522020</p>
              <p>Known as the silent killer of deadlines. <br>Can debug life better than code. <br>Believes Ctrl+Z should work in real life too.</p>
            </div>
          </div>
        </div>

        <div class="column is-one-third">
          <div class="card has-text-centered" data-aos="fade-down" data-aos-duration="1000" style="border-radius: 15px; box-shadow:2px 1px 3px 3px maroon">
            <div class="card-content">
              <figure class="image is-inline-block mb-3">
                <center><img src="../asset/img/Laila2.png" alt="IT Network" style="width: 75%; height:75%;"></center>
              </figure>
              <p class="title is-6">👩‍💻 Laila Qadriyah <br> 2311522022</p>
              <p>Speaks fluent “WiFi disconnected.” <br> Once fixed a router just by staring at it. <br> Dreams in binary — 0s and 1s only.</p>
            </div>
          </div>
        </div>

        <div class="column is-one-third">
          <div class="card has-text-centered" data-aos="fade-down" data-aos-duration="1000" style="border-radius: 15px; box-shadow:2px 1px 3px 3px maroon ">
            <div class="card-content">
              <figure class="image is-inline-block mb-3">
                <center><img src="../asset/img/Ririn.png" alt="IT Network" style="width: 75%; height:75%;"></center>
              </figure>
              <p class="title is-6">🧕 Ririn Fauzia Rahma <br>2311522040</p>
              <p>Can turn coffee into presentations. <br>Brings good vibes and extra snacks. <br>Treats bugs like annoying exes</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Baris kedua (2 kolom di tengah) -->
      <div class="columns is-centered">
        <div class="column is-one-third">
          <div class="card has-text-centered" data-aos="fade-down" data-aos-duration="1000" style="border-radius: 15px; box-shadow:2px 1px 3px 3px maroon ">
            <div class="card-content">
              <figure class="image is-inline-block mb-3">
                <center><img src="../asset/img/Rian.png" alt="Siswa Teladan" style="width: 75%; height:75%;"></center>
              </figure>
              <p class="title is-6">🧑 Riandi Arista Muhammad <br> 2311523008</p>
              <p>Runs on instant noodles and ambition. <br>Says "brb" but comes back next week. <br>Can be the next Elon if he wakes up on time.</p>
            </div>
          </div>
        </div>

        <div class="column is-one-third">
          <div class="card has-text-centered" data-aos="fade-down" data-aos-duration="1000" style="border-radius: 15px; box-shadow:2px 1px 3px 3px maroon ">
            <div class="card-content">
              <figure class="image is-inline-block mb-3">
                <center><img src="../asset/img/Anggun.png" alt="Prestasi Lainnya" style="width: 75%; height:75%;"></center>
              </figure>
              <p class="title is-6">👩 Anggun Weldiana Putri <br> 2311523040</p>
              <p>Part-time student, full-time snack hunter. <br>Uses "trial and error" like it's a lifestyle. <br>Keyboard warrior with style</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>