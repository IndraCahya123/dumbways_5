<?php

$host = 'localhost';
$username = 'root';
$password = "";
$db = 'library';

$conn = mysqli_connect($host, $username, $password, $db, 3306);

function lihatData($query)
{
    global $conn;

    $data = mysqli_query($conn, $query);
    
    $rows = [];

    if($data === null){
        return $rows;
    }else{    
        while($row = mysqli_fetch_assoc($data)){
            $rows[] = $row;
        }
        return $rows;
    }
}

function upload()
{
    $nama = $_FILES['image_book']['name'];
    $ukuran = $_FILES['image_book']['size'];
    $error = $_FILES['image_book']['error'];
    $tmp = $_FILES['image_book']['tmp_name'];
    
    if ($error === 4) {
        echo `
            <script>
                alert('Foto Belum Dipilih!');
            </script>
        `;

        return false;
    }

    $typeFile = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $nama);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $typeFile)) {
        echo `
            <script>
                alert('Foto Sekolah Harus Berupa Gambar!');
            </script>
        `;

        return false;
    }

    if ($ukuran > 2000000) {
        echo `
            <script>
                alert('Foto Sekolah Harus Berukuran Kurang Dari 2MB!');
            </script>
        `;

        return false;
    }

    $generateNameFile = uniqid();
    $generateNameFile .= '.';
    $generateNameFile .= $ekstensiFile;

    move_uploaded_file($tmp, './image/'.$generateNameFile);

    return $generateNameFile;
}

function tambahBuku($data){
    global $conn;

    $name_book = htmlspecialchars($data['name_book']);
    $stok = htmlspecialchars($data['stok']);
    $description = htmlspecialchars($data['description']);
    $category_id = htmlspecialchars($data['category']);

    $stok_int = intval($stok);
    $cat_id_int = intval($category_id);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO books VALUES
                ('', '$name_book', $stok_int, '$foto', '$description', $cat_id_int);";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahDataKategori($data){
    global $conn;

    $name_category = $data['name_category'];

    $query = "INSERT INTO categories VALUES
                ('', '$name_category');";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusKategori($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM categories WHERE id_category = $id");

    return mysqli_affected_rows($conn);
}

function hapusDataBuku($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM books WHERE id_book = $id");

    return mysqli_affected_rows($conn);
}

function kembalikanBuku($id){
    global $conn;

    $select_book = mysqli_query($conn, "SELECT stok FROM books WHERE id_book = $id");

    $stok = mysqli_fetch_assoc($select_book);

    $toInt = intval($stok['stok']);

    $total = $toInt + 1;

    mysqli_query($conn, "UPDATE books set stok = $total where id_book = $id");

    return mysqli_affected_rows($conn);
}

function pinjamBuku($id){
    global $conn;

    $select_book = mysqli_query($conn, "SELECT stok FROM books WHERE id_book = $id");

    $stok = mysqli_fetch_assoc($select_book);

    $toInt = intval($stok['stok']);

    $total = $toInt - 1;

    mysqli_query($conn, "UPDATE books set stok = $total where id_book = $id");

    return mysqli_affected_rows($conn);
}