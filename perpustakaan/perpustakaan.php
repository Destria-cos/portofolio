<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Perpustakaan Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      color: #eeeeee;
      background-image: url(cloud.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      padding-top: 56px; /* Untuk offset navbar fixed */
    }
    .clickable-img {
      cursor: pointer;
      transition: transform 0.2s;
    }
    .clickable-img:hover {
      transform: scale(1.02);
    }

    /* CSS untuk card dengan gambar kecil */
    .small-image-card {
        max-width: 200px; /* Sesuaikan ukuran sesuai kebutuhan */
        margin: 0 auto; /* Untuk posisi tengah */
    }
    
    .small-image-card .card-img-top {
        max-height: 150px; /* Sesuaikan tinggi gambar */
    }
    
    .small-image-card .card-body,
    .small-image-card .card-footer {
        padding: 0.5rem; /* Padding yang lebih kecil */
        font-size: 0.9rem; /* Ukuran font lebih kecil */
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="perpustakaan.php">
        <span class="me-2">📚</span>Perpustakaan Online
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="perpustakaan.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
          </li>
        </ul>
        <div class="d-flex">
          <a href="tambah_buku.php" class="btn btn-primary">
            <span class="d-none d-sm-inline">Tambah Buku</span>
            <span class="d-inline d-sm-none">+</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">Daftar Buku</h2>
      <a href="tambah_buku.php" class="btn btn-primary d-lg-none">
        <span>+</span>
      </a>
    </div>
    
    <div class="row">
    <?php
    $result = $conn->query("SELECT * FROM buku");
    while ($row = $result->fetch_assoc()):
        // Cek ukuran gambar
        $imageSize = @getimagesize($row['gambar']);
        $isSmallImage = ($imageSize && $imageSize[0] == 100 && $imageSize[1] == 200);
        $cardClass = $isSmallImage ? 'small-image-card' : '';
    ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow <?= $cardClass ?>">
        <?php if (!empty($row['gambar'])): ?>
        <?php if (!empty($row['link'])): ?>
            <a href="<?= $row['link'] ?>" target="_blank">
                <img src="<?= $row['gambar'] ?>" class="card-img-top clickable-img" alt="<?= $row['judul'] ?>" 
                    style="aspect-ratio: 3/4; object-fit: cover; width: 100%;">
            </a>
        <?php else: ?>
            <img src="<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['judul'] ?>" 
                style="aspect-ratio: 3/4; object-fit: cover; width: 100%;">
        <?php endif; ?>
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?= $row['judul'] ?></h5>
            <p class="card-text"><strong>Penulis:</strong> <?= $row['penulis'] ?></p>
            <p class="card-text"><strong>Penerbit:</strong> <?= $row['penerbit'] ?> (<?= $row['tahun_terbit'] ?>)</p>
            <p class="card-text text-truncate"><?= $row['deskripsi'] ?></p>
            <?php if (!empty($row['link'])): ?>
                <a href="<?= $row['link'] ?>" class="btn btn-outline-info btn-sm" target="_blank">Baca Buku</a>
            <?php endif; ?>
        </div>
        <div class="card-footer bg-transparent d-flex justify-content-between">
            <a href="edit_buku.php?id=<?= $row['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
            <a href="hapus_buku.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
        </div>
        </div>
    </div>
    <?php endwhile; ?>
   </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>