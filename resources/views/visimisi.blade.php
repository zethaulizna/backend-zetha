<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Lab Insyde-Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!-- Customized CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3 fixed-top">
            <div class="collapse navbar-collapse d-flex justify-content-between align-items-center w-100">
                <!-- kiri: logo -->
                <h1 class="m-0 d-none d-block">LAB INSYDE</h1> 
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('about-us') }}" class="dropdown-item">Tentang Kami</a>
                            <a href="{{ url('pimpinan') }}" class="dropdown-item">Pimpinan Fakultas</a>
                            <a href="{{ url('visimisi') }}" class="dropdown-item">Visi & Misi</a>
                            <a href="{{ url('manajemen') }}" class="dropdown-item">Manajemen</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layanan</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Konsultasi IT</a>
                            <a href="#" class="dropdown-item">Sertifikasi BNSP</a>
                            <a href="#" class="dropdown-item">Sewa LAB</a>
                            <a href="#" class="dropdown-item">Pelatihan</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link">Produk</a>
                    <a href="#" class="nav-item nav-link">Berita</a>
                    <a href="#" class="nav-item nav-link contact">Kontak</a>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-lang">
                        <img src="{{ asset('img/indo.png') }}" alt="Bahasa Indonesia">
                    </button>
                    <button class="btn btn-lang">
                        <img src="{{ asset('img/inggris.png') }}" alt="English">
                    </button>
                    <!-- login
                    <a href="{{ url('login') }}" class="btn btn-login">Login</a> -->
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid p-0">
        <img class="w-100" src="{{ asset('img/fasilkom.png') }}" alt="Image">

        <div class="text-container pb-4">
            <h3>VISI & MISI</h3>
        </div>

        <main>
            <div class="content-section">
                <aside>
                    <div class="profile-menu">
                        <h2>Profile</h2>
                        <ul>
                            <li><a href="{{ url('about-us') }}">Tentang Kami</a></li>
                            <li><a href="{{ url('pimpinan') }}">Pimpinan Fakultas</a></li>
                            <li class="active"><a href="{{ url('visimisi') }}">Visi & Misi</a></li>
                            <li><a href="{{ url('manajemen') }}">Manajemen</a></li>
                        </ul>
                    </div>
                </aside>
                <section class="about-content">
                    <div class="tc-visi">
                        @foreach ($visions as $item)
                            <h2>Visi</h2>
                            <p style="text-align: justify;">
                                {{ $item->vision }}
                            </p>
                            <h2>Misi</h2>
                            <ol>
                                @foreach (explode("\n", $item->mission) as $mission)
                                    @if (trim($mission) != '')
                                        <li style="text-align: justify;">
                                            {{ $mission }}
                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                        @endforeach
                    </div>
                </section>
            </div>
        </main>

        <footer class="footer-section">
            <div class="footer-left">
                <p style="font-weight: bold; font-size: 15px;">Supported By UPN JATIM</p>
                <p style="padding-bottom: 50px; font-size: 15px;">Lab Insyde Professional berfokus untuk memberikan
                    sarana dan prasana untuk mahasiswa Fakultas Ilmu Komputer.</p>
                <div class="footer-line"></div>
                <p style="padding-top: 25px; font-size: 15px;">Copyright © Fasilkom 2025. All Rights Reserved</p>
            </div>
            <div class="footer-right">
                <p style="font-weight: bold; font-size: 15px;">UPN Jatim</p>
                <p style="font-size: 15px;">Jl. Rungkut Madya, Gn. Anyar, Kec. Gn. Anyar, Surabaya, Jawa Timur 60294</p>
                <p style="font-size: 15px;">(031) 8706369</p>
                <div class="footer-social-icons" style="display: flex; padding-top: 16px;">
                    <a href="#" target="_blank" title="Twitter">
                        <img src="{{ asset('img/Twitter.png') }}" alt="Twitter">
                    </a>
                    <a href="#" target="_blank" title="Instagram">
                        <img src="{{ asset('img/Instagram.png') }}" alt="Instagram">
                    </a>
                    <a href="#" target="_blank" title="Facebook">
                        <img src="{{ asset('img/Facebook.png') }}" alt="Facebook">
                    </a>
                </div>
            </div>
        </footer>

        <!-- JS -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const inputs = document.querySelectorAll('.search-section input');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.dataset.placeholder = this.placeholder;
                        this.placeholder = '';
                    });
                    input.addEventListener('blur', function() {
                        if (!this.value) {
                            this.placeholder = this.dataset.placeholder;
                        }
                    });
                });
            });
        </script>

        <!-- Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ asset('mail/contact.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </div>
</body>

</html>
