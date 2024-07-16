<?php
session_start();
include '../config.php';
include '../back_end/tagname.php';
// Periksa apakah pengguna sudah login dan memiliki role 'operator'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'operator') {
    // Jika tidak, redirect ke halaman login
    header('Location: ../back_end/no_access.php');
    exit;
}
$head = '../components/head_mahasiswa.html';
$navbar = '../components/navbar_programop.html';
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
                                    <a href="../front_end/table_mhsba.php" class="card-title">Daftar Mahasiswa Baru Baitul Arqom (BA)</a>
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
                                    <a href="../front_end/grade_bamhs.php" class="card-title">Nilai Baitul Arqom (BA)</a>
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
    <!--- #FOOTER-->
    <?php @include ($footer); ?>
    <!--- #FOOTER-->

    <a href="#top" class="back-top-btn has-after active" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>
    <!--- custom js link-->
    <script src="../assets/js/script.js" defer></script>
    <script src="../assets/js/drop_script.js"></script>

    <!--- ionicon link-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
