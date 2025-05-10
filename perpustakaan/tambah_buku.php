<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];

    // Menangani gambar
    $gambar = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = time() . '_' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $gambar);
    }

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, deskripsi, link, gambar) 
            VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi', '$link', '$gambar')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: perpustakaan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Tambah Buku</h2>
  <form action="tambah_buku.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul Buku</label>
      <input type="text" class="form-control" id="judul" name="judul" required>
    </div>
    <div class="mb-3">
      <label for="penulis" class="form-label">Penulis Buku</label>
      <input type="text" class="form-control" id="penulis" name="penulis" required>
    </div>
    <div class="mb-3">
      <label for="penerbit" class="form-label">Penerbit Buku</label>
      <input type="text" class="form-control" id="penerbit" name="penerbit" required>
    </div>
    <div class="mb-3">
      <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
      <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi Buku</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
    </div>
    <div class="mb-3">
      <label for="link" class="form-label">Link Web Buku</label>
      <input type="url" class="form-control" id="link" name="link">
    </div>
    <div class="mb-3">
      <label for="gambar" class="form-label">Gambar Buku</label>
      <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
    <button type="submit" class="btn btn-primary">Tambah Buku</button>
  </form>
</div>
</body>
</html>
