<?php
include '../koneksi.php';

// Cek apakah ID dikirim dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file gambar berdasarkan ID
    $stmt = $conn->prepare("SELECT gambar FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        // Jika gambar ada dan file-nya juga ada di folder, hapus
        $gambarPath = "gambar/" . $data['gambar'];
        if (!empty($data['gambar']) && file_exists($gambarPath)) {
            unlink($gambarPath);
        }

        // Hapus data buku dari database
        $deleteStmt = $conn->prepare("DELETE FROM buku WHERE id = ?");
        $deleteStmt->bind_param("i", $id);
        $deleteStmt->execute();
        $deleteStmt->close();
    }

    $stmt->close();
}

// Redirect balik ke halaman utama
header("Location: perpustakaan.php");
exit;
?>
