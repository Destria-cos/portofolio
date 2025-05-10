<?php
include '../koneksi.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM buku WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahun_terbit = $_POST['tahun_terbit'];
  $deskripsi = $_POST['deskripsi'];
  $link = $_POST['link'];
  
  // Handle file upload
  $gambar = $data['gambar']; // Default to existing image
  if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }
    
    $fileTmpPath = $_FILES['gambar']['tmp_name'];
    $fileName = $_FILES['gambar']['name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $newFileName = uniqid() . '.' . $fileExt;
    $destPath = $uploadDir . $newFileName;
    
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileExt, $allowedTypes)) {
      if (move_uploaded_file($fileTmpPath, $destPath)) {
        // Delete old image if exists
        if (!empty($data['gambar']) && file_exists($data['gambar'])) {
          unlink($data['gambar']);
        }
        $gambar = $destPath;
      }
    }
  }

  $conn->query("UPDATE buku SET 
    judul='$judul', 
    penulis='$penulis', 
    penerbit='$penerbit', 
    tahun_terbit='$tahun_terbit',
    deskripsi='$deskripsi',
    link='$link',
    gambar='$gambar'
    WHERE id=$id");
  
  header("Location: perpustakaan.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Edit Buku</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Penulis</label>
      <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Penerbit</label>
      <input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tahun Terbit</label>
      <input type="text" name="tahun_terbit" value="<?= htmlspecialchars($data['tahun_terbit']) ?>" class="form-control" required maxlength="4">
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label>Link</label>
      <input type="text" name="link" value="<?= htmlspecialchars($data['link']) ?>" class="form-control">
    </div>
    <div class="mb-3">
  <label>Gambar Saat Ini</label>
  <?php if (!empty($data['gambar'])): ?>
    <img src="<?= $data['gambar'] ?>" class="img-thumbnail mb-2" style="max-height: 200px; display: block;">
  <?php else: ?>
    <p>Tidak ada gambar</p>
  <?php endif; ?>
  <label>Ubah Gambar</label>
  <input type="file" name="gambar" class="form-control" accept="image/*">
  <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
</div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="perpustakaan.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>