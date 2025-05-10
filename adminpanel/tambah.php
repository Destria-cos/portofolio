<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = '';

    if ($_FILES['gambar']['name']) {
        $gambar = time() . '_' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
    }

    $stmt = $conn->prepare("INSERT INTO sertifikat (judul, deskripsi, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $judul, $deskripsi, $gambar);
    $stmt->execute();
    header("Location: portofolio.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sertifikat</title>
    <style>
    /* Base Styles */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #e0f7fa 0%, #4fc3f7 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin: 0;
        line-height: 1.5;
    }

    /* Form Container */
    .form-container {
        width: 100%;
        max-width: 28rem;
        background: rgba(255, 255, 255, 0.95);
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 76, 153, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { 
            opacity: 0; 
            transform: translateY(20px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0); 
        }
    }

    /* Typography */
    h2 {
        color: #1e3a8a;
        font-size: 1.75rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.5rem;
        position: relative;
    }

    h2::after {
        content: '';
        width: 60px;
        height: 3px;
        background: #60a5fa;
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    label {
        color: #1e40af;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: block;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.25rem;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #93c5fd;
        border-radius: 0.5rem;
        background: #f0f9ff;
        color: #1e3a8a;
        font-size: 0.9375rem;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    input[type="file"] {
        padding: 0.5rem 0;
        background: transparent;
        border: none;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    input[type="text"]:focus,
    textarea:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        background: #ffffff;
    }

    /* Button Styles */
    button {
        background: linear-gradient(90deg, #2563eb, #60a5fa);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        border: none;
        font-weight: 600;
        font-size: 0.9375rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        font-family: inherit;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
    }

    button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.2), 
            transparent);
        transition: 0.5s;
    }

    button:hover::before {
        left: 100%;
    }

    /* Layout Utilities */
    .text-right {
        text-align: right;
    }

    /* Responsive Adjustments */
    @media (max-width: 640px) {
        .form-container {
            padding: 1.5rem;
            margin: 0 1rem;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
        }

        h2::after {
            width: 50px;
            height: 2px;
            bottom: -6px;
        }
    }

    /* File Input Customization */
    input[type="file"]::-webkit-file-upload-button {
        background: #e0f2fe;
        border: 1px solid #93c5fd;
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
        color: #1e40af;
        font-family: inherit;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    input[type="file"]::-webkit-file-upload-button:hover {
        background: #bfdbfe;
    }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Sertifikat</h2>
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <div class="form-group">
                <label>Judul Sertifikat</label>
                <input type="text" name="judul" required>
            </div>
            
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label>Upload Foto</label>
                <input type="file" name="gambar">
            </div>

            <div class="text-right">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>