<?php

require('./controller.php');

$id = $_GET['id'];

if (hapusKategori($id) > 0) {
    echo ("<script>
        alert('Kategori berhasil dihapus');
        document.location.href = './categories.php';
    </script>");
} else {
    echo ("<script>
        alert('Kategori gagal dihapus');
        document.location.href = './categories.php';
    </script>");
}