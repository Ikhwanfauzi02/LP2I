<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin') {
    header('Location: admin_beranda.php');
} elseif (isset($_SESSION['user_id']) && $_SESSION['role'] === 'operator') {
    header('Location: admin_beranda.php');
} elseif (isset($_SESSION['user_id']) && $_SESSION['role'] === 'mahasiswa') {
    header('Location: admin_beranda.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPPI Universitas Muhammadiyah Bengkulu</title>

    <!--
    - favicon
    -->
    <link rel="shortcut icon" href="./assets/img/umb.png">

    <!--
    - custom css link
    -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--
    - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">


</head>

<body id="top">

    <!--- #HEADER-->
    <header class="header" data-header>
        <nav class="container d-flex justify-content-between align-items-center">
            <!-- Kolom Pertama: Logo LPPI-UMB -->
            <div class="header-column">
                <h2 style="color: black;">LPPI-UMB</h2>
            </div>

            <!-- Kolom Kedua: Navigasi -->
            <nav class="navbar header-column" data-navbar>
                <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                    <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
                </button>
                <ul class="navbar-list d-flex align-items-center">
                    <li class="navbar-item">
                        <a href="#home" class="navbar-link" data-nav-link>Beranda</a>
                    </li>
                    <li class="navbar-item dropdown">
                        <a href="#" class="navbar-link dropdown-toggle" data-nav-link>Profil</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Sejarah</a></li>
                            <li><a href="#">Visi</a></li>
                            <li><a href="#">Misi</a></li>
                        </ul>
                    </li>
                    <li class="navbar-item">
                        <a href="#service" class="navbar-link" data-nav-link>Program</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#blog" class="navbar-link" data-nav-link>Berita</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#download" class="navbar-link" data-nav-link>Download</a>
                    </li>
                    <li class="navbar-item">
                        <a href="https://umb.ac.id/" class="navbar-link" data-nav-link>UMB Web</a>
                    </li>
                </ul>
            </nav>

            <!-- Kolom Ketiga: Akun/Tombol Sign In -->
            <div class="">
                <a href="front_end/login.php" class="btn btn-primary has-before has-after">Sign In</a>
            </div>
            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>
            <div class="overlay" data-nav-toggler data-overlay></div>
        </nav>
    </header>




    <main>
        <article>

            <!--
        - #HERO
      -->

            <section class="section hero" id="home" aria-label="hero">
                <div class="container">

                    <div class="hero-content">

                        <h1 class="h1 hero-title">
                            Lembaga <span class="has-before">Pengkajian</span> Dan Pengamalan Islam (LPPI)
                        </h1>
                        <h1>
                            Universitas Muhammadiyah Bengkulu
                        </h1>

                        <p class="hero-text">
                            Selamat Datang di Website Official LPPI UM Bengkulu.
                        </p>

                        <p class="hero-text">
                            Silahkan <span><a href="front_end/login.php">Login</a></span> terlebih dahulu
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
                        <img src="./assets/img/um-bengkulu.jpg" width="794" height="637" alt="hero banner" class="w-100">
                    </figure>

                </div>
            </section>





            <!--
        - #SERVICE
    -->

            <section class="section service" id="service" aria-label="service">
                <div class="container">

                    <p class="section-subtitle has-before text-center">Program</p>

                    <h2 class="h2 section-title text-center">Tentang Program</h2>

                    <ul class="grid-list">

                        <li>
                            <div class="service-card" style="--color: 174, 77%, 50%">

                                <div class="card-icon">
                                    <img src="./assets/img/BBA.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Bimbingan Baca Al-Qur'an (BBA)</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 267, 76%, 57%">

                                <div class="card-icon">
                                    <img src="./assets/img/service-icon-2.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Kuliah Intensif Al Islam (KIAI)</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 17, 100%, 68%">

                                <div class="card-icon">
                                    <img src="./assets/img/service-icon-3.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Baitul Arqam (BA)</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 343, 98%, 60%">

                                <div class="card-icon">
                                    <img src="./assets/img/service-icon-4.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Human Resources</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 210, 100%, 53%">

                                <div class="card-icon">
                                    <img src="./assets/img/service-icon-5.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Design and Vreatives</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 157, 89%, 44%">

                                <div class="card-icon">
                                    <img src="./assets/img/service-icon-6.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Meketing and Communication</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 52, 98%, 50%">

                                <div class="card-icon">
                                    <img src="./assets/img/service-icon-7.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Business Development</a>
                                </h3>

                            </div>
                        </li>

                        <li>
                            <div class="service-card" style="--color: 52, 98%, 50%">

                                <div class="card-icon">
                                    <img src="./assets/img/service-icon-7.png" width="30" height="30" loading="lazy" alt="service icon">
                                </div>

                                <h3 class="h3">
                                    <a href="#" class="card-title">Business Development</a>
                                </h3>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>




            <!--
        - #BLOG
    -->

            <section class="section blog" id="blog" aria-label="blog">
                <div class="container">

                    <p class="section-subtitle text-center has-before">Berita</p>

                    <h2 class="h2 section-title text-center">
                        Berita Terbaru</span>
                    </h2>

                    <ul class="blog-list">

                        <li>
                            <div class="blog-card large">

                                <figure class="card-banner">
                                    <img src="./assets/img/blog-1.jpg" width="644" height="363" loading="lazy" alt="Godaddy user flow solution..." class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">
                                        <a href="#" class="tag">Development</a>

                                        <a href="#" class="publish-date">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">July 22, 2022</span>
                                        </a>
                                    </div>

                                    <h3>
                                        <a href="#" class="card-title">Godaddy user flow solution...</a>
                                    </h3>

                                    <p class="card-text">
                                        At Pixology we specialize in designing, building, shipping and scaling beautifu.
                                        At Pixology we
                                        specialize in designing,
                                        building, shipping and scaling beautiful.
                                    </p>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner">
                                    <img src="./assets/img/blog-2.jpg" width="202" height="162" loading="lazy" alt="Godaddy user flow solution for every individual" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">
                                        <a href="#" class="tag">Development</a>

                                        <a href="#" class="publish-date">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">July 21, 2020</span>
                                        </a>
                                    </div>

                                    <h3 class="h3">
                                        <a href="#" class="card-title">Godaddy user flow solution for every
                                            individual</a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner">
                                    <img src="./assets/img/blog-3.png" width="202" height="162" loading="lazy" alt="Business solution for every individual" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">
                                        <a href="#" class="tag">Development</a>

                                        <a href="#" class="publish-date">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">July 21, 2020</span>
                                        </a>
                                    </div>

                                    <h3 class="h3">
                                        <a href="#" class="card-title">Business solution for every
                                            individual</a>
                                    </h3>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner">
                                    <img src="./assets/img/blog-4.png" width="202" height="162" loading="lazy" alt="How to gain pro experience ar figma update version" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">
                                        <a href="#" class="tag">Development</a>

                                        <a href="#" class="publish-date">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">July 21, 2020</span>
                                        </a>
                                    </div>

                                    <h3 class="h3">
                                        <a href="#" class="card-title">How to gain pro experience ar figma
                                            update version</a>
                                    </h3>

                                </div>

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
                        <a href="#" class="footer-link">Contact Ikhwan : 085846139614 </a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Contact Akhwat : 085846139614</a>
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
                        <a href="../front_end/register_admin.php" class="footer-bottom-link">Sign In</a>
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
    <script src="assets/js/script.js"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>