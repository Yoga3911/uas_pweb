<?php
require_once "db/db.php";
session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
}

$getAvatar = "SELECT * FROM user WHERE id = '$_SESSION[user_id]'";
$resultUser = $conn->query($getAvatar)->fetch_assoc();

if (isset($_GET["group"])) {
    $abjad = $_GET["group"];
    $query = "SELECT * FROM film WHERE title LIKE '$abjad%'";
    $result = $conn->query($query);
    $count = $result->num_rows;
    if ($conn->query($query)->num_rows == 0) {
        $count = 0;
    }
} else {
    if (isset($_GET['halaman'])) {
        $query = "SELECT * FROM film ORDER BY film_id DESC LIMIT {$_GET['halaman']}, 9";
    } else {
        $query = "SELECT * FROM film ORDER BY film_id DESC LIMIT 0, 9";
    }
    $result = $conn->query($query);
    $query2 = "SELECT * FROM film";
    $result2 = $conn->query($query2);
    $count = $result2->num_rows;
}
$query2 = "SELECT * FROM film";
$result2 = $conn->query($query2);
$count2 = $result2->num_rows;
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
    <link href="style/style.css" rel="stylesheet">
    <title>Main</title>
</head>

<body>
    <div class='fluid-container'>
        <div class='wrapper-nav'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <img src="img/avatar<?= $resultUser['avatar'] ?>.png" data-bs-toggle="modal" data-bs-target="#formUser" style="cursor: pointer;">
                    <a class="navbar-brand mx-2 userModal" href="main.php" data-bs-toggle="modal" data-bs-target="#formUser" data-id="<?= $resultUser['id'] ?>"><?= $resultUser['username'] ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="main.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Group by A - J
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="main.php?group=A">A</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=B">B</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=C">C</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=D">D</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=E">E</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=F">F</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=G">G</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=H">H</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=I">I</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=J">J</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    K - T
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="main.php?group=K">K</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=L">L</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=M">M</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=N">N</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=O">O</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=P">P</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=Q">Q</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=R">R</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=S">S</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=T">T</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    U - Z
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="main.php?group=U">U</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=V">V</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=W">W</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=X">X</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=Y">Y</a></li>
                                    <li><a class="dropdown-item" href="main.php?group=Z">Z</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success modalTambah" id="tambah" type="submit" style="width: 180px;" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Film</button>
                        </form>
                        <a class="btn btn-danger mx-2" href="auth/logout.php" onclick="return confirm('Apakah anda yakin?')">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class='wrapper'>
            <div class='ti1' style="visibility: hidden;">
                <p class="text-center myTitle">Most Popular Film</p>
            </div>
            <?php if (isset($_COOKIE['berhasil'])) : ?>
                <div class="container" style="width: 40%;">
                    <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                        <strong>Film</strong> berhasil ditambahkan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php elseif (isset($_COOKIE['failed'])) : ?>
                <div class="container" style="width: 40%;">
                    <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert">
                        <strong>Film</strong> gagal ditambahkan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php elseif (isset($_COOKIE['berhasilUp'])) : ?>
                <div class="container" style="width: 40%;">
                    <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                        <strong>Film</strong> berhasil diubah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php elseif (isset($_COOKIE['failedUp'])) : ?>
                <div class="container" style="width: 40%;">
                    <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert">
                        <strong>Film</strong> gagal diubah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
            <div class='title d-flex justify-content-end'>
                <div class='ti2'>
                    <p class="text-center myTitle2" id="clock"><?php date_default_timezone_set('Asia/Jakarta');
                                                                echo date("Y-m-d H:i:s"); ?></p>
                </div>
            </div>
            <div class='title2 d-flex justify-content-end'>
                <div class='ti3'>
                    <p class="text-center myTitle2">Total Film: <?= $count ?></p>
                </div>
            </div>
            <div class='row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3'>
                <?php if ($count != 0) : ?>
                    <?php $co = 1 ?>
                    <?php foreach ($result as $i) : ?>
                        <div class='col mb-5'>
                            <div class="card myCard" style="width: 18rem; height: 75vh;">
                                <img src="img/gmb<?= $co ?>.jpg" class="card-img-top" alt="img">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: 800;"><?= $i["title"]; ?></h5>
                                    <div class='' style="font-size: 12px;">
                                        Tahun rilis: <?= $i["release_year"]; ?>
                                    </div>
                                    <p class="card-text"><?= $i["description"]; ?></p>
                                </div>
                                <div class='mb-3 mx-3'>
                                    <a style="width: fit-content;" href="" class="btn btn-primary aksi modalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $i['film_id'] ?>">Ubah</a>
                                    <a style="width: fit-content;" href="db/delete.php?id=<?= $i['film_id'] ?>" class="btn btn-danger aksi" onclick="return confirm('Apakah anda yakin ingin menghapus film ini?')">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <?php if ($co == 9) $co = 0;
                        $co++ ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class='text-center' style="color: white; height: 350px;">
                        <h2>Film tidak ditemukan</h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($count == $count2) : ?>
            <div class="d-flex justify-content-center my-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="?halaman=0">First</a></li>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?php if (isset($_GET['halaman'])) {
                                                                    if ($_GET['halaman'] > 0) echo $_GET['halaman'] - 9;
                                                                    else echo 0;
                                                                } else echo 0; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?php if (isset($_GET['halaman'])) {
                                                                    if ($_GET['halaman'] <= $count2 - 9) echo $_GET['halaman'] + 9;
                                                                    else echo $_GET['halaman'];
                                                                } else echo 9; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $count2 - 8 ?>">Last</a></li>
                    </ul>
                </nav>
            </div>
        <?php endif ?>
    </div>
    <div class='fluid-container bottom' style="background-color: white; width: 101%; height: 40px;">
        <h3 class="text-center" style="visibility: hidden; font-size: 5px;">dummy</h3>
        <h3 class="text-center" style="font-size: 22px;">Liandri Eko Prayugo</h3>
        <h3 class="text-center" style="font-size: 16px;">202410102008</h3>
        <h3 class="text-center" style="visibility: hidden; font-size: 3px;">dummy</h3>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable bg-dark">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel" style="color: white">Tambah Film</h5>
                    <button style="color:white !important;" type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="db/create.php">
                        <input type="hidden" class="form-control" id="film_id" name="film_id">
                        <div class="mb-3">
                            <label for="title" class="form-label" style="color: white">Judul Film</label>
                            <input autocomplete=off required type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label" style="color: white">Deskripsi</label>
                            <textarea rows="4" type="text" class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="length" class="form-label" style="color: white">Durasi Film (Menit)</label>
                            <input autocomplete=off required type="text" class="form-control" id="length" name="length">
                        </div>
                        <div class="mb-3">
                            <label for="release_year" class="form-label" style="color: white">Tahun Rilis</label>
                            <input autocomplete=off required type="text" class="form-control" id="release_year" name="release_year">
                        </div>
                        <div class="mb-3">
                            <label for="language_id" style="color: white" class="form-label">Bahasa</label>
                            <select name="language_id" id="language_id" class="form-select form-select-md mb-4 pilihJenis" aria-label=".form-select-lg example">
                                <option selected value="1">English</option>
                                <option value="2">Italian</option>
                                <option value="3">Japanese</option>
                                <option value="4">Mandarin</option>
                                <option value="5">French</option>
                                <option value="6">German</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rental_duration" class="form-label" style="color: white">Durasi Sewa</label>
                            <input autocomplete=off required type="text" class="form-control" id="rental_duration" name="rental_duration">
                        </div>
                        <div class="mb-3">
                            <label for="rental_rate" class="form-label" style="color: white">Harga Film (Dollar)</label>
                            <input autocomplete=off required type="text" class="form-control" id="rental_rate" name="rental_rate">
                        </div>
                        <div class="mb-3">
                            <label for="replacement_cost" class="form-label" style="color: white">Biaya Pengganti (Dollar)</label>
                            <input autocomplete=off required type="text" class="form-control" id="replacement_cost" name="replacement_cost">
                        </div>
                        <div class="mb-3">
                            <label for="rating" style="color: white" class="form-label">Rating</label>
                            <select name="rating" id="rating" class="form-select form-select-md mb-4 pilihJenis" aria-label=".form-select-lg example">
                                <option selected value="1">G</option>
                                <option value="2">PG</option>
                                <option value="3">PG-13</option>
                                <option value="4">R</option>
                                <option value="5">NC-17</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                            <a href="main.php" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal User -->
    <div class="modal fade" id="formUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="font-weight: 700;">Edit your profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="db/updateUser.php">
                        <input type="hidden" class="form-control" id="id" name="id">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <select name="avatar" id="avatar" class="form-select form-select-md mb-4 pilihJenis" aria-label=".form-select-lg example">
                                <option selected value="1">Default</option>
                                <option value="2">Male</option>
                                <option value="3">Female</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/script1.js"></script>

</body>

</html>