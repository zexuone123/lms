<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MyLearning' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        AOS.init();
      });
    </script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-section {
            background: linear-gradient(135deg, #6EE7B7, #3B82F6);
            color: white;
        }
        .card-custom {
            border-radius: 15px;
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .card-custom:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        /* Efek tombol custom */
        .btn-fun {
            position: relative;
            overflow: hidden;
            border-radius: 50px;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }
        .btn-fun::before {
            content: '';
            position: absolute;
            width: 0;
            height: 300%;
            top: 50%;
            left: 50%;
            background: rgba(255,255,255,0.3);
            transform: translate(-50%, -50%) rotate(45deg);
            transition: width 0.3s ease;
            z-index: 1;
        }
        .btn-fun:hover::before { width: 200%; }
        .btn-fun:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .btn-fun:active { transform: scale(0.95); }

        /* Background awan untuk halaman login/register */
        body.auth-page {
            background: linear-gradient(180deg, #6EE7B7, #3B82F6);
            overflow-x: hidden;
            position: relative;
        }
        .cloud {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            opacity: 0.8;
            animation: moveClouds 60s linear infinite;
        }
        .cloud1 { width: 120px; height: 60px; top: 50px; left: -200px; }
        .cloud2 { width: 200px; height: 100px; top: 150px; left: -300px; animation-duration: 90s; }
        @keyframes moveClouds {
            0% { transform: translateX(0); }
            100% { transform: translateX(120vw); }
        }
        .tombol-anak {
    background: linear-gradient(45deg, #34d399, #10b981);
    border-radius: 50px;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.tombol-anak:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    animation: pulse 0.8s infinite;
}
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

    </style>
    <script>
    function confirmLogout() {
        if (confirm('Yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
    </script>

    <!-- Modal Konfirmasi Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered animate__animated animate__bounceInDown">

    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin keluar dari akun ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-fun" data-bs-dismiss="modal">Batal</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-fun">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    const logoutModal = document.getElementById('logoutModal');

    logoutModal.addEventListener('hide.bs.modal', function (event) {
        const dialog = logoutModal.querySelector('.modal-dialog');
        dialog.classList.remove('animate__bounceInDown');
        dialog.classList.add('animate__fadeOutUp');

        setTimeout(() => {
            dialog.classList.remove('animate__fadeOutUp');
            dialog.classList.add('animate__bounceInDown');
        }, 500); // waktu animasi sesuai Animate.css (0.5s)
    });
</script>


</head>

<body class="{{ $bodyClass ?? '' }}">
    <div class="cloud cloud1"></div>
    <div class="cloud cloud2"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/">MyLearning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
    @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://placehold.co/30x30" alt="avatar" class="rounded-circle me-2">
                {{ Auth::user()->name }}
            </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout
                                </button>

                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn btn-primary btn-fun" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </li>
            @endauth
        </ul>

            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">&copy; {{ date('Y') }} MyLearning. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
