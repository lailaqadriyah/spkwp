<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>SPK Pemilihan Kos</title>

  <!-- Font & CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


  <style>
    html,
    body {
      height: 100%;
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: linear-gradient(to bottom right, #F1E7E7, #FFFFFF);
      /* Warna dasar lembut */
      display: flex;
      flex-direction: column;
      margin: 0;
    }

    .hero {
      background: linear-gradient(to right, #F1E7E7, #E6D0D0);
      /* Gradasi pink muda */
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 0 0 30px 30px;
      padding-bottom: 2rem;
    }

    .title {
      color: #6A142F;
      /* Warna teks tegas untuk kontras */
    }

    .subtitle {
      color: #8C1C3B;
      /* Lebih gelap untuk subtitel */
      margin-bottom: 1rem;
    }

    p {
      color: #4C2E2E;
      /* Teks utama, cukup gelap untuk keterbacaan */
      font-size: 1.1rem;
      line-height: 1.6;
    }

    .button.is-info {
      background-color: #6A142F;
      /* Warna maroon untuk kontras */
      color: #FDEEEF;
      /* Teks terang */
      font-weight: 600;
      transition: all 0.3s ease;
      border-radius: 12px;
    }

    .button.is-info:hover {
      background-color: #8C1C3B;
      box-shadow: 0 4px 12px rgba(106, 20, 47, 0.3);
    }

    footer {
      background-color: #6A142F;
      color: white;
      padding: 2rem 1.5rem;
      margin-top: auto;
    }
  </style>
</head>

<body>

  <main>
    <!-- Hero Section -->
    <section class="hero is-medium animate__animated animate__fadeIn">
      <div class="hero-body">
        <div class="container">
          <div class="columns is-vcentered is-variable is-8">
            <!-- Konten -->
            <div class="column">
              <h1 class="title is-3 has-text-weight-bold animate__animated animate__zoomIn">
                SPK PEMILIHAN KOS-KOSAN DISEKITAR UNAND DENGAN METODE WP
              </h1>
              <h2 class="subtitle is-5 animate__animated animate__slideInUp">
                OLEH KELOMPOK 6 | 2025
              </h2>
              <p>
                Sistem Penunjang Keputusan (SPK) ini dirancang untuk membantu mahasiswa dalam memilih tempat kos terbaik di sekitar Universitas Andalas (Unand) berdasarkan preferensi dan kebutuhan masing-masing. Sistem ini menggunakan metode Weighted Product (WP), salah satu metode pengambilan keputusan multikriteria yang cepat, akurat, dan efisien.
              </p>
              <br>
              <a href="index.php?halaman=datales" class="button is-info has-text-weight-bold is-medium border-radius">
                Mulai
              </a>
            </div>
            <!-- Kolom kanan: Gambar -->
            <div class="animate__animated animate__headShake animate__infinite">
              <img src="../asset/img/kos.png" alt="Gambar Kos" style="max-width: 80%; height: auto;">
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>SPK Pemilihan Kos oleh Kelompok 6</strong> – Sistem Informasi | 2025<br>
        Universitas Andalas
      </p>
      <p>© 2025 All Rights Reserved.</p>
    </div>
  </footer>

</body>

</html>