<?php
session_start();
include 'koneksi.php';
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

<!-- Modal Login -->
<div id="modalLogin" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative">
    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-400 hover:text-red-500">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>
    <h2 class="text-2xl font-bold text-indigo-600 mb-4">Login</h2>

    <form id="loginForm">
      <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
      <input type="email" name="email" class="w-full mb-4 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="email@gmail.com" required>

      <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
      <input type="password" name="password" class="w-full mb-6 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="••••••••" required>

      <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg font-semibold">Login</button>
    </form>
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
      <!-- Tombol Login -->
      <a href="#login" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition flex items-center gap-1">
        <i data-lucide="log-in" class="w-5 h-5 text-white"></i>
        Login
      </a>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<header class="bg-indigo-500 text-white shadow pt-28">
  <div class="max-w-6xl mx-auto px-4 py-10 flex flex-col md:flex-row justify-between items-center gap-4">
    <!-- Kiri: Teks -->
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

<section id="projects" class="py-16 bg-gray-100">
<div class="max-w-4xl mx-auto px-4">
<h3 class="text-2xl font-bold mb-6 text-indigo-500">Project Saya</h3>
    <div class="flex justify-center items-center">
      
      <!-- Proyek 1 -->
      <a href="ToDo_list.php" target="_blank" class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition-all duration-300">
        <h3 class="text-xl font-semibold mb-2">ToDo List App</h3>
        <p class="text-gray-600">Aplikasi pencatat tugas yang dibuat menggunakan HTML, CSS, dan JavaScript.</p>
      </a>
      
    </div>
  </div>
</section>

<!-- Sertifikat Cards -->
<div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-6 text-indigo-500">Sertifikat Saya</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
        include 'koneksi.php';
        $result = $conn->query("SELECT * FROM sertifikat ORDER BY id DESC");
        while ($row = $result->fetch_assoc()):
      ?>
      <div class="bg-white rounded-lg shadow p-5 hover:-translate-y-1 hover:shadow-lg transition duration-300">
        <?php if (!empty($row['gambar'])): ?>
          <img src="uploads/<?= $row['gambar'] ?>" alt="Foto sertifikat" class="w-full max-h-[200px] object-cover rounded-md mb-4" />
        <?php endif; ?>
        <h3 class="text-xl font-semibold text-blue-800"><?= htmlspecialchars($row['judul']) ?></h3>
        <p class="text-sm text-gray-700 mt-2"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
      </div>
      <?php endwhile; ?>
    </div>
  </div>


<!-- Kontak -->
<section id="contact" class="py-16 bg-white">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-4 text-indigo-500">Hubungi Saya</h3>
    <p class="text-gray-800 mb-2">📧 Email: <a href="fadilahnurwahid28@email.com" class="text-pink-500 hover:underline">fadilahnurwahid28@email.com</a></p>
    <p class="text-gray-800">💼 LinkedIn: <a href="https://linkedin.com/in/fadillahnurwahid" target="_blank" class="text-pink-500 hover:underline">linkedin.com/in/destria</a></p>
  </div>
</section>

<!-- Footer -->
<footer class="bg-indigo-500 text-white py-6 mt-10">
  <div class="text-center text-sm">
    &copy; 2025 Fadillah. All rights reserved.
  </div>
</footer>

</body>
<script>
  document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch("login.php", {
      method: "POST",
      body: formData
    })
    .then(res => res.text())
    .then(res => {
      if (res === "success") {
        window.location.href = "admin.html"; // Ganti ke file dashboard adminmu
      } else {
        alert("Email atau password salah!");
      }
    });
  });

  lucide.createIcons();

  const modal = document.getElementById("modalLogin");

  function openModal() {
    modal.classList.remove("hidden");
  }

  function closeModal() {
    modal.classList.add("hidden");
  }

  document.querySelector("a[href='#login']").addEventListener("click", (e) => {
    e.preventDefault();
    openModal();
  });
</script>

</html>
