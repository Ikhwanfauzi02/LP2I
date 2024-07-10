<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin') {
    header('Location: ../front_end/admin_beranda.php');
    exit;
} elseif (isset($_SESSION['user_id']) && $_SESSION['role'] === 'operator') {
    header('Location: ../front_end/operator_beranda.php');
    exit;
} elseif (isset($_SESSION['user_id']) && $_SESSION['role'] === 'mahasiswa') {
    header('Location: ../front_end/mahasiswa_beranda.php');
    exit;
}

// Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/umb.png">
    <link rel="stylesheet" href="../assets/css/buttons.css">
    <link rel="stylesheet" href="../assets/css/formlogin.css">
    <link rel="stylesheet" href="../assets/css/loader.css">
	<link rel="shortcut icon" href="../assets/img/umb.png">
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
    <title>Log In LP2i UM Bengkulu</title>
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
    <main class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <section class="custom-card d-flex justify-content-center align-items-center bg-glass-dark mb-3 p-4">
            <article class="container-fluid g-3 d-flex align-items-center">
                <figure class="col-6 d-none d-lg-flex justify-content-center">
                    <img src="../assets/img/umb.png"
                        class="w-75 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5 px-2" />
                </figure>
                <aside class="card-body py-4 px-md-4">
                    <form id="loginForm" action="../back_end/cek_login.php" method="POST">
                        <header class="form-outline mb-4">
                            <label class="form-label form-label-white letter-spacing d-flex">
                                <span style="font-size: 2rem; font-family: 'Open Sans', Times, serif;">Log In Form</span></label>
                        </header>
                        <!-- Username-->
                        <article class="form-outline mb-4">
                            <label class="form-label form-label-white letter-spacing d-flex"  for="username" style="font-family: 'Open Sans', Times, serif;">Username :</label>
                            <article class="input-group">
                                <span class="input-group-text input-glass" id="iconuser"><i
                                        class="nf nf-oct-person_fill"></i></span>
                                <input type="text" id="username" name="username" class="form-control input-glass" style="font-family: 'Open Sans', Times, serif;" placeholder="Username"
                                    autofocus />
                            </article>
                        </article>
                        <!-- Password input -->
                        <article class="form-outline mb-4">
                            <label class="form-label form-label-white letter-spacing d-flex" style="font-family: 'Open Sans', Times, serif;" for="password">Password
                                :</label>
                            <article class="input-group">
                                <input style="font-family: 'Open Sans', Times, serif;" type="password" id="password" name="password" placeholder="Password" class="form-control input-glass"
                                    aria-describedby="passwordHelpBlock" required>
                                <a class="input-group-text input-glass" style="text-decoration:none" onclick="apala()">
                                    <i id="toggleIcon" class="nf nf-fa-eye_slash"></i>
                                </a>
								<input type="hidden" name="csrf_token" value="<?=($_SESSION['csrf_token']); ?>">
                            </article>
                        </article>
                        <!-- 2 column grid layout for inline styling -->
                        <article class="row mb-4">
                            <article class="col d-flex justify-content-center">
                                
                            </article>
                            <article class="col">
                                <!-- Simple link -->
                                <a href="#!">Lupa password?</a>
                            </article>
                        </article>
                        <!-- Submit button -->
                        <article class="d-grid gap-2">
                            <button type="submit" name="submit" id="submitBtn"
                                class="preload-submit button-3 mb-4" style="font-family: 'Open Sans', Times, serif; font-weight: bold;">Login</button>
                        </article>
                    </form>
                </aside>
            </article>
        </section>
    </main>
    <!-- footer -->
</body>

</html>