<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header('Location: ../back_end/no_access.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/icon/umb.png">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/buttons.css">
    <link rel="stylesheet" href="../assets/css/formlogin.css">
    <link rel="stylesheet" href="../assets/css/loader.css"> 
    <link rel="stylesheet" href="../assets/css/buttonback.css">
    <link rel="stylesheet" href="https://www.nerdfonts.com/assets/css/webfont.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/img/umb.png">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script defer src="../assets/js/formlogin.js"></script>
    <script defer src="../assets/js/loader.js"></script>
    <script defer src="../assets/js/field.js"></script>
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

    <!-- Section: Design Block -->
    <main class="container d-flex justify-content-center align-items-center vh-100 py-5 px-5">
        <section class="row gx-lg-5 d-flex justify-content-center align-items-center py-5">
            <article class="col-lg-6 mb-2 mb-lg-0 my-3">
                <header>
                    <h1 class="mb-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Website Official LP2I<br /> UM<span style="color: hsl(218, 81%, 75%)">Bengkulu</span>
                    </h1>
                </header>
                <p>
                    Aplikasi Legalisir Ijazah dan Transkrip Akademik adalah fasilitas website
                    yang disediakan untuk keperluan legalisir di Universitas Muhammadiyah Bengkulu.<br>
                    Dapatkan legalisir anda <span style="color: hsl(218, 85%, 62%)">kapanpun dan dimanapun</span>
                    tanpa keluar rumah!
                    <br />Tertarik untuk mencoba? Yuk segera daftar!
                </p>
            </article>

            <!-- Card-->
            <aside class="col-lg-6 mb-5 mb-lg-0 my-4">
                <article class="custom-card bg-glass-dark">
                    <article class="card-body px-4 py-5 px-md-5">
                        <form action="../back_end/gantipass.php" method="POST">
                            <header class="form-outline mb-4">
                                <label class="form-label form-label-white letter-spacing d-flex"><span
                                style="font-size: 1.8rem; font-family: 'Open Sans', Times, serif;">Change Password</span></label>
                            </header>
					
                            <!-- Old Password input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="password" style="font-family: 'Open Sans', Times, serif;">Old Password
                                    :</label>
                                <article class="input-group">
                                    <input type="password" id="old_password" name="old_password"
                                        class="form-control input-glass" aria-describedby="passwordHelpBlock" style="font-family: 'Open Sans', Times, serif;" placeholder="Old Password" required>
                                    <a class="input-group-text input-glass" style="text-decoration:none"
                                        onclick="apala()">
                                        <i id="toggleIcon" class="nf nf-fa-eye_slash"></i>
                                    </a>
                                </article>
                            </article>
							
                            <!-- New Password input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="new_password" style="font-family: 'Open Sans', Times, serif;">New Password
                                    :</label>
                                <article class="input-group">
                                    <input type="password" id="new_password" name="new_password"
                                        class="form-control input-glass" aria-describedby="passwordHelpBlock" style="font-family: 'Open Sans', Times, serif;" placeholder="New Password" required>
                                    <a class="input-group-text input-glass" style="text-decoration:none"
                                        onclick="apala()">
                                        <i id="toggleIcon" class="nf nf-fa-eye_slash"></i>
                                    </a>
                                </article>
                            </article>

                            <!-- Confirm Password input -->
                            <article class="form-outline mb-2">
                                <label class="form-label form-label-white letter-spacing d-flex" for="confirm_password" style="font-family: 'Open Sans', Times, serif;">Confirm Password
                                    :</label>
                                <article class="input-group">
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        class="form-control input-glass" aria-describedby="passwordHelpBlock" style="font-family: 'Open Sans', Times, serif;" placeholder="Confirm Password" required>
                                    <a class="input-group-text input-glass" style="text-decoration:none"
                                        onclick="apala()">
                                        <i id="toggleIcon" class="nf nf-fa-eye_slash"></i>
                                    </a>
                                </article>
                                <article id="passwordHelpBlock" class="col-auto form-text mb-4 d-flex"
                                    style="color:whitesmoke;">
                                    Must be 5-20 characters long.
                                </article>
                            </article>
							
                            <!-- Submit button -->
                            <article class="d-grid gap-2">
                                <button type="submit" name="submit" id="submitBtn"
                                    class="preload-submit button-register2 mb-4" style="font-family: 'Open Sans', Times, serif; font-weight: bold;">Register</button>
                            </article>
                        </form>
                    </article>
                </article>
            </aside>
        </section>
    </main>
</body>
</html>