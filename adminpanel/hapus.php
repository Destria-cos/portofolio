<?php
include '../koneksi.php';

// Validasi ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data gambar
    $stmt = $conn->prepare("SELECT gambar FROM sertifikat WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        // Hapus file gambar dari folder jika ada
        $gambarPath = "../uploads/" . $data['gambar'];
        if (!empty($data['gambar']) && file_exists($gambarPath)) {
            unlink($gambarPath);
        }

        // Hapus data dari database
        $deleteStmt = $conn->prepare("DELETE FROM sertifikat WHERE id = ?");
        $deleteStmt->bind_param("i", $id);
        $deleteStmt->execute();
        $deleteStmt->close();
    }

    $stmt->close();
}

header("Location: portofolio.php");
exit;
?>
