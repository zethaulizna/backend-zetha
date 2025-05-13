<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Lab Insyde - Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


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
                    <a href="#" class="nav-item nav-link">Home</a>
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
                <!-- Language Buttons -->
                <div class="d-flex align-items-center">
                    <button class="btn btn-lang">
                        <img src="{{ asset('img/indo.png') }}" alt="Bahasa Indonesia">
                    </button>
                    <button class="btn btn-lang">
                        <img src="{{ asset('img/inggris.png') }}" alt="English">
                    </button>
                    <!-- Buttons 
                    <a href="{{ url('login') }}" class="btn btn-login">Login</a> -->
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid-banner p-0">
        <div class="banner-wrapper">
          <img src="{{ asset('img/fasilkom.png') }}" alt="fasilkom" />
          <div class="text-container pb-4">
            <h3>LAB INSYDE</h3>
          </div>
        </div>
      </div>
      

        <!-- Description Lab Insyde Section -->
        <section class="description-section">
            <div class="lab-content" style="width: 90%; max-width: 2000px; margin-top: 40px; margin-bottom: 40px;">
                <div class="description-section d-flex mt-4">
                    <img src="{{ asset('storage/' . $desc->image) }}" alt="Description" class="lab-image">
                    <div class="content flex-grow-1" style="font-family: Poppins;">
                        <h5>{{ $desc->title }}</h5>
                        <p>{{ $desc->description }}</p>
                        <a href="#" class="btn btn-desc">More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Section -->
        <section class="service-section" style="background-color: #F43B22;">
            <div class="container">
            <h4>Layanan</h4>
                <div class="slider-wrapper">
                    <button class="slide-btn left" onclick="slideLeft()">❮</button>
                        <div class="row no-gutters">
                            @foreach ($services as $service)
                            <div class="course-card-wrapper">
                                <div class="course-card text-center">
                                    <div class="service-icon">
                                        @if ($service->image)
                                            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image">
                                        @else
                                            <div class="icon-wrapper">
                                                <i class="{{ $service->icon }}"></i>
                                            </div>
                                        @endif
                                    </div>
                                <h5 class="course-title">{{ $service->title }}</h5>
                                <p>{{ $service->description }}</p>
                                <a href="#" class="btn btn-service">More</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    <button class="slide-btn right" onclick="slideRight()">❯</button>
                </div>
            </div>
        </section>

        <!-- Product Lab Insyde Section -->
        <section class="product-section">
            <h4>Produk</h4>
            <div class="lab-content owl-carousel owl-theme" id="product-carousel" style="width: 90%; max-width: 2000px;">
                @foreach ($products as $product)
                <div class="item product-click" data-url="{{ url('/produk') }}">
                    <div class="product-section d-flex">            
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="lab-image">

                        <div class="content flex-grow-1" style="font-family: Poppins; margin-left: 30px;">
                            <h5>{{ $product->name }}</h5>
                            <h6>Rp. {{ number_format($product->price, 0, ',', '.') }}</h6>
                            <p class="product-description">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="footer-section">
            <div class="footer-left">
                <p style="font-weight: bold; font-size: 15px;">Supported By UPN JATIM</p>
                <p style="padding-bottom: 50px; font-size: 15px;">Lab Insyde Professional berfokus untuk memberikan
                    sarana dan prasana untuk mahasiswa Fakultas Ilmu Komputer.</p>
                <div class="footer-line-container">
                    <div class="footer-line"></div>
                </div>
                <p class="copyright-text">Copyright © Fasilkom 2025. All Rights Reserved</p>
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
        <script>
            $(document).ready(function(){
                $('#product-carousel').owlCarousel({
                    items: 1, // TAMPIL 1 PRODUK SEKALIGUS
                    loop: true,
                    margin: 30,
                    autoplay: true,
                    autoplayTimeout: 3500,
                    autoplayHoverPause: false,
                    nav: false,
                    dots: false,

                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const items = document.querySelectorAll('.product-click');
                items.forEach(item => {
                    item.addEventListener('click', function () {
                        const url = this.dataset.url;
                        if (url) {
                            window.location.href = url;
                        }
                    });
                });
            });
        </script>
        
        
        
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          const toggles = document.querySelectorAll('.dropdown-toggle');
          toggles.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
              e.preventDefault();
              const menu = this.nextElementSibling;
              menu.classList.toggle('show');
            });
          });
        });
      </script>
      
</body>

</html>
