<?php

session_start();

if (isset($_SESSION['check'])) {
    header('location: main.php');
    exit;
}

session_destroy();
session_unset();

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
    <link href="style/index1.css" rel="stylesheet">
    <title>Landing</title>
</head>

<body>
    <div class='fluid-container'>
        <div class='container' style="width: 40%;">
            <?php if (isset($_COOKIE["wrong"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password</strong> yang anda masukkan tidak sama!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif (isset($_COOKIE["kosong"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Email atau password</strong> tidak boleh kosong!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif (isset($_COOKIE["error"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Email atau password</strong> yang anda masukkan salah!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (isset($_COOKIE["gagal"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Mohon maaf</strong> email yang anda masukkan sudah terdaftar!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif (isset($_COOKIE["success"])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> akun anda berhasil didaftarkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <div class='tmp'>
            <p class="title text-center" style="cursor: default;">Welcome to Cinema</p>
        </div>
        <div class='tmp2'>
            <button class="title2 myTombol" data-bs-toggle="modal" data-bs-target="#formLogin">Sign In</button>
        </div>
        <div class='tmp3'>
            <p class="title3 myTombol2">Belum punya akun? <a href="" data-bs-toggle="modal" data-bs-target="#formRegister">Daftar disini</a></p>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="font-weight: 700;">Silahkan masuk terlebih dahulu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="auth/login.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="check" id="check">
                            <label class="form-check-label" for="check">Remember be</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="formRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="font-weight: 700;">Silahkan masuk terlebih dahulu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="auth/register.php">
                        <div class="mb-3">
                            <label for="username_r" class="form-label">Username</label>
                            <input required type="text" class="form-control" id="username_r" name="username_r">
                        </div>
                        <div class="mb-3">
                            <label for="email_r" class="form-label">Email address</label>
                            <input required type="email" class="form-control" id="email_r" name="email_r" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password_r" class="form-label">Password</label>
                            <input required type="password" name="password_r" class="form-control" id="password_r">
                            <center>
                                <div class="level mt-3" style="width: 150px;">
                                    <span id="StrengthDisp" class="badge displayBadge">Weak</span>
                                </div>
                            </center>
                        </div>
                        <div class="mb-3">
                            <label for="password2_r" class="form-label">Confirm Password</label>
                            <input required type="password" name="password2_r" class="form-control" id="password2_r">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/index1.js"></script>
</body>

</html>