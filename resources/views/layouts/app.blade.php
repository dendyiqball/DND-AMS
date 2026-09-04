<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
          <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-dnd.png') }}">

    <title>
        DND-AMS | Asset Management System
    </title>


    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    {{-- Bootstrap Icons --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">


    {{-- Font Awesome --}}
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        rel="stylesheet">


    {{-- Custom CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/style.css') }}">



    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            box-sizing: border-box;
        }


        html,
        body {

            margin: 0;
            padding: 0;

            width: 100%;
            min-height: 100%;

        }


        body {

            background: #f4f6f9;

            color: #212529;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            overflow-x: hidden;

        }



        /* =====================================================
           TOP HEADER
        ===================================================== */

        .top-header {

            position: fixed;

            top: 0;
            left: 0;

            width: 100%;
            height: 56px;

            background: #0d8fbd;

            display: flex;

            align-items: center;

            z-index: 1100;

            box-shadow:
                0 2px 5px rgba(0,0,0,0.12);

        }



        /* =====================================================
           TOGGLE BUTTON
        ===================================================== */

        .sidebar-toggle {

            width: 56px;
            height: 56px;

            border: none;

            border-radius: 0;

            background: #087da7;

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            flex-shrink: 0;

            transition:
                background 0.2s ease;

        }


        .sidebar-toggle:hover {

            background: #076d91;

        }


        .sidebar-toggle i {

            font-size: 15px;

        }



        /* =====================================================
           BRAND
        ===================================================== */

        .top-brand {

            height: 56px;

            display: flex;

            align-items: center;

            padding: 0 18px;

            color: #ffffff;

            font-size: 16px;

            font-weight: 600;

            letter-spacing: 0.2px;

        }


        .top-brand i {

            margin-right: 8px;

            font-size: 16px;

        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            top: 56px;
            left: 0;

            width: 260px;

            height: calc(100vh - 56px);

            background: #29485a;

            z-index: 1000;

            overflow-y: auto;

            overflow-x: hidden;

            transition:
                width 0.25s ease;

        }


        /* Scrollbar */

        .sidebar::-webkit-scrollbar {

            width: 5px;

        }


        .sidebar::-webkit-scrollbar-thumb {

            background: rgba(255,255,255,0.15);

            border-radius: 10px;

        }



        /* =====================================================
           MENU
        ===================================================== */

        .menu {

            list-style: none;

            margin: 0;

            padding: 10px 0;

        }


        .menu li {

            margin: 0;

            padding: 0;

        }


        .menu li a {

            height: 42px;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 0 18px;

            color: #e8eef2;

            text-decoration: none;

            font-size: 12px;

            white-space: nowrap;

            transition:
                background 0.2s ease,
                color 0.2s ease;

        }


        .menu li a i {

            width: 18px;

            min-width: 18px;

            text-align: center;

            font-size: 12px;

        }


        .menu li a:hover {

            background: rgba(255,255,255,0.08);

            color: #ffffff;

        }


        /* Active */

        .menu li a.active {

            background: #087da7;

            color: #ffffff;

        }


        .menu li a.active:hover {

            background: #087da7;

        }



        /* Divider */

        .menu-divider {

            height: 1px;

            margin: 10px 15px;

            background: rgba(255,255,255,0.18);

        }



        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main-content {

            width: calc(100% - 260px);

            min-height: 100vh;

            margin-left: 260px;

            padding: 76px 25px 30px;

            transition:
                margin-left 0.25s ease,
                width 0.25s ease;

        }



        /* =====================================================
           COLLAPSED SIDEBAR
        ===================================================== */

        body.sidebar-collapsed .sidebar {

            width: 0;

        }


        body.sidebar-collapsed .main-content {

            margin-left: 0;

            width: 100%;

        }



        /* =====================================================
           NAVBAR
        ===================================================== */

        .main-navbar {

            width: 100%;

            min-height: 70px;

            background: #ffffff;

            border-radius: 12px;

            padding: 15px 20px;

            margin-bottom: 25px;

            box-shadow:
                0 2px 10px rgba(0,0,0,0.07);

        }



        /* =====================================================
           PAGE TITLE
        ===================================================== */

        .page-title {

            font-size: 28px;

            font-weight: 700;

            color: #263746;

            margin-bottom: 20px;

        }



        /* =====================================================
           CARD
        ===================================================== */

        .card {

            border: none;

            border-radius: 12px;

            box-shadow:
                0 4px 12px rgba(0,0,0,0.08);

        }



        /* =====================================================
           TABLE
        ===================================================== */

        .table {

            vertical-align: middle;

        }


        .table thead th {

            font-weight: 600;

            white-space: nowrap;

        }



        /* =====================================================
           BUTTON
        ===================================================== */

        .btn {

            border-radius: 8px;

        }



        /* =====================================================
           BADGE
        ===================================================== */

        .badge {

            font-size: 12px;

            padding: 6px 9px;

            border-radius: 6px;

        }



        /* =====================================================
           ALERT
        ===================================================== */

        .alert {

            border: none;

            border-radius: 10px;

            box-shadow:
                0 3px 10px rgba(0,0,0,0.05);

        }



        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 992px) {

            .sidebar {

                width: 260px;

                transform:
                    translateX(-100%);

                transition:
                    transform 0.25s ease;

            }


            body.sidebar-mobile-open .sidebar {

                transform:
                    translateX(0);

            }


            .main-content {

                width: 100%;

                margin-left: 0;

                padding:
                    76px 15px 25px;

            }


            body.sidebar-collapsed .sidebar {

                width: 260px;

            }

        }



        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 576px) {

            .top-brand {

                font-size: 15px;

                padding-left: 12px;

            }


            .sidebar-toggle {

                width: 50px;

            }


            .main-content {

                padding:
                    70px 12px 20px;

            }


            .main-navbar {

                border-radius: 9px;

            }


            .page-title {

                font-size: 23px;

            }

        }

    </style>

</head>


<body>


    {{-- =====================================================
         TOP HEADER
    ====================================================== --}}

    <header class="top-header">


        {{-- Toggle --}}

        <button
            type="button"
            id="sidebarToggle"
            class="sidebar-toggle"
            title="Toggle Sidebar">

            <i class="fa-solid fa-bars"></i>

        </button>


        {{-- Brand --}}

        <div class="top-brand">

            <i class="fa-solid fa-laptop"></i>

            DND-AMS | ASSET MANAGEMENT SYSTEM

        </div>


    </header>



    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    @include('layouts.sidebar')



    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main
        id="mainContent"
        class="main-content">


        {{-- Navbar --}}

        <div class="main-navbar">

            @include('layouts.navbar')

        </div>



        {{-- =================================================
             SUCCESS ALERT
        ================================================== --}}

        @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif



        {{-- =================================================
             ERROR ALERT
        ================================================== --}}

        @if(session('error'))

            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert">

                <i class="bi bi-x-circle-fill me-2"></i>

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif



        {{-- =================================================
             VALIDATION ERROR
        ================================================== --}}

        @if($errors->any())

            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert">

                <strong>
                    Terdapat kesalahan:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif



        {{-- =================================================
             CONTENT
        ================================================== --}}

        @yield('content')


    </main>



    {{-- Footer --}}

    @include('layouts.footer')



    {{-- Bootstrap JS --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>



    {{-- =====================================================
         SIDEBAR TOGGLE
    ====================================================== --}}

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {

                const toggle =
                    document.getElementById(
                        'sidebarToggle'
                    );

                if (!toggle) {
                    return;
                }


                toggle.addEventListener(
                    'click',
                    function () {

                        /*
                        Desktop
                        */

                        if (window.innerWidth > 992) {

                            document.body.classList.toggle(
                                'sidebar-collapsed'
                            );

                        }

                        /*
                        Mobile
                        */

                        else {

                            document.body.classList.toggle(
                                'sidebar-mobile-open'
                            );

                        }

                    }
                );

            }
        );

    </script>



    @stack('scripts')


</body>

</html>