<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio Fadillah</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .zoom-controls {
      position: fixed;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
      z-index: 1000;
    }
    .zoom-btn {
      background: rgba(0,0,0,0.5);
      color: white;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: background 0.3s;
    }
    .zoom-btn:hover {
      background: rgba(0,0,0,0.8);
    }
    #imageModal {
      z-index: 999;
    }
    .modal-content {
      max-height: 90vh;
      max-width: 90vw;
      overflow: auto;
    }
    body.modal-open {
      overflow: hidden;
    }
    /* Navbar menu styles for mobile */
    .mobile-menu {
      transition: transform 0.3s ease-in-out;
    }
    .mobile-menu.open {
      transform: translateX(0);
    }
    @media (max-width: 767px) {
      .mobile-menu {
        transform: translateX(100%);
        position: fixed;
        top: 0;
        right: 0;
        height: 100%;
        width: 64;
        background: white;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
        padding: 1.5rem;
      }
    }
    @media (min-width: 768px) {
      .mobile-menu {
        transform: translateX(0);
        position: static;
        width: auto;
        background: transparent;
        box-shadow: none;
        padding: 0;
      }
    }
    /* Section Divider */
    .section-divider {
      width: 100%;
      height: 20px;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113.64,31.08,1200,41.09V0H0Z" fill="%23E0E7FF"></path></svg>') no-repeat center center;
      background-size: cover;
    }
    /* Skill Card Hover */
    .skill-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .skill-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    /* Gradient Background */
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #e0e7ff 100%);
    }
  </style>
</head>
<body class="font-sans leading-relaxed tracking-wide">

<!-- Modal Login -->
<div id="modalLogin" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative" data-aos="zoom-in">
    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-400 hover:text-red-500">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>
    <h2 class="text-2xl font-bold text-indigo-600 mb-4">Login</h2>

    <form id="loginForm">
      <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
      <input type="email" name="email" class="w-full mb-4 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="email@gmail.com" required>

      <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
      <input type="password" name="password" class="w-full mb-6 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="••••••••" required>

      <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg font-semibold transition-all duration-300">Login</button>
    </form>
  </div>
</div>

<!-- Modal Image Zoom -->
<div id="imageModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-90 hidden">
  <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white hover:text-red-500 z-50 bg-black bg-opacity-50 rounded-full p-2">
    <i data-lucide="x" class="w-8 h-8"></i>
  </button>
  
  <div class="modal-content relative">
    <img id="zoomedImage" src="" alt="Zoomed Certificate" class="max-w-full max-h-full object-contain transition-transform duration-300 origin-center">
  </div>
  
  <div class="zoom-controls">
    <button onclick="zoomOut()" class="zoom-btn">
      <i data-lucide="zoom-out" class="w-5 h-5"></i>
    </button>
    <button onclick="resetZoom()" class="zoom-btn">
      <i data-lucide="minimize-2" class="w-5 h-5"></i>
    </button>
    <button onclick="zoomIn()" class="zoom-btn">
      <i data-lucide="zoom-in" class="w-5 h-5"></i>
    </button>
  </div>
</div>

<!-- Navbar -->
<nav class="bg-white shadow fixed top-0 left-0 w-full z-40 shadow-xl">
  <div class="max-w-6xl mx-auto px-4 py-6 flex justify-between items-center">
    <!-- Logo / Nama -->
    <h1 class="text-2xl font-bold text-indigo-500 flex items-center gap-2">
      <i data-lucide="anchor" class="w-6 h-6 text-pink-500"></i>
      Portofolio Fadillah
    </h1>

    <!-- Hamburger Button for Mobile -->
    <button id="menuToggle" class="md:hidden text-gray-800 hover:text-pink-400 focus:outline-none">
      <i data-lucide="menu" class="w-6 h-6"></i>
    </button>

    <!-- Menu -->
    <div id="navMenu" class="mobile-menu md:flex md:flex-row flex-col items-center space-y-4 md:space-y-0 md:space-x-6 hidden">
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
      <a href="#login" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition flex items-center gap-1">
        <i data-lucide="log-in" class="w-5 h-5 text-white"></i>
        Login
      </a>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<header class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow pt-28" data-aos="fade-up">
  <div class="max-w-6xl mx-auto px-4 py-10 flex flex-col md:flex-row justify-between items-center gap-4">
    <div class="text-center md:text-left">
      <h1 class="text-3xl md:text-4xl font-bold mb-2">Halo, Aku Fadillah Nurwahid 👋</h1>
      <p class="text-lg text-pink-200">Web Developer | Web Creator</p>
    </div>
  </div>
</header>

<div class="section-divider"></div>

<!-- Tentang -->
<section id="about" class="py-16 bg-white" data-aos="fade-up" data-aos-delay="100">
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

<div class="section-divider"></div>

<!-- Keahlian -->
<section id="skills" class="py-16 bg-gray-100" data-aos="fade-up" data-aos-delay="200">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-6 text-indigo-500">Keahlian Saya</h3>
    <ul class="grid grid-cols-2 md:grid-cols-4 gap-4 text-gray-800">
      <li class="skill-card flex items-center gap-2 bg-white p-3 rounded-lg shadow"><i data-lucide="code"></i> HTML</li>
      <li class="skill-card flex items-center gap-2 bg-white p-3 rounded-lg shadow"><i data-lucide="code"></i> CSS</li>
      <li class="skill-card flex items-center gap-2 bg-white p-3 rounded-lg shadow"><i data-lucide="code"></i> JavaScript</li>
      <li class="skill-card flex items-center gap-2 bg-white p-3 rounded-lg shadow"><i data-lucide="settings"></i> Git & GitHub</li>
      <li class="skill-card flex items-center gap-2 bg-white p-3 rounded-lg shadow"><i data-lucide="server"></i> MySQL</li>
      <li class="skill-card flex items-center gap-2 bg-white p-3 rounded-lg shadow"><i data-lucide="layout"></i> UI/UX Design</li>
    </ul>
  </div>
</section>

<div class="section-divider"></div>

<!-- Proyek -->
<section id="projects" class="py-16 bg-gray-100" data-aos="fade-up" data-aos-delay="300">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-6 text-indigo-500">Project Saya</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <a href="todolist/ToDo_list.php" target="_blank" class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
        <h3 class="text-xl font-semibold mb-2">ToDo List App</h3>
        <p class="text-gray-600">Aplikasi pencatat tugas yang dibuat menggunakan HTML, CSS, dan JavaScript.</p>
      </a>
      <a href="perpustakaan/perpustakaan.php" target="_blank" class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="500">
        <h3 class="text-xl font-semibold mb-2">Perpustakaan Online</h3>
        <p class="text-gray-600">Aplikasi perpustakaan yang menyimpan list buku, dibuat dengan HTML, CSS, dan JavaScript.</p>
      </a>
    </div>
  </div>
</section>

<div class="section-divider"></div>

<!-- Sertifikat Cards -->
<div class="max-w-4xl mx-auto px-4 py-16" data-aos="fade-up" data-aos-delay="600">
  <h3 class="text-2xl font-bold mb-6 text-indigo-500">Sertifikat Saya</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
      include 'koneksi.php';
      $result = $conn->query("SELECT * FROM sertifikat ORDER BY id DESC");
      while ($row = $result->fetch_assoc()):
    ?>
    <div class="bg-white rounded-lg shadow p-5 hover:-translate-y-1 hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="700">
      <?php if (!empty($row['gambar'])): ?>
        <img src="Uploads/<?= $row['gambar'] ?>" 
             alt="Foto sertifikat" 
             class="w-full max-h-[200px] object-cover rounded-md mb-4 cursor-pointer hover:opacity-90 transition"
             onclick="openImageModal('Uploads/<?= $row['gambar'] ?>')" />
      <?php endif; ?>
      <h3 class="text-xl font-semibold text-blue-800"><?= htmlspecialchars($row['judul']) ?></h3>
      <p class="text-sm text-gray-700 mt-2"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<div class="section-divider"></div>

<!-- Kontak -->
<section id="contact" class="py-16 bg-white" data-aos="fade-up" data-aos-delay="800">
  <div class="max-w-4xl mx-auto px-4">
    <h3 class="text-2xl font-bold mb-4 text-indigo-500">Hubungi Saya</h3>
    <p class="text-gray-800 mb-2">📧 Email: <a href="mailto:fadilahnurwahid28@email.com" class="text-pink-500 hover:underline">fadilahnurwahid28@email.com</a></p>
    <p class="text-gray-800">💼 LinkedIn: <a href="https://linkedin.com/in/fadillahnurwahid" target="_blank" class="text-pink-500 hover:underline">linkedin.com/in/fadillahnurwahid</a></p>
  </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-6 mt-10">
  <div class="text-center text-sm">
    © 2025 Fadillah. All rights reserved.
  </div>
</footer>

<script>
  // Initialize AOS
  AOS.init({
    duration: 800,
    once: true,
  });

  // Variabel untuk menyimpan level zoom
  let currentScale = 1;
  const zoomStep = 0.2;
  
  // Fungsi untuk membuka modal gambar
  function openImageModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const img = document.getElementById('zoomedImage');
    
    img.src = imageSrc;
    img.style.transform = 'scale(1)';
    currentScale = 1;
    
    modal.classList.remove('hidden');
    document.body.classList.add('modal-open');
    
    document.addEventListener('keydown', handleKeyDown);
  }
  
  // Fungsi untuk menutup modal gambar
  function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.classList.remove('modal-open');
    document.removeEventListener('keydown', handleKeyDown);
  }
  
  // Fungsi untuk handle tombol keyboard
  function handleKeyDown(e) {
    if (e.key === 'Escape') {
      closeImageModal();
    }
  }
  
  // Fungsi untuk zoom in
  function zoomIn() {
    currentScale += zoomStep;
    document.getElementById('zoomedImage').style.transform = `scale(${currentScale})`;
  }
  
  // Fungsi untuk zoom out
  function zoomOut() {
    if (currentScale > zoomStep) {
      currentScale -= zoomStep;
      document.getElementById('zoomedImage').style.transform = `scale(${currentScale})`;
    }
  }
  
  // Fungsi untuk reset zoom
  function resetZoom() {
    currentScale = 1;
    document.getElementById('zoomedImage').style.transform = 'scale(1)';
  }
  
  // Tutup modal saat klik di luar gambar
  document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this || e.target.classList.contains('modal-content')) {
      closeImageModal();
    }
  });

  // Login Modal Functions
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
        window.location.href = "admin.html";
      } else {
        alert("Email atau password salah!");
      }
    });
  });

  // Navbar Toggle Functionality
  const menuToggle = document.getElementById('menuToggle');
  const navMenu = document.getElementById('navMenu');

  menuToggle.addEventListener('click', () => {
    navMenu.classList.toggle('open');
    navMenu.classList.toggle('hidden');
  });

  // Close mobile menu when clicking a link
  navMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('open');
      navMenu.classList.add('hidden');
    });
  });

  // Close mobile menu when clicking outside
  document.addEventListener('click', (e) => {
    if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
      navMenu.classList.remove('open');
      navMenu.classList.add('hidden');
    }
  });

  // Inisialisasi ikon Lucide
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