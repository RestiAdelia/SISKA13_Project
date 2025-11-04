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
            <a class="navbar-brand d-flex align-items-center" href="{{ route('login') }}">
                <span class="fs-4 fw-bold text-white">SDN 13</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fs-5">
                    <li class="nav-item"><a class="nav-link" href="#profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kepsek">Kepala Sekolah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#staf-guru">Staf & Guru</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lokasi-kontak">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero position-relative d-flex align-items-center justify-content-center text-center text-white">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
        <div class="container hero-content position-relative">
            <h1 class="display-4 fw-bold mb-3">
                Selamat Datang di {{ $visimisi ? $visimisi->nama_sekolah : 'Sekolah Kami' }}
            </h1>
            <p style="font-style: italic">
                "Membangun generasi cerdas, berkarakter, dan berprestasi."
            </p>

        </div>
    </section>


    <section id="profile" class="py-5">
        <div class="container">
            <h2 class="section-title text-center" style="color: var(--dark2);">Profile Sekolah</h2>
            <div class="row align-items-center g-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="p-4 rounded-4 shadow-sm"
                            style="background-color: white; border-left: 6px solid var(--dark3);">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-award-fill me-3" style="color: var(--mid); font-size: 2rem;"></i>
                                <h4 class="mb-0" style="color: var(--dark1); font-weight: 700;">
                                    Akreditasi
                                </h4>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3 fw-semibold" style="min-width: 50px; color: var(--gray);">

                                </div>
                                <div class="d-inline-flex align-items-center justify-content-center fw-bold fs-5 rounded-circle"
                                    style="width: 60px; height: 60px; border: 3px solid var(--dark3); color: var(--dark3);">
                                    {{ $visimisi ? $visimisi->akreditasi : '-' }}
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Visi -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 shadow-sm h-100"
                                style="background-color: white; border-left: 6px solid var(--dark3);">
                                <h4 class="mb-3 d-flex align-items-center" style="color: var(--dark1);">
                                    <i class="bi bi-lightbulb-fill me-2"
                                        style="color: var(--mid); font-size: 1.4rem;"></i>
                                    <b>Visi</b>
                                </h4>
                                <p class="fs-6" style="color: var(--gray); line-height: 1.7;">
                                    {{ $visimisi ? $visimisi->visi : 'Belum ada data visi' }}
                                </p>
                            </div>
                        </div>

                        <!-- Misi -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 shadow-sm h-100"
                                style="background-color: white; border-left: 6px solid var(--mid);">
                                <h4 class="mb-3 d-flex align-items-center" style="color: var(--dark1);">
                                    <i class="bi bi-flag-fill me-2" style="color: var(--dark3); font-size: 1.4rem;"></i>
                                    <b>Misi</b>
                                </h4>
                                <ul class="mb-0" style="color: var(--gray); padding-left: 1.2rem; line-height: 1.7;">
                                    @if ($visimisi && $visimisi->misi)
                                        @foreach (explode("\n", $visimisi->misi) as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    @else
                                        <li>Belum ada data misi</li>
                                    @endif
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
                    <h4 class="kepsek-nama">Ibu Devina Heriyanti, S.Pd.GSD</h4>
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
                @forelse ($kegiatan as $item)
                    <div class="col-md-4">
                        <!-- Bungkus card dengan link -->
                         <a href="{{ route('kegiatan.show', $item->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm hover:shadow-lg transition">
                                <img src="{{ asset('storage/' . $item->gambar_kegiatan) }}"
                                    alt="{{ $item->nama_kegiatan }}" class="card-img-top"
                                    style="height: 250px; object-fit: cover;" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nama_kegiatan }}</h5>
                                    <p class="card-text">
                                        <strong>Tanggal:</strong>
                                        {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
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
