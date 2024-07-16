<?php
session_start();
include '../config.php';
include '../back_end/tagname.php';
// Periksa apakah pengguna sudah login dan memiliki role 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Jika tidak, redirect ke halaman login
    header('Location: ../back_end/no_access.php');
    exit;
}
$head = '../components/head_mahasiswa.html';
$navbar = '../components/navbar_programad.html';
$footer = '../components/footer_mahasiswa.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>LPPI Universitas Muhammadiyah Bengkulu</title>
    <!-- Navbar -->
    <?php @include ($head); ?>
    <!-- Navbar -->
</head>

<body id="top">
    <!-- Navbar -->
    <?php @include ($navbar); ?>
    <!-- Navbar -->
    <main>
        <article>
            <!-- #HERO -->
            <section class="section hero" id="home" aria-label="hero">
                <div class="container">

                    <div class="hero-content">

                        <h1 class="h1 hero-title">
                            Program <span class="has-before"></span>Dan Pengamalan Islam (LPPI) 
                        </h1>
                        <h1>
                            Universitas Muhammadiyah Bengkulu
                        </h1>

                        <p class="hero-text">
                            Selamat Datang di Website Official LPPI UM Bengkulu
                        </p>

                        <ul class="social-list">

                            <li>
                                <a href="#" class="social-link" style="--color: hsl(241, 77%, 63%);">
                                    <ion-icon name="logo-facebook"></ion-icon>

                                    <span class="span">Facebook</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="social-link" style="--color: hsl(0, 100%, 50%);">
                                    <ion-icon name="logo-youtube"></ion-icon>

                                    <span class="span">Youtube</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="social-link" style="--color: hsl(271, 76%, 53%);">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                    <span class="span">Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <figure class="hero-banner">
                        <img src="../assets/img/um-bengkulu.jpg" width="794" height="637" alt="hero banner"
                            class="w-100">
                    </figure>
                </div>
            </section>

    <main>
        <article>

            <!--
        - #HERO
      -->

            <section class="section hero" id="home" aria-label="hero">
                <div class="container">

                    <div class="hero-content">

                        <h1 class="h1 hero-title">
                            Lembaga <span class="has-before">Pengkajian</span>Dan Pengamalan Islam (LPPI) 
                        </h1>
                        <h1>
                            Universitas Muhammadiyah Bengkulu
                        </h1>

                        <p class="hero-text">
                            Selamat Datang di Website Official LPPI UM Bengkulu
                        </p>

                        <ul class="social-list">

                            <li>
                                <a href="#" class="social-link" style="--color: hsl(241, 77%, 63%);">
                                    <ion-icon name="logo-facebook"></ion-icon>

                                    <span class="span">Facebook</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="social-link" style="--color: hsl(0, 100%, 50%);">
                                    <ion-icon name="logo-youtube"></ion-icon>

                                    <span class="span">Youtube</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="social-link" style="--color: hsl(271, 76%, 53%);">
                                    <ion-icon name="logo-instagram"></ion-icon>

                                    <span class="span">Instagram</span>
                                </a>
                            </li>

                        </ul>

                    </div>

                    <figure class="hero-banner">
                        <img src="../assets/img/um-bengkulu.jpg" width="794" height="637" alt="hero banner"
                            class="w-100">
                    </figure>

                </div>
            </section>





            <!--
        - #SERVICE
    -->

            <section class="section service" id="service" aria-label="service">
                <div class="container">

                    <p class="section-subtitle has-before text-center">Program</p>

                    <h2 class="h2 section-title text-center">Baitul Arqom</h2>

                    <ul class="grid-list">

                        <li>
                            <div class="service-card" style="--color: 174, 77%, 50%">

                                <div class="card-icon">
                                    <img src="../assets/img/BBA.png" width="30" height="30"
                                        loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="" class="card-title">SOP Kegiatan Baitul Arqam (BA)</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 267, 76%, 57%">

                                <div class="card-icon">
                                    <img src="../assets/img/service-icon-2.png" width="30" height="30"
                                        loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="table_mhsba_admin.php" class="card-title">Lihat Mahasiswa Baitul Arqom (BA)</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 267, 76%, 57%">

                                <div class="card-icon">
                                    <img src="../assets/img/service-icon-2.png" width="30" height="30"
                                        loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="form_daftarba_admin.php" class="card-title">Daftar Mahasiswa Baitul Arqom (BA)</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 17, 100%, 68%">

                                <div class="card-icon">
                                    <img src="../assets/img/service-icon-3.png" width="30" height="30"
                                        loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="grade_bamhs_admin.php" class="card-title"> Input Nilai Baitul Arqom (BA)</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 157, 89%, 44%">

                                <div class="card-icon">
                                    <img src="../assets/img/service-icon-6.png" width="30" height="30"
                                        loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Informasi Jadwal Kegiatan Baitul Arqom (BA)</a>
                                </h3>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>

        </article>
    </main>

    <!--
    - #FOOTER
-->

    <footer class="footer">
        <div class="container">

            <div class="footer-top section">

                <div class="footer-brand">

                    <p class="footer-list-title">Tentang LPPI</p>

                    <p class="footer-text">
                        Anda bisa mencari tahu seputar program dan kegiatan LPPI Universitas Muhammadiyah Bengkulu, 
                        dengan mengunjungi website resmi LPPI UMB.
                    </p>

                    <ul class="social-list">

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-tiktok"></ion-icon>
                            </a>
                        </li>

                    </ul>

                </div>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Hubungi Kami</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Lembaga Pengkajian Dan Pengamalan Islam</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Telp : (0281) 636751, 630463, 63424 </a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Email : lppi@umb.ac.id</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Email : </a>
                    </li>

                    <li>
                        <a href="https://umb.ac.id/" class="footer-link">Web Universitas Muhammadiyah Bengkulu</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Whatsapp</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Admin Ikhwan : 085846139614 </a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Admin Akhwat : 085846139614</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Alamat</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Kampus 1 : Jl. Bali, Kp. Bali, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Kampus 2 : Jl. Salak Raya, Padang Nangka, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225, Indonesia</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Kampus 3 : JL. S. Parman, No. 25, Padang Jati, Penurunan, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222</a>
                    </li>
                    <li>

                        <a href="#" class="footer-link">Kampus 4 : Jl. H. Adam Malik No.17, Cemp. Permai, Kec. Gading Cempaka, Kota Bengkulu, Bengkulu 38221</a>
                    </li>

                </ul>

            </div>

            <div class="footer-bottom">

                <p class="copyright">
                    &copy; 2024 LPPI Universitas Muhammadiyah Bengkulu. All Rights Reserved by Ikhwan Fauzi
                </p>

                <ul class="footer-bottom-list">

                    <li>
                        <a href="#" class="footer-bottom-link">Terms and conditions</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">Privacy policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">Login</a>
                    </li>

                </ul>

            </div>

        </div>
    </footer>





    <!--
    - #BACK TO TOP
  -->

    <a href="#top" class="back-top-btn has-after active" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>





    <!--
    - custom js link
  -->
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/drop_script.js"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
