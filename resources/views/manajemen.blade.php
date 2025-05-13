<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Lab Insyde - Manajemen</title>
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
        <nav class="navbar navbar-expand-lg navbar-dark py-3 fixed-top">
          
          <!-- ✅ Logo -->
          <a class="navbar-brand">
            <img src="{{ asset('img/logo.png') }}" alt="LOGO" class="logo-img">
          </a>
      
          <!-- ✅ Tombol hamburger untuk mobile -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- ✅ Menu navigasi -->
          <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarCollapse">
            
            <!-- Menu tengah -->
            <div class="navbar-nav mx-auto">
                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                <div class="dropdown-menu">
                  <a href="{{ url('about-us') }}" class="dropdown-item">Tentang Kami</a>
                  <a href="{{ url('manajemen') }}" class="dropdown-item">Manajemen</a>
                  <a href="{{ url('visimisi') }}" class="dropdown-item">Visi & Misi</a>
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
      
            <!-- Tombol Bahasa -->
            <div class="language d-flex align-items-center">
              <button class="btn btn-lang">
                <img src="{{ asset('img/indo.png') }}" alt="Bahasa Indonesia">
              </button>
              <button class="btn btn-lang">
                <img src="{{ asset('img/inggris.png') }}" alt="English">
              </button>
            </div>
          </div>
        </nav>
      </div>
    <!-- Navbar End -->

    <div class="container-fluid-banner p-0">
        <div class="banner-wrapper">
          <img src="{{ asset('img/fasilkom.png') }}" alt="fasilkom" />
          <div class="text-container pb-4">
            <h3>Manajemen</h3>
          </div>
        </div>
      </div>
      

        <main>
            <div class="content-section">
                <aside>
                    <div class="profile-menu">
                        <h2>Profile</h2>
                        <ul>
                            <li><a href="{{ url('about-us') }}">Tentang Kami</a></li>
                            <li class="active"><a href="{{ url('manajemen') }}">Manajemen</a></li>
                            <li><a href="{{ url('visimisi') }}">Visi & Misi</a></li>
                        </ul>
                    </div>
                </aside>

                <!-- Manajemen Content -->
                <div class="col-lg-8">
                    <div class="box-list">
                        @forelse($managements as $manager)
                            <div class="item-profile">
                                <div class="info-profile">
                                    <div class="img-profile">
                                        <div class="thumb-img">
                                            @if($manager->image)
                                                <img src="{{ asset('storage/' . $manager->image) }}" alt="{{ $manager->name }}">
                                            @else
                                                <img src="{{ asset('img/profile.jpg') }}" alt="Default Image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="title-profile">
                                        <h5 class="name">{{ $manager->name }}</h5>
                                        <div class="position">{{ $manager->position }}</div>
                                    </div>
                                </div>
                                <div class="desc-profile">
                                    <article>
                                        {!! nl2br(e($manager->description)) !!}
                                        <div class="contact-profile mt-3">
                                            <div class="contact-item">
                                                <span class="icon"><i class="fas fa-user"></i></span>
                                                <span class="text">NIP. {{ $manager->nip }}</span>
                                            </div>
                                            <div class="contact-item">
                                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                                <span class="text">{{ $manager->email }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada data manajemen yang ditambahkan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer Section -->
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
                <p style="font-size: 15px;">Jl. Rungkut Madya, Gn. Anyar, Kec. Gn. Anyar, Surabaya, Jawa Timur 60294
                </p>
                <p style="font-size: 15px;">(031) 8706369</p>
                <div class="footer-social-icons">
                    <a href="https://twitter.com" target="_blank" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://facebook.com" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </footer>

        <!-- JavaScript -->
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

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Contact Javascript File -->
        <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ asset('mail/contact.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
    </div>
</body>

</html>
