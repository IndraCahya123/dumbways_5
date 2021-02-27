<?php 

require('controller.php');

$categories = lihatData("SELECT * from categories");

if(isset($_POST['submit'])){
    if (tambahDataKategori($_POST) > 0) {
        echo ("<script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'categories.php';
    </script>");
    } else {
        echo ("<script>
        alert('Data Gagal Ditambahkan');
        document.location.href = 'categories.php';
    </script>");
    }
    
}

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
    <div class="wrapper w-75 m-auto">
        <div class="top-content d-flex justify-content-between align-items-center w-100 px-2">
            <h3>Daftar Kategori</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
                Tambah Kategori
            </button>
        </div>
        <hr class="w-100">
        <div class="category-list w-75 m-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Id Kategori</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <th scope="row"><?= $category['id_category'] ?></th>
                        <td><?= $category['name_category'] ?></td>
                        <td>
                            <a href="" type="button" class="btn-sm btn-primary">Ubah</a>
                            <a href="./hapus_kategori.php?id=<?= $category['id_category'] ?>" type="button" class="btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- add modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_category">Nama Kategori</label>
                        <input type="text" class="form-control" id="name_category" name="name_category">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>