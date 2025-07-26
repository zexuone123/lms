@extends('auth.layouts.app')
@section('content')
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-card">
                        <div class="card shadow-lg border-0">
                            <div class="card-body p-5">
                                <div class="text-center mb-4">
                                    <div class="login-icon">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <h3 class="card-title mt-3 mb-1">Selamat Datang</h3>
                                    <p class="text-muted">Silakan masuk ke akun Anda</p>
                                </div>

                                <div id="alert-container"></div>

                                <form id="loginForm">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            <i class="fas fa-envelope me-2"></i>Email
                                        </label>
                                        <input type="email" class="form-control form-control-lg" id="email"
                                            name="email" required>
                                        <div class="invalid-feedback" id="email-error"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            <i class="fas fa-lock me-2"></i>Password
                                        </label>
                                        <div class="input-group">
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                name="password" required>
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="fas fa-eye" id="toggleIcon"></i>
                                            </button>
                                        </div>
                                        <div class="invalid-feedback" id="password-error"></div>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">
                                            Ingat saya
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg" id="loginBtn">
                                            <span id="loginBtnText">
                                                <i class="fas fa-sign-in-alt me-2"></i>Masuk
                                            </span>
                                            <span id="loginBtnLoading" class="d-none">
                                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                                Memproses...
                                            </span>
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center mt-4">
                                    <a href="#" id="forgotPasswordLink" class="text-decoration-none">Lupa
                                        password?</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Lupa Password?',
                text: 'Hubungi admin untuk reset password Anda.',
                icon: 'info',
                confirmButtonText: 'Hubungi Admin',
                showCancelButton: true,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href =
                        "https://wa.me/6283835572912?text=Halo%20Admin,%20saya%20lupa%20password%20akun%20saya.";
                }
            });
        });
    </script>
@endsection
