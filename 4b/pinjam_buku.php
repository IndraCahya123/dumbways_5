<?php

require('./controller.php');

$id = $_GET['id'];

if (pinjamBuku($id) > 0) {
    echo ("<script>
        alert('Buku berhasil dipinjam');
        document.location.href = 'index.php';
    </script>");
} else {
    echo ("<script>
        alert('Buku gagal dipinjam');
        document.location.href = './index.php';
    </script>");
}