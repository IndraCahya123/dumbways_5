<?php

require('./controller.php');

$id = $_GET['id'];

if (kembalikanBuku($id) > 0) {
    echo ("<script>
        alert('Buku berhasil dikembalikan');
        document.location.href = 'index.php';
    </script>");
} else {
    echo ("<script>
        alert('Buku gagal dikembalikan');
        document.location.href = './index.php';
    </script>");
}