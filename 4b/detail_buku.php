<?php

require './controller.php';

$id = $_GET['id'];

$select = lihatData("SELECT * FROM books where id_book = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Dumbways Library</title>
</head>
<body>
<nav style="position: fixed; top: 0;" class="navbar navbar-expand-lg navbar-light bg-light w-100">
    <a class="navbar-brand" href="./index.php">Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="./index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="./categories.php">Categories</a>
        </div>
    </div>
</nav>

<main style="margin-top: 100px;">
    <div class="wrapper w-75 m-auto d-flex justify-content-around">
        <div class="img-book w-50">
            <img width="100%" height="100%" src=".../100px180/" alt="<?= $select['image'] ?>">
        </div>
        <div class="desc-book">
            <h3><?= $select['name_book'] ?></h3>
            <hr class="w-100">
            <h5><?= $select['description'] ?></h5>
            <a href="" type="button" class="btn btn-primary">Ubah</a>
            <a href="./hapus_buku.php?id=<?= $select['id_book'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Hapus</a>
        </div>
    </div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>