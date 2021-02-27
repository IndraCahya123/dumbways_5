<?php 

require './controller.php';

$books = lihatData("SELECT * FROM books join categories on books.category_id = categories.id_category");

$categories = lihatData("SELECT * from categories");

if(isset($_POST['submit'])){
    if (tambahBuku($_POST) > 0) {
        echo ("<script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'index.php';
    </script>");
    } else {
        echo ("<script>
        alert('Data Gagal Ditambahkan');
        document.location.href = 'index.php';
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
    <div class="main-wrapper w-75 m-auto">
        <div class="top-content d-flex justify-content-between align-items-center w-100 px-2">
            <h3>Daftar Buku</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBooks">
                Tambah Buku
            </button>
        </div>
        <hr class="w-100 mb-4">
        <div class="books-list d-flex flex-wrap justify-content-around">
            <?php foreach ($books as $book) : ?>
            <div class="card mb-3" style="width: 18rem;">
                <img class="card-img-top" src="./image/<?= $book['image'] ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="body-text mb-3 w-100">
                        <h5 class="card-title"><?= $book['name_book'] ?></h5>
                        <p class="card-text text-secondary">
                            <small>Category : <?= $book['name_category'] ?></small>
                            &middot;
                            <small>Stok : <?= $book['stok'] ?></small>
                        </p>
                        <p class="card-text">
                            <?= $book['description'] ?>
                        </p>
                    </div>
                    <div class="body-button">
                    <?php if ($book['stok'] == 0) { ?>
                        <a href="./pinjam_buku.php?id=<?= $book['id_book'] ?>" class="btn btn-secondary disabled px-4" onclick="return confirm('Pinjam buku <?= $book['name_book'] ?> ?')">Pinjam</a>
                        <a href="./kembalikan.php?id=<?= $book['id_book'] ?>" type="button" class="btn btn-secondary disabled px-4"
                            onclick="return confirm('Kembalikan buku <?= $book['name_book'] ?> ?')">Kembalikan</a>
                        <a href="./detail_buku.php?id=<?= $book['id_book'] ?>" type="button" class="btn btn-primary">Detail</a>
                    <?php } else { ?>
                        <a href="./pinjam_buku.php ?id=<?= $book['id_book'] ?>" class="btn-sm btn-success" onclick="return confirm('Pinjam buku <?= $book['name_book'] ?> ?')">Pinjam</a>
                        <a href="./kembalikan.php?id=<?= $book['id_book'] ?>" type="button" class="btn-sm btn-danger"
                            onclick="return confirm('Kembalikan buku <?= $book['name_book'] ?> ?')">Kembalikan</a>
                        <a href="./detail_buku.php?id=<?= $book['id_book'] ?>" type="button" class="btn-sm btn-primary">Detail</a>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</main>

<div class="modal fade" id="addBooks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_book">Nama Buku</label>
                        <input type="text" class="form-control" id="name_book" name="name_book">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="form-control" id="categories" name="category">
                            <option disabled selected>Select One Category</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" class="form-control-file" id="image" name="image_book">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>