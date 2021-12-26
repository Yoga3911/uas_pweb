<?php
require_once "db/db.php";

if (isset($_GET["group"])) {
    $abjad = $_GET["group"];
    $query = "SELECT * FROM film WHERE title LIKE '$abjad%' LIMIT 9";
    $result = $conn->query($query);
    $count = $result->num_rows;
    if ($conn->query($query)->num_rows == 0) {
        $count = 0;
    }
} else {
    $query = "SELECT * FROM film LIMIT 9";
    $result = $conn->query($query);
    $count = $result->num_rows;
}
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
    <link href="style/style2.css" rel="stylesheet">
    <title>FILM</title>
</head>

<body>
    <div class='fluid-container'>
        <div class='wrapper-nav'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="">Cinema</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Group by A - J
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="index.php?group=A">A</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=B">B</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=C">C</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=D">D</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=E">E</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=F">F</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=G">G</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=H">H</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=I">I</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=J">J</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    K - T
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="index.php?group=K">K</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=L">L</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=M">M</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=N">N</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=O">O</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=P">P</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=Q">Q</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=R">R</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=S">S</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=T">T</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    U - Z
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="index.php?group=U">U</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=V">V</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=W">W</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=X">X</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=Y">Y</a></li>
                                    <li><a class="dropdown-item" href="index.php?group=Z">Z</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit" style="width: 180px;">Tambah Film</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class='wrapper'>
            <div class='ti1' style="visibility: hidden;">
                <p class="text-center myTitle">Most Popular Film</p>
            </div>
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
                    <?php $count = 1 ?>
                    <?php foreach ($result as $i) : ?>
                        <div class='col mb-5'>
                            <div class="card myCard" style="width: 18rem; height: 75vh;">
                                <img src="img/gmb<?= $count ?>.jpg" class="card-img-top" alt="img">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: 800;"><?= $i["title"]; ?></h5>
                                    <p class="card-text"><?= $i["description"]; ?></p>
                                </div>
                                <div class='mb-3 mx-3'>
                                    <a style="width: fit-content;" href="#" class="btn btn-primary aksi">Ubah</a>
                                    <a style="width: fit-content;" href="#" class="btn btn-danger aksi">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <?php if ($count == 9) $count = 0;
                        $count++ ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class='text-center' style="color: white; height: 350px;">
                        <h2>Film tidak ditemukan</h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($count != 0) : ?>
            <div class="d-flex justify-content-center my-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/script.js"></script>
</body>

</html>