@extends('layouts.auth')

@section('auth-layout')
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            /* Added padding for better mobile spacing */
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            animation: fadeInUp 0.6s ease;
            margin: auto;
            /* Added margin auto for better centering */
        }

        .login-left {
            background: #2563eb;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 500px;
        }

        .login-right {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 500px;
            /* Added min-height for consistent card height */
        }

        .news-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .brand-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .brand-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .form-title {
            color: #1e293b;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: #64748b;
            margin-bottom: 2rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease, transform 0.2s ease;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control.is-valid {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .form-label {
            color: #374151;
            font-weight: 500;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .focused .form-label {
            color: #2563eb;
            transform: scale(0.9);
        }

        .btn-login {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
            color: white;
        }

        .btn-login:disabled {
            transform: none !important;
            box-shadow: none !important;
            opacity: 0.6;
            cursor: not-allowed;
        }

        .decorative-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .decorative-elements::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: rotate(45deg);
        }

        .decorative-elements::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -30%;
            width: 60%;
            height: 60%;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .custom-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            animation: slideInRight 0.3s ease;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Updated mobile responsiveness to hide left section and center form */
        @media (max-width: 768px) {
            .login-container {
                padding: 0.5rem;
                /* Reduced padding on mobile */
            }

            .login-card {
                max-width: 100%;
                /* Full width on mobile */
                margin: 0.5rem;
                /* Small margin on mobile */
            }

            .login-left {
                display: none !important;
                /* Hide left branding section on mobile */
            }

            .login-right {
                padding: 2rem 1.5rem;
                /* Adjusted padding for mobile */
                min-height: auto;
                /* Remove fixed height on mobile */
            }

            .brand-title {
                font-size: 1.5rem;
            }

            .news-icon {
                font-size: 3rem;
            }

            .form-title {
                font-size: 1.5rem;
                /* Adjusted form title size for mobile */
                text-align: center;
                /* Center align title on mobile */
            }

            .form-subtitle {
                text-align: center;
                /* Center align subtitle on mobile */
                margin-bottom: 1.5rem;
                /* Reduced margin on mobile */
            }
        }

        /* Added extra small devices support */
        @media (max-width: 576px) {
            .login-container {
                padding: 0.25rem;
            }

            .login-card {
                margin: 0.25rem;
                border-radius: 15px;
                /* Slightly smaller border radius on very small screens */
            }

            .login-right {
                padding: 1.5rem 1rem;
                /* Further reduced padding for very small screens */
            }

            .form-control {
                padding: 0.6rem 0.8rem;
                /* Adjusted input padding for small screens */
            }
        }
    </style>

    <div class="login-container">
        <div class="container-fluid"> <!-- Changed to container-fluid for better mobile handling -->
            <div class="row justify-content-center align-items-center min-vh-100"> <!-- Added align-items-center and min-vh-100 for perfect centering -->
                <div class="col-12 col-lg-10 col-xl-8"> <!-- Updated column classes for better responsiveness -->
                    <div class="login-card">
                        <div class="row g-0">
                            <!-- Added d-none d-md-block to hide on mobile -->
                            <div class="col-md-6 d-none d-md-block">
                                <div class="login-left position-relative">
                                    <div class="decorative-elements"></div>
                                    <div class="position-relative z-1">
                                        <i class="fas fa-newspaper news-icon"></i>
                                        <h2 class="brand-title">Mojokertoan News</h2>
                                        <p class="brand-subtitle">
                                            Sistem Administrasi Berita<br>
                                            Kelola konten dengan mudah dan efisien
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Updated column classes for full width on mobile -->
                            <div class="col-12 col-md-6">
                                <div class="login-right">
                                    <h1 class="form-title">Selamat Datang</h1>
                                    <p class="form-subtitle">Silakan masuk ke panel admin</p>

                                    <form action="{{ Route('authentication') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-user me-2"></i>Nama Pengguna
                                            </label>
                                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama pengguna" required>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">
                                                <i class="fas fa-lock me-2"></i>Kata Sandi
                                            </label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
                                        </div>

                                        <button type="submit" class="btn btn-login">
                                            <i class="fas fa-sign-in-alt me-2"></i>Masuk ke Admin
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form elements
            const form = document.querySelector('form');
            const nameInput = document.querySelector('input[name="name"]');
            const passwordInput = document.querySelector('input[name="password"]');
            const submitBtn = document.querySelector('.btn-login');

            // Add floating label effect
            function addFloatingLabelEffect(input) {
                const label = input.previousElementSibling;

                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                    this.style.transform = 'scale(1.02)';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                    this.style.transform = 'scale(1)';

                    if (this.value.trim() !== '') {
                        this.parentElement.classList.add('filled');
                    } else {
                        this.parentElement.classList.remove('filled');
                    }
                });
            }

            // Apply floating label effect to inputs
            addFloatingLabelEffect(nameInput);
            addFloatingLabelEffect(passwordInput);

            // Real-time form validation
            function validateInput(input, minLength = 3) {
                const value = input.value.trim();
                const isValid = value.length >= minLength;

                if (value.length > 0) {
                    if (isValid) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                    }
                } else {
                    input.classList.remove('is-valid', 'is-invalid');
                }

                return isValid;
            }

            // Add input validation listeners
            nameInput.addEventListener('input', function() {
                validateInput(this, 3);
                updateSubmitButton();
            });

            passwordInput.addEventListener('input', function() {
                validateInput(this, 6);
                updateSubmitButton();
            });

            // Update submit button state
            function updateSubmitButton() {
                const nameValid = nameInput.value.trim().length >= 3;
                const passwordValid = passwordInput.value.trim().length >= 6;

                if (nameValid && passwordValid) {
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = '1';
                    submitBtn.style.cursor = 'pointer';
                } else {
                    submitBtn.disabled = true;
                    submitBtn.style.opacity = '0.6';
                    submitBtn.style.cursor = 'not-allowed';
                }
            }

            // Initial button state
            updateSubmitButton();

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
                submitBtn.disabled = true;

                // If validation fails, prevent submission and restore button
                if (!validateInput(nameInput, 3) || !validateInput(passwordInput, 6)) {
                    e.preventDefault();
                    submitBtn.innerHTML = originalText;
                    updateSubmitButton();
                }
            });

        });
    </script>
@endsection
