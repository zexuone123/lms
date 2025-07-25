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
</style>

<style>
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
    .btn-fun:hover::before {
        width: 200%;
    }
    .btn-fun:hover {
        transform: scale(1.08);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .btn-fun:active {
        transform: scale(0.95);
    }
</style>


</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/">MyLearning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/courses">Kursus</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="btn btn-primary" href="/login">Login</a></li>
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
