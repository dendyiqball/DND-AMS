<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>DND-AMS | Login</title>


    {{-- ==================================================
         FAVICON DND-AMS
    ================================================== --}}

    <link rel="icon"
          type="image/png"
          href="{{ asset('assets/images/logo-dnd.png') }}?v=2026">

    <link rel="shortcut icon"
          type="image/png"
          href="{{ asset('assets/images/logo-dnd.png') }}?v=2026">

    <link rel="apple-touch-icon"
          href="{{ asset('assets/images/logo-dnd.png') }}?v=2026">


    {{-- ==================================================
         FONT AWESOME
    ================================================== --}}

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    {{-- ==================================================
         DND-AMS CSS
    ================================================== --}}

    <link rel="stylesheet"
          href="{{ asset('assets/css/style.css') }}?v=2026">

</head>


<body class="login-page">


<div class="login-container">


    {{-- ==================================================
         LEFT SIDE
    ================================================== --}}

    <div class="login-brand">

        <div class="brand-content">

            <div class="brand-logo">

                <i class="fa-solid fa-laptop"></i>

            </div>


            <h1>
                DND-AMS
            </h1>


            <h2>
                Asset Management System
            </h2>


            <p>
                Sistem manajemen aset laptop untuk
                pengelolaan, monitoring, transaksi,
                maintenance, dan pelaporan aset.
            </p>


            <div class="brand-line"></div>


            <div class="brand-info">

                <div>
                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Secure Asset Management
                    </span>
                </div>


                <div>
                    <i class="fa-solid fa-chart-line"></i>

                    <span>
                        Real-time Asset Monitoring
                    </span>
                </div>


                <div>
                    <i class="fa-solid fa-screwdriver-wrench"></i>

                    <span>
                        Maintenance Management
                    </span>
                </div>

            </div>

        </div>

    </div>



    {{-- ==================================================
         RIGHT SIDE
    ================================================== --}}

    <div class="login-form-area">


        <div class="login-card">


            {{-- Header --}}

            <div class="login-header">

                <div class="mobile-logo">

                    <i class="fa-solid fa-laptop"></i>

                </div>


                <h3>
                    Welcome Back
                </h3>


                <p>
                    Silakan masuk untuk mengakses
                    DND-AMS
                </p>

            </div>



            {{-- Error --}}

            @if ($errors->any())

                <div class="login-alert">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div>

                        @foreach ($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif



            {{-- Login Form --}}

            <form method="POST"
                  action="{{ route('login') }}">

                @csrf


                {{-- Email --}}

                <div class="login-field">

                    <label for="email">
                        Email
                    </label>


                    <div class="input-wrapper">

                        <i class="fa-solid fa-envelope"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus>

                    </div>

                </div>



                {{-- Password --}}

                <div class="login-field">

                    <label for="password">
                        Password
                    </label>


                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required>


                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()">

                            <i id="passwordIcon"
                               class="fa-solid fa-eye"></i>

                        </button>

                    </div>

                </div>



                {{-- Remember --}}

                <div class="login-options">

                    <label class="remember-me">

                        <input
                            type="checkbox"
                            name="remember">

                        <span>
                            Remember me
                        </span>

                    </label>

                </div>



                {{-- Login Button --}}

                <button
                    type="submit"
                    class="login-button">

                    <span>

                        <i class="fa-solid fa-right-to-bracket"></i>

                        Login

                    </span>

                </button>


            </form>



            {{-- Footer --}}

            <div class="login-footer">

                <span>
                    © {{ date('Y') }}
                </span>

                <strong>
                    DND-AMS
                </strong>

                <span>
                    | Asset Management System
                </span>

                <br>

                <small>
                    CV. Mitra Parama Indonesia Site Semarang
                </small>

            </div>


        </div>

    </div>

</div>



{{-- ==================================================
     PASSWORD TOGGLE
================================================== --}}

<script>

function togglePassword() {

    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('passwordIcon');


    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('fa-eye');

        icon.classList.add('fa-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('fa-eye-slash');

        icon.classList.add('fa-eye');

    }

}

</script>


</body>

</html>