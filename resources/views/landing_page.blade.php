<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SDN 13 Kampung Kandang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span class="fs-4 fw-bold text-white">SDN 13</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fs-5">
                    <li class="nav-item"><a class="nav-link" href="#visi-misi">Visi &
                            Misi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kepsek">Kepala Sekolah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#staf-guru">Staf & Guru</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                   <li class="nav-item">  <a class="nav-link text-indigo-700 hover:text-indigo-900 font-semibold" href="{{ route('login') }}">
                      Login </a></li> 

                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero">
        <div class="overlay"></div>
        <div class="container hero-content">
            <h1>Selamat Datang di SDN 13 Kampung Kandang</h1>
            <p>Membangun generasi cerdas, berkarakter, dan berprestasi.</p>

        </div>
    </section>
    <!-- Visi & Misi -->
    <section id="visi-misi" class="py-5 bg-section-light">
        <div class="container">
            <h2 class="text-center section-title">Visi & Misi</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <h4 class="mb-3"><i class="bi bi-lightbulb-fill text-secondary me-2"></i><b>Visi</b></h4>
                        <p>"Terwujudnya Generasi Beriman dan Bertaqwa, Berprestasi, Kreatif, Melestarikan Budaya,
                            Peduli Lingkungan serta Mencerminkan Profile Pelajar Pancasila."</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <h4 class="mb-3"><i class="bi bi-flag-fill text-secondary me-2"></i><b>Misi</b></h4>
                        <ul>
                            <li>Menanamkan Nilai nilai Religius dan Berakhlak Mulia.</li>
                            <li>Meningkatkan Kualitas Pembelajaran untuk Prestasi Akadmik dan Non Akademik.</li>
                            <li>Mendorong Kreatvitas dan Berfikir Kritis.</li>
                            <li>Menumbuhkna Semangat Nasionalisme dan Cinta Tanah Air.</li>
                            <li>Membangun Kemandirian dan Tanggung Jawab</li>
                            <li>Mengembangkan Keterampilan Sosial dan Kerjasama</li>
                            <li>Mengembngkan Wawasan Global dan Litersi Teknologi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kepala Sekolah -->
    <section id="kepsek" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Kepala Sekolah</h2>
            <div class="row align-items-center g-4">
                <!-- Foto di kiri -->
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('images/kepsek.jpg') }}" alt="Kepala Sekolah" class="kepsek-foto img-fluid">
                </div>

                <!-- Teks di kanan -->
                <div class="col-lg-8">
                    <h4 class="kepsek-nama">Ibu Devina Herianti, S.Pd.GSD</h4>
                    <p class="kepsek-jabatan">Kepala Sekolah</p>
                    <blockquote class="kepsek-quote">
                        "Mari Wujudkan Generasi Beriman, Kreatif, dan Cinta Budaya!"
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <section id="staf-guru" class="py-5 bg-section-dark">
        <div class="container">
            <h2 class="section-title mb-3 text-center">Staf & Guru</h2>

            <!-- Filter Buttons (Kiri) -->
            <div class="d-flex mb-4">
                <div class="filter-wrapper">
                    <button class="btn filter-btn active" data-filter="all">Semua</button>
                    <button class="btn filter-btn" data-filter="guru">Guru</button>
                    <button class="btn filter-btn" data-filter="staf">Staf</button>
                </div>
            </div>

            <!-- Card List -->
            <div class="row text-center g-4 justify-content-center">
                <!-- Guru -->
                <div class="col-6 col-md-3 filter-item guru">
                    <div class="card p-3">
                        <img src="https://i.pinimg.com/736x/c2/f7/9a/c2f79a13c23fe220552492803d8da7a3.jpg"
                            alt="Guru 1" class="guru-img mx-auto d-block" />
                        <h5 class="card-title mt-3">Nama</h5>
                        <p class="card-text">Jabatan:</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 filter-item guru">
                    <div class="card p-3">
                        <img src="https://i.pinimg.com/736x/c2/f7/9a/c2f79a13c23fe220552492803d8da7a3.jpg"
                            alt="Guru 2" class="guru-img mx-auto d-block" />
                        <h5 class="card-title mt-3">Nama</h5>
                        <p class="card-text">Jabatan:</p>
                    </div>
                </div>

                <!-- Staf -->
                <div class="col-6 col-md-3 filter-item staf">
                    <div class="card p-3">
                        <img src="https://i.pinimg.com/736x/c2/f7/9a/c2f79a13c23fe220552492803d8da7a3.jpg"
                            alt="Staf 1" class="guru-img mx-auto d-block" />
                        <h5 class="card-title mt-3">Nama</h5>
                        <p class="card-text">Jabatan:</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 filter-item staf">
                    <div class="card p-3">
                        <img src="https://i.pinimg.com/736x/c2/f7/9a/c2f79a13c23fe220552492803d8da7a3.jpg"
                            alt="Staf 2" class="guru-img mx-auto d-block" />
                        <h5 class="card-title mt-3">Nama</h5>
                        <p class="card-text">Jabatan:</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kegiatan -->
    <section id="kegiatan" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title mb-5">Kegiatan Sekolah</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://i.pinimg.com/1200x/37/9a/73/379a736154fca561015f51782ec9bc36.jpg"
                            alt="Kegiatan 1" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Kegiatan 1</h5>
                            <p class="card-text">Deskripsi singkat tentang kegiatan sekolah 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://i.pinimg.com/1200x/37/9a/73/379a736154fca561015f51782ec9bc36.jpg"
                            alt="Kegiatan 2" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Kegiatan 2</h5>
                            <p class="card-text">Deskripsi singkat tentang kegiatan sekolah 2.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://i.pinimg.com/1200x/37/9a/73/379a736154fca561015f51782ec9bc36.jpg"
                            alt="Kegiatan 3" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Kegiatan 3</h5>
                            <p class="card-text">Deskripsi singkat tentang kegiatan sekolah 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="lokasi-kontak" class="py-5 bg-section-light">
        <div class="container">
            <h2 class="section-title text-center mb-4">Lokasi & Kontak</h2>
            <div class="lokasi-wrapper p-3 p-lg-4">
                <div class="row g-4 align-items-stretch">
                    <!-- Kolom Peta -->
                    <div class="col-lg-6 d-flex">
                        <div class="map-container flex-fill overflow-hidden rounded-3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3971.42!2d100.159629265868!3d-0.6183968915705369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1726839400000!5m2!1sid!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    <!-- Kolom Kontak -->
                    <div class="col-lg-6 d-flex">
                        <div class="card flex-fill border-0 p-4">
                            <h4 class="mb-3 text-center">Hubungi Kami</h4>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama anda"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Masukkan email anda"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pesan</label>
                                    <textarea class="form-control" rows="4" placeholder="Tulis pesan anda..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer  -->
    <footer class="footer-modern text-light py-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Logo & Deskripsi -->
                <div class="col-md-3">
                    <h4 class="fw-bold mb-3">SDN 13 Kampung Kandang</h4>
                    <p class="small">
                        Berkomitmen melahirkan generasi beriman,
                        kreatif, peduli, dan mencerminkan Profil Pelajar Pancasila
                    </p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="https://www.facebook.com/sdntigabelaskpkdg.sdntigabelaskpkdg" class="social-link"
                            target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>

                    </div>
                </div>
                <!-- Navigasi -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Navigasi</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#profil">Profil Sekolah</a></li>
                        <li><a href="#guru">Daftar Guru</a></li>
                        <li><a href="#kegiatan">Kegiatan</a></li>
                    </ul>
                </div>

                <!-- Layanan / Program -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Program</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">Ekstrakurikuler</a></li>
                        <li><a href="#">Prestasi</a></li>
                        <li><a href="#">MoU & Kerjasama</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Kontak</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Kp. Kandang, Kec. Pariaman Timur, Kota
                        Pariaman, Sumatera Barat 25534</p>
                    <p class="mb-0"><i class="bi bi-globe me-2 text-white"></i>info@sekolahku.sch.id</p>
                    <p class="mb-0"><i class="bi bi-envelope-fill me-2"></i>sdn13kpkd.@gmail.com</p>

                </div>
            </div>

            <hr class="border-secondary my-4">

            <!-- Copyright -->
            <div class="text-center small">
                &copy; {{ date('Y') }} SDN 13 Kampung Kandang. All Rights Reserved.
            </div>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/index.js') }}"></script>

</html>
