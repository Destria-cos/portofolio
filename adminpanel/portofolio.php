<?php
session_start();
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio Saya</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 font-sans leading-relaxed tracking-wide">

<!-- Modal Logout -->
<div id="modalLogout" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative text-center">
    <button onclick="closeLogoutModal()" class="absolute top-2 right-2 text-gray-400 hover:text-red-500">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>
    <h2 class="text-2xl font-bold text-pink-500 mb-4">Konfirmasi Logout 😢</h2>
    <p class="text-gray-700 mb-6">Apakah kamu yakin ingin keluar dari akunmu?<br>Kami akan merindukanmu 😥</p>
    
    <div class="flex justify-center gap-4">
      <button onclick="confirmLogout()" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg font-semibold transition">Ya, Logout</button>
      <button onclick="closeLogoutModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-semibold transition">Batal</button>
    </div>
  </div>
</div>

<!-- Navbar -->
<nav class="bg-white shadow fixed top-0 left-0 w-full z-50 shadow-xl">
  <div class="max-w-6xl mx-auto px-4 py-6 flex justify-between items-center">

    <!-- Logo / Nama -->
    <h1 class="text-2xl font-bold text-indigo-500 flex items-center gap-2">
      <i data-lucide="anchor" class="w-6 h-6 text-pink-500"></i>
      Portofolio Fadillah
    </h1>

    <!-- Menu -->
    <div class="flex items-center space-x-6">
      <a href="#about" class="text-gray-800 hover:text-pink-400 flex items-center gap-1">
        <i data-lucide="user" class="w-5 h-5 text-indigo-500"></i>
        Tentang
      </a>
      <a href="#projects" class="text-gray-800 hover:text-pink-400 flex items-center gap-1">
        <i data-lucide="folder" class="w-5 h-5 text-indigo-500"></i>
        Proyek
      </a>
      <a href="#skills" class="text-gray-800 hover:text-pink-400 flex items-center gap-1">
        <i data-lucide="cpu" class="w-5 h-5 text-indigo-500"></i>
        Keahlian
      </a>
      <a href="#contact" class="text-gray-800 hover:text-pink-400 flex items-center gap-1">
        <i data-lucide="mail" class="w-5 h-5 text-indigo-500"></i>
        Kontak
      </a>
      <!-- Tombol Logout -->
      <a href="#logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition flex items-center gap-1">
        <i data-lucide="log-out" class="w-5 h-5 text-white"></i>
        Logout
      </a>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<header class="bg-indigo-500 text-white shadow pt-28">
  <div class="max-w-6xl mx-auto px-4 py-10 flex flex-col md:flex-row justify-between items-center gap-4">
    <div class="text-center md:text-left">
      <h1 class="text-3xl md:text-4xl font-bold mb-2">Halo, Aku Fadillah Nurwahid 👋</h1>
      <p class="text-lg text-pink-200">Web Developer | Web Creator</p>
    </div>
</header>

<!-- Tentang -->
<section id="about" class="py-16 bg-white">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-4 text-indigo-500">Tentang Saya</h3>
    <p class="text-gray-800 text-lg leading-relaxed">
    Saya adalah Fadillah, seorang pengembang web yang memiliki ketertarikan besar dalam dunia pemrograman, khususnya pada sisi back end dari sebuah website atau aplikasi. Saya menguasai dasar-dasar HTML, CSS, dan JavaScript, serta memiliki sedikit pengalaman dengan framework Tailwind CSS dan React. Dengan kombinasi skill tersebut, saya dapat membangun tampilan dan fungsionalitas dasar sebuah situs web.
<br><br>
Meskipun saya memahami dan bisa mengerjakan bagian front end, saya jauh lebih tertarik pada pengembangan back end. Bagi saya, back end lebih menantang dan menyenangkan karena saya bisa fokus membangun sistem, logika, dan struktur data tanpa harus memikirkan desain visual seperti pada front end. Saya merasa lebih nyaman bekerja di balik layar, memastikan bahwa sistem berjalan dengan lancar dan efisien.
<br><br>
Saya cukup akrab dengan bahasa PHP, yang sering saya gunakan untuk membangun logika aplikasi dan mengelola komunikasi antara server dan database. Saya menikmati proses membangun API, mengatur alur data, hingga memastikan keamanan sistem yang saya buat.
<br><br>
Bagi saya, menjadi seorang developer bukan hanya sekadar menulis kode, tapi juga bagaimana menyelesaikan masalah secara efisien dan memberikan solusi nyata untuk kebutuhan pengguna. Saya percaya bahwa setiap baris kode harus memberikan nilai dan fungsi, serta menjadi bagian dari sistem yang kuat dan dapat diandalkan.
    </p>
  </div>
</section>

<!-- Keahlian -->
<section id="skills" class="py-16 bg-gray-100">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-6 text-indigo-500">Keahlian Saya</h3>
    <ul class="grid grid-cols-2 md:grid-cols-4 gap-4 text-gray-800">
      <li class="flex items-center gap-2"><i data-lucide="code"></i> HTML</li>
      <li class="flex items-center gap-2"><i data-lucide="code"></i> CSS</li>
      <li class="flex items-center gap-2"><i data-lucide="code"></i> JavaScript</li>
      <li class="flex items-center gap-2"><i data-lucide="settings"></i> Git & GitHub</li>
      <li class="flex items-center gap-2"><i data-lucide="server"></i> MySQL</li>
      <li class="flex items-center gap-2"><i data-lucide="layout"></i> UI/UX Design</li>
    </ul>
  </div>
</section>

<!-- Proyek -->
<section id="projects" class="py-16 bg-gray-100">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-6 text-indigo-500">Project Saya</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <a href="../todolist/ToDo_list.php" target="_blank" class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition-all duration-300">
        <h3 class="text-xl font-semibold mb-2">ToDo List App</h3>
        <p class="text-gray-600">Aplikasi pencatat tugas yang dibuat menggunakan HTML, CSS, dan JavaScript.</p>
      </a>
      <a href="../perpustakaan/perpustakaan.php" target="_blank" class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition-all duration-300">
        <h3 class="text-xl font-semibold mb-2">Perpustakaan Online</h3>
        <p class="text-gray-600">Aplikasi perpustakaan yang menyimpan list buku, dibuat dengan HTML, CSS, dan JavaScript.</p>
      </a>
    </div>
  </div>
</section>


<!-- Sertifikat Cards -->
<section class="p-6 bg-white rounded-lg shadow-md mt-6 mx-4">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold text-gray-700">Sertifikat</h2>
    <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah</button>
  </div>
  <table class="w-full text-left border border-gray-300">
    <thead>
      <tr class="bg-gray-100">
        <th class="p-2">Judul</th>
        <th class="p-2">gambar</th>
        <th class="p-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM sertifikat ORDER BY id DESC");
      while ($d = mysqli_fetch_array($data)) {
        echo "<tr class='border-t'>";
        echo "<td class='p-2'>" . htmlspecialchars($d['judul']) . "</td>";
        echo "<td class='p-2'><a href='" . htmlspecialchars($d['gambar']) . "' target='_blank' class='text-blue-600 underline'>Lihat</a></td>";
        echo "<td class='p-2 space-x-2'>
          <button onclick='openEditModal(" . json_encode($d) . ")' class='text-yellow-500'>Edit</button>
          <button onclick='hapusSertifikat(" . $d['id'] . ")' class='text-red-500'>Hapus</button>
        </td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</section>

<!-- Modal Tambah Sertifikat -->
<div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
  <div class="bg-white p-6 rounded shadow-lg w-96">
    <h2 class="text-lg font-bold mb-4">Tambah Sertifikat</h2>
    <form id="formTambah">
      <input type="text" name="judul" placeholder="Judul" class="w-full border mb-2 p-2" required>
      <input type="text" name="gambar" placeholder="gambar Sertifikat" class="w-full border mb-2 p-2" required>
      <input type="hidden" name="aksi" value="tambah_sertifikat">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
  </div>
</div>

<!-- Modal Edit Sertifikat -->
<div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
  <div class="bg-white p-6 rounded shadow-lg w-96">
    <h2 class="text-lg font-bold mb-4">Edit Sertifikat</h2>
    <form id="formEdit">
      <input type="hidden" name="id" id="editId">
      <input type="text" name="judul" id="editJudul" placeholder="Judul" class="w-full border mb-2 p-2" required>
      <input type="text" name="gambar" id="editgambar" placeholder="gambar Sertifikat" class="w-full border mb-2 p-2" required>
      <input type="hidden" name="aksi" value="edit_sertifikat">
      <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
    </form>
  </div>
</div>

<?php
// Handler CRUD Sertifikat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['aksi'] === 'tambah_sertifikat') {
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    mysqli_query($conn, "INSERT INTO sertifikat (judul, gambar) VALUES ('$judul', '$gambar')");
    exit;
  }
  if ($_POST['aksi'] === 'edit_sertifikat') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    mysqli_query($conn, "UPDATE sertifikat SET judul='$judul', gambar='$gambar' WHERE id='$id'");
    exit;
  }
  if ($_POST['aksi'] === 'hapus_sertifikat') {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM sertifikat WHERE id='$id'");
    exit;
  }
}
?>

<!-- Kontak -->
<section id="contact" class="py-16 bg-white">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-4 text-indigo-500">Hubungi Saya</h3>
    <p class="text-gray-800 mb-2">📧 Email: <a href="mailto:fadilahnurwahid28@email.com" class="text-pink-500 hover:underline">fadilahnurwahid28@email.com</a></p>
    <p class="text-gray-800">💼 LinkedIn: <a href="https://linkedin.com/in/fadillahnurwahid" target="_blank" class="text-pink-500 hover:underline">linkedin.com/in/destria</a></p>
  </div>
</section>

<!-- Footer -->
<footer class="bg-indigo-500 text-white py-6 mt-10">
  <div class="text-center text-sm">
    &copy; 2025 Fadillah. All rights reserved.
  </div>
</footer>

<script>
  lucide.createIcons();

  const modalLogout = document.getElementById("modalLogout");

  function openLogoutModal() {
    modalLogout.classList.remove("hidden");
  }

  function closeLogoutModal() {
    modalLogout.classList.add("hidden");
  }

  function confirmLogout() {
    window.location.href = "index.php";
  }

  document.querySelector("a[href='#logout']").addEventListener("click", function(e) {
    e.preventDefault();
    openLogoutModal();
  });

  document.getElementById('formTambah').addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  fetch('portofolio.php', {
    method: 'POST',
    body: formData
  }).then(res => res.text()).then(() => location.reload());
});

document.getElementById('formEdit').addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  fetch('portofolio.php', {
    method: 'POST',
    body: formData
  }).then(res => res.text()).then(() => location.reload());
});

function openEditModal(data) {
  document.getElementById('editId').value = data.id;
  document.getElementById('editJudul').value = data.judul;
  document.getElementById('editLink').value = data.link;
  document.getElementById('modalEdit').classList.remove('hidden');
}

function hapusSertifikat(id) {
  if (confirm('Yakin ingin menghapus sertifikat ini?')) {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('aksi', 'hapus_sertifikat');
    fetch('portofolio.php', {
      method: 'POST',
      body: formData
    }).then(res => res.text()).then(() => location.reload());
  }
}
</script>

</body>
</html>