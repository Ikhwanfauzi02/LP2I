<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../assets/icon/umb.png">
<link rel="stylesheet" href="../assets/css/nav.css">
<link rel="stylesheet" href="../assets/css/buttons.css">
<link rel="stylesheet" href="../assets/css/formlogin.css">
<link rel="stylesheet" href="../assets/css/loader.css">
<link rel="stylesheet" href="../assets/css/buttonback.css">
<link rel="stylesheet" href="https://www.nerdfonts.com/assets/css/webfont.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="shortcut icon" href="../assets/img/umb.png">
<script defer src="../assets/js/formlogin.js"></script>
<script defer src="../assets/js/loader.js"></script>
<script defer src="../assets/js/field.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<title>Add Account LP2I UM Bengkulu</title>

</head>

<body class="bg-custom-green">
    <a href="javascript:history.back()" class="back-button">
        <i class="nf nf-fa-arrow_left"></i>
    </a>
    <section id="preloaderSubmit" class="preloader-submit">
        <article class="loader"></article>
    </section>
    <section id="preloaderLink" class="preloader d-flex">
        <article class="loader"></article>
    </section>
    <!-- Back button, preloader, dan lainnya disini -->

    <main class="container d-flex justify-content-center align-items-start vh-100 py-5">
        <section class="row gx-lg-5 d-flex justify-content-center align-items-center py-5">
            <article class="col-lg-6 mb-2 mb-lg-0 my-3">
                <header>
                    <h1 class="mb-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Website Official LP2I<br /> UM<span style="color: hsl(218, 81%, 75%)">Bengkulu</span>
                    </h1>
                </header>
                <p>Aplikasi Legalisir Ijazah dan Transkrip Akademik adalah fasilitas website yang disediakan untuk keperluan legalisir di Universitas Muhammadiyah Bengkulu.<br>Dapatkan legalisir anda kapanpun dan dimanapun tanpa keluar rumah!<br />Tertarik untuk mencoba? Yuk segera daftar!</p>
            </article>

            <aside class="col-lg-6 mb-5 mb-lg-0">
                <article class="custom-card bg-glass-dark">
                    <article class="card-body px-4 py-5 px-md-5">
                        <form action="../back_end/input_register_admin.php" method="POST">
                            <header class="form-outline mb-4">
                                <label class="form-label form-label-white letter-spacing d-flex"><span style="font-size: 1.8rem; font-family: 'Open Sans', Times, serif;">Tambahkan Pengguna</span></label>
                            </header>
                            <!-- Username input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="username" style="font-family: 'Open Sans', Times, serif;">Username:</label>
                                <article class="input-group">
                                    <span class="input-group-text input-glass" id="iconuser"><i class="nf nf-oct-person_fill"></i></span>
                                    <input type="text" id="username" name="username" class="form-control input-glass" style="font-family: 'Open Sans', Times, serif;" placeholder="Username" required />
                                </article>
                            </article>
                            <!-- Nama Lengkap input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="nama_lengkap" style="font-family: 'Open Sans', Times, serif;">Nama Lengkap:</label>
                                <article class="input-group">
                                    <span class="input-group-text input-glass" id="iconuser"><i class="nf nf-oct-person_fill"></i></span>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control input-glass" style="font-family: 'Open Sans', Times, serif;" placeholder="Full name" required />
                                </article>
                            </article>
                            <!-- Email input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="email" style="font-family: 'Open Sans', Times, serif;">Email:</label>
                                <article class="input-group">
                                    <span class="input-group-text input-glass" id="iconemail">@</span>
                                    <input type="email" id="email" name="email" class="form-control input-glass" style="font-family: 'Open Sans', Times, serif;" placeholder="abx@gmail.com" required />
                                </article>
                            </article>
                            <!-- Posisi input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="posisi" style="font-family: 'Open Sans', Times, serif;">Posisi:</label>
                                <article class="input-group">
                                    <span class="input-group-text input-glass" id="iconposisi"><i class="nf nf-fa-briefcase"></i></span>
                                    <input type="text" id="posisi" name="posisi" class="form-control input-glass" style="font-family: 'Open Sans', Times, serif;" placeholder="Posisi" required />
                                </article>
                            </article>
                            <!-- Instansi input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="instansi" style="font-family: 'Open Sans', Times, serif;">Instansi:</label>
                                <article class="input-group">
                                    <span class="input-group-text input-glass" id="iconinstansi"><i class="nf nf-fa-building"></i></span>
                                    <input type="text" id="instansi" name="instansi" class="form-control input-glass" style="font-family: 'Open Sans', Times, serif;" placeholder="Instansi" required />
                                </article>
                            </article>
                            <!-- Password input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="password" style="font-family: 'Open Sans', Times, serif;">Password:</label>
                                <article class="input-group">
                                <input type="password" id="new_password" name="new_password"
                                        class="form-control input-glass" aria-describedby="passwordHelpBlock" style="font-family: 'Open Sans', Times, serif;" placeholder="New Password" required>
                                    <a class="input-group-text input-glass" style="text-decoration:none"
                                        onclick="togglePasswordVisibility('new_password', 'toggleIcon2')">
                                        <i id="toggleIcon2" class="nf nf-fa-eye_slash"></i>
                                    </a>
                                </article>
                                <article id="passwordHelpBlock" class="col-auto form-text mb-4 d-flex" style="color:whitesmoke;">
                                    Must be 5-20 characters long.
                                </article>
                            </article>
                            <!-- Submit button -->
                            <article class="d-grid">
                                <button type="submit" name="register" id="submitBtn" class="preload-submit button-register2 mb-4" style="font-family: 'Open Sans', Times, serif; font-weight: bold;">Register</button>
                            </article>
                        </form>
                    </article>
                </article>
            </aside>
        </section>
    </main>
</body>

</html>