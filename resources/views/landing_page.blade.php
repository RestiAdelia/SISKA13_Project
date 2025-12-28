<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SDN 13 Kampung Kandang</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top transition-all py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <div class="logo-box me-2 d-flex align-items-center justify-content-center"
                    style=" width: 42px; height: 42px; border-radius: 50%; transform: rotate(-5deg); border: 2px solid rgba(255,255,255,0.2); overflow: hidden;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SDN 13"
                        style="width: 70%; height: 70%; object-fit: contain;">
                </div>
                <span class="fs-4 fw-black text-white tracking-tighter">
                    SDN <span style="color: var(--mid);">13</span>
                </span>
            </a>
            <!-- Mobile Toggler -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-left">
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link px-0 active" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link px-0" href="#kepsek">Kepala Sekolah</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link px-0" href="#staf-guru">Staf & Guru</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link px-0" href="#kegiatan">Kegiatan</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link px-0" href="#lokasi-kontak">Kontak</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link px-4 py-2 rounded-pill btn-login-custom text-white"
                            href="{{ route('login') }}">
                            <i class="bi bi-person-circle me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section
        class="hero position-relative d-flex align-items-center justify-content-center text-center text-white overflow-hidden"
        style="min-height: 100vh; background-attachment: fixed; background-image: url('/images/hero1.jpg'); background-size: cover; background-position: center;">

        <div class="overlay position-absolute top-0 start-0 w-100 h-100"
            style="background: radial-gradient(circle at center, rgba(66,5,22,0.45) 0%, rgba(20,0,5,0.75) 100%);">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="z-index: 1; opacity: 0.1; background-image: radial-gradient(#fff 0.5px, transparent 0.5px); background-size: 25px 25px;">
        </div>

        <div class="container hero-content position-relative" style="z-index: 2;">
            <div class="d-inline-block mb-3 px-4 py-2 rounded-pill animate-fade-down shadow-sm"
                style="background: rgba(239, 136, 173, 0.2); border: 1px solid var(--mid); backdrop-filter: blur(4px);">
                <span class="text-uppercase fw-bold"
                    style="color: var(--mid); letter-spacing: 3px; font-size: 0.75rem;">
                    Selamat Datang Di
                </span>
            </div>
            <h1 class="display-1 fw-black mb-4 tracking-tight" style="text-shadow: 0 4px 15px rgba(0,0,0,0.4);">
                {{ $visimisi ? $visimisi->nama_sekolah : ' Sekolah Kami' }}
            </h1>
            <div class="mx-auto mb-5" style="max-width: 700px;">
                <p class="fs-3 fw-light fst-italic opacity-95"
                    style="line-height: 1.4; letter-spacing: 0.5px; text-shadow: 0 2px 8px rgba(0,0,0,0.4);">
                    Membangun generasi <span
                        style="color: var(--mid); font-weight: bold; border-bottom: 2px solid var(--mid);">cerdas,
                        berkarakter</span>, dan berprestasi.
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <a href="#profile" class="btn-hero-pill px-5 py-3 shadow-lg">
                    Jelajahi Profil <i class="bi bi-arrow-right-short ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="profile" class="py-5">
        <div class="container">
            <div class="text-start mb-5">
                <h2 class="section-title">Profile Sekolah</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <div class="profile-card p-4 rounded-4 shadow-sm border-0 position-relative overflow-hidden"
                        style="background-color: white; border-top: 5px solid var(--dark3) !important;">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="icon-box me-3"
                                        style="background: var(--light); padding: 10px; border-radius: 12px;">
                                        <i class="bi bi-award-fill" style="color: var(--dark3); font-size: 2rem;"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0" style="color: var(--dark1); font-weight: 700;">Status
                                            Akreditasi</h4>
                                        <p class="text-muted mb-0">Pengakuan kualitas layanan pendidikan sekolah kami
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end text-center mt-3 mt-md-0">
                                <div class="d-inline-flex align-items-center justify-content-center fw-bold fs-2 rounded-circle shadow-sm"
                                    style="width: 80px; height: 80px; border: 4px double var(--mid); color: var(--dark2); background: #fff;">
                                    {{ $visimisi ? $visimisi->akreditasi : '-' }}
                                </div>
                            </div>
                        </div>
                        <!-- Decorative Circle Background -->
                        <div class="position-absolute"
                            style="right: -20px; bottom: -20px; opacity: 0.05; pointer-events: none;">
                            <i class="bi bi-award-fill" style="font-size: 150px;"></i>
                        </div>
                    </div>
                </div>
                <!-- Visi Card -->
                <div class="col-md-6">
                    <div class="profile-card p-4 rounded-4 shadow-sm h-100 border-0 transition-hover"
                        style="background-color: white; border-left: 6px solid var(--dark3) !important;">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-lightbulb-fill me-3 p-2 rounded-3"
                                style="background: var(--light); color: var(--mid); font-size: 1.5rem;"></i>
                            <h4 class="mb-0" style="color: var(--dark1); font-weight: 700;">Visi</h4>
                        </div>
                        <div class="visi-content">
                            <p class="fs-6 italic-text"
                                style="color: var(--gray); line-height: 1.8; font-style: italic;">
                                "{{ $visimisi ? $visimisi->visi : 'Belum ada data visi' }}"
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Misi Card -->
                <div class="col-md-6">
                    <div class="profile-card p-4 rounded-4 shadow-sm h-100 border-0 transition-hover"
                        style="background-color: white; border-left: 6px solid var(--mid) !important;">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-flag-fill me-3 p-2 rounded-3"
                                style="background: var(--light); color: var(--dark3); font-size: 1.5rem;"></i>
                            <h4 class="mb-0" style="color: var(--dark1); font-weight: 700;">Misi</h4>
                        </div>
                        <ul class="custom-list mb-0" style="color: var(--gray); list-style: none; padding-left: 0;">
                            @if ($visimisi && $visimisi->misi)
                                @foreach (explode("\n", $visimisi->misi) as $point)
                                    @if (trim($point) != '')
                                        <li class="mb-2 d-flex align-items-start">
                                            <i class="bi bi-check2-circle me-2 mt-1" style="color: var(--dark3);"></i>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <li class="text-muted">Belum ada data misi</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kepala Sekolah -->
    <section id="kepsek" class="py-5" style="background: linear-gradient(to bottom, #fdf7f9, #fbeaf0);">
        <div class="container">
            <div class="text-start mb-5">
                <h2 class="section-title">Kepala Sekolah</h2>
            </div>
            <div class="row align-items-center g-5">
                <div class="col-lg-5 text-center position-relative">
                    <div class="position-absolute top-50 start-50 translate-middle"
                        style="width: 300px; height: 300px; background: var(--mid); opacity: 0.1; border-radius: 45% 55% 70% 30% / 30% 60% 40% 70%; filter: blur(20px);">
                    </div>
                    <div class="kepsek-container position-relative">
                        <img src="{{ $kepsek && $kepsek->foto ? asset('uploads/' . $kepsek->foto) : asset('images/kepsek.jpg') }}"
                            alt="Kepala Sekolah" class="kepsek-foto shadow-lg position-relative"
                            style="z-index: 2; border: 8px solid white; width: 280px; height: 350px; object-fit: cover; border-radius: 30px;">
                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-n3" style="z-index: 3;">
                            <span class="badge px-4 py-2 shadow-sm"
                                style="background-color: var(--dark3); border-radius: 50px; font-size: 0.8rem; letter-spacing: 1px;">
                                EST. {{ now()->year }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Sisi Teks -->
                <div class="col-lg-7">
                    <div class="ps-lg-4">
                        <div class="mb-4">
                            @if ($kepsek)
                                <h3 class="kepsek-nama mt-2 mb-1" style="color: var(--dark1); font-size: 2.2rem;">
                                    {{ $kepsek->nama }}
                                </h3>
                                <p class="kepsek-jabatan fw-semibold" style="color: var(--dark3);">
                                    {{ $kepsek->jabatan }}
                                </p>
                            @else
                                <h3 class="kepsek-nama mt-2 mb-1" style="color: var(--dark1); font-size: 2.2rem;">
                                    Nama Kepala Sekolah
                                </h3>
                                <p class="kepsek-jabatan fw-semibold" style="color: var(--dark3);">
                                    Kepala Sekolah
                                </p>
                            @endif
                        </div>

                        <div class="position-relative">
                            <!-- Ikon Quote Besar -->
                            <i class="bi bi-quote position-absolute"
                                style="font-size: 4rem; color: var(--mid); opacity: 0.2; top: -30px; left: -20px;"></i>

                            <blockquote class="kepsek-quote position-relative"
                                style="font-size: 1.25rem; font-style: italic; color: var(--dark2); line-height: 1.8; border: none; padding-left: 0;">
                                "Mari bersama-sama mewujudkan generasi yang tidak hanya cerdas secara akademik, tetapi
                                juga beriman, kreatif, dan memiliki kecintaan yang mendalam terhadap budaya bangsa."
                            </blockquote>
                            <div class="mt-4 pt-3 border-top border-2"
                                style="width: 100px; border-color: var(--mid) !important;">
                            </div>
                            <p class="mt-3 text-muted" style="font-size: 0.95rem; max-width: 500px;">
                                Kami berkomitmen untuk menciptakan lingkungan belajar yang inspiratif dan aman bagi
                                seluruh siswa-siswi kami.
                            </p>
                        </div>
                    </div>



                </div>
            </div>

            {{-- Garis dekorasi --}}

        </div>

    </section>
    <section id="staf-guru" class="py-5 bg-section-dark">
        <div class="container">
            <!-- Judul Rata Kiri -->
            <div class="text-start mb-5">
                <h2 class="section-title mb-2">Staf & Guru</h2>

                </p>
            </div>
            <!-- Filter Buttons (Tetap di Kiri) -->
            <div class="d-flex justify-content-start mb-5">
                <div class="filter-wrapper">
                    <button class="btn filter-btn active" data-filter="all">Semua</button>
                    <button class="btn filter-btn" data-filter="guru">Guru</button>
                    <button class="btn filter-btn" data-filter="staf">Staf</button>
                </div>
            </div>
            <!-- Card List -->
            <div class="row g-4">
                @forelse($staff as $s)
                    @php
                        $kategori = Str::contains(strtolower($s->jabatan), 'guru') ? 'guru' : 'staf';
                    @endphp
                    <div class="col-6 col-md-4 col-lg-3 filter-item {{ $kategori }}">
                        <div class="staf-card p-4 text-start">
                            <div class="staf-img-wrapper mb-3">
                                <img src="{{ $s->foto ? asset('uploads/' . $s->foto) : 'https://i.pinimg.com/736x/c2/f7/9a/c2f79a13c23fe220552492803d8da7a3.jpg' }}"
                                    alt="{{ $s->nama }}" class="guru-img shadow-sm" />
                            </div>
                            <div class="staf-info">
                                <h5 class="staf-nama">{{ $s->nama }}</h5>
                                <div class="staf-divider mb-2"></div>
                                <p class="staf-jabatan">{{ $s->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 py-5 text-start">
                        <p class="text-muted">Belum ada data guru atau staf.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="stats-wrapper">
        <div class="container position-relative z-1">

            <!-- Header  -->
            <div class="text-center mb-5">
                <h6 class="fw-bold text-uppercase"
                    style="color: var(--dark3); letter-spacing: 0.4em; font-size: 14px;">
                    Statistik Sekolah
                </h6>
            </div>

            <!-- Row Statistik -->
            <div class="d-flex align-items-center justify-content-between text-center mx-auto"
                style="max-width: 1100px;">

                <!-- Siswa  -->
                <div class="flex-fill stat-item">
                    <div class="counter-value display-4 text-dark1">
                        <span class="counter" data-target="{{ $data['count_siswa'] }}">0</span>
                    </div>
                    <div class="stat-label" style="color: var(--dark1);">Siswa</div>
                </div>

                <div class="stat-divider"></div>

                <!-- Guru -->
                <div class="flex-fill stat-item">
                    <div class="counter-value display-5 text-dark2">
                        <span class="counter" data-target="{{ $data['count_guru'] }}">0</span>
                    </div>
                    <div class="stat-label" style="color: var(--dark2);">Guru</div>
                </div>

                <div class="stat-divider"></div>

                <!-- Kelas -->
                <div class="flex-fill stat-item">
                    <div class="counter-value display-5 text-dark3">
                        <span class="counter" data-target="{{ $data['count_kelas'] }}">0</span>
                    </div>
                    <div class="stat-label" style="color: var(--dark3);">Kelas</div>
                </div>

                <div class="stat-divider"></div>

                <!-- MoU -->
                <div class="flex-fill stat-item">
                    <div class="counter-value display-5" style="color: var(--mid);">
                        <span class="counter" data-target="{{ $data['count_mou'] }}">0</span>
                    </div>
                    <div class="stat-label" style="color: var(--mid);">Mitra</div>
                </div>

                <div class="stat-divider"></div>

                <!-- Kegiatan -->
                <div class="flex-fill stat-item">
                    <div class="counter-value display-5 text-secondary">
                        <span class="counter" data-target="{{ $data['total_kegiatan'] }}">0</span>
                    </div>
                    <div class="stat-label text-secondary">Kegiatan</div>
                </div>

            </div>
        </div>

        <!-- Animasi Gelombang -->
        <div class="waves-container">
            <svg class="waves-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(239, 136, 173, 0.2)" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(165, 56, 96, 0.1)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(76, 0, 39, 0.05)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#ffffff" />
                </g>
            </svg>
        </div>
    </section>
    <!-- Kegiatan -->
    <section id="kegiatan" class="py-5 bg-light">
        <div class="container">
            <!-- Judul di Tepi Kiri -->
            <div class="text-start mb-5">
                <h2 class="section-title">Kegiatan Sekolah</h2>
            </div>
            <div class="row g-4">
                @forelse ($kegiatan as $item)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ route('kegiatan.show', $item->id) }}" class="text-decoration-none text-dark">
                            <div class="card kegiatan-card h-100 border-0 shadow-sm overflow-hidden">
                                <!-- Image Wrapper -->
                                <div class="position-relative kegiatan-img-wrapper">
                                    <img src="{{ asset('storage/' . $item->gambar_kegiatan) }}"
                                        alt="{{ $item->nama_kegiatan }}" class="card-img-top kegiatan-img" />
                                    <div class="date-badge">
                                        <span
                                            class="day">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d') }}</span>
                                        <span
                                            class="month">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('M') }}</span>
                                    </div>
                                </div>

                                <div class="card-body p-4 text-start">
                                    <h5 class="kegiatan-title mb-2">{{ $item->nama_kegiatan }}</h5>
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="bi bi-calendar3 me-2" style="color: var(--mid);"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-start py-4">
                        <p class="text-muted">Belum ada kegiatan yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <section class="mt-5 py-5" style="background-color: var(--light);" id="ekstrakurikuler">
        <div class="container ">
            <h3 class="section-title text-center mb-5" style="color: var(--dark2);">
                Ekstrakurikuler
            </h3>

            <div class="row justify g-4">
                <!-- Olahraga -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="ekskul-item position-relative mx-auto">
                        <div class="circle">
                            <img src="{{ asset('images/olahraga.png') }}" alt="Olahraga" class="ekskul-logo" />
                        </div>
                        <div class="bubble">Olahraga</div>
                    </div>
                </div>

                <!-- Pramuka -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="ekskul-item position-relative mx-auto">
                        <div class="circle">
                            <img src="{{ asset('images/pramuka.png') }}" alt="Pramuka" class="ekskul-logo" />
                        </div>
                        <div class="bubble">Pramuka</div>
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
                                src="https://www.google.com/maps?q=-0.618343250515486,100.15961853703192&hl=id&z=16&output=embed"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    <!-- Kolom Kontak -->
                    <div class="col-lg-6 d-flex" id="kontak">
                        <div class="card flex-fill border-0 p-4">
                            <h4 class="mb-3 text-center">Hubungi Kami</h4>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukkan nama anda" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Masukkan email anda" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Pesan</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="Tulis pesan anda..." required></textarea>
                                </div>

                                <button type="submit" class="btn btn-success w-100">
                                    Kirim Pesan
                                </button>
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
                <div class="col-md-4">
                    <h4 class="fw-bold mb-3"i>{{ $visimisi ? $visimisi->nama_sekolah : ' ' }}</h4>
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
                <div class="col-md-2">
                    <h5 class="fw-bold mb-3">Navigasi</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#profile">Profil Sekolah</a></li>
                        <li><a href="#staf-guru">Daftar Guru</a></li>
                        <li><a href="#kegiatan">Kegiatan</a></li>
                        <li><a href="#lokasi-kontak">Kontak</a></li>
                    </ul>
                </div>

                <!-- Layanan / Program -->
                <div class="col-md-2">
                    <h5 class="fw-bold mb-3">Program</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#ekstrakurikuler">Ekstrakurikuler</a></li>
                        <li><a href="#">Prestasi</a></li>
                        <li><a href="#">MoU & Kerjasama</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Kontak</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Kp. Kandang, Kec. Pariaman Timur,
                        Kota
                        Pariaman, Sumatera Barat 25534</p>
                    <p class="mb-0"><i class="bi bi-globe me-2 text-white"></i>info@sekolahku.sch.id</p>
                    <p class="mb-0"><i class="bi bi-envelope-fill me-2"></i>sdn13_kampungkandang@yhoo.com</p>

                </div>
            </div>

            <hr class="border-secondary my-4">

            <!-- Copyright -->
            <div class="text-center small">
                &copy; {{ date('Y') }} {{ $visimisi ? $visimisi->nama_sekolah : ' ' }} <br> Rights Reserved. Masih
                dalam pengembangan</br>
            </div>
        </div>
    </footer>
   


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/index.js') }}"></script>

</html>
