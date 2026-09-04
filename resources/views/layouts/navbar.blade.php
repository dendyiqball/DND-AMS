{{-- =========================================================
     DND-AMS TOP NAVBAR
========================================================= --}}

<div class="top-navbar">

    {{-- =========================
         TANGGAL - KIRI
    ========================== --}}
    <div class="top-navbar-date">

        <i class="fa-solid fa-calendar-days"></i>

        <span>
            {{ date('d M Y') }}
        </span>

    </div>


    {{-- =========================
         JAM - TENGAH
    ========================== --}}
    <div class="top-navbar-clock">

        <i class="fa-solid fa-clock"></i>

        <span id="clock">
            00:00:00
        </span>

    </div>


    {{-- =========================
         ADMIN - KANAN
    ========================== --}}
    <div class="top-navbar-user">

        <div class="dropdown">

            <a href="#"
               class="top-user-button dropdown-toggle"
               data-bs-toggle="dropdown"
               aria-expanded="false">

                {{-- Avatar --}}
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Administrator') }}&background=0D6EFD&color=fff"
                    alt="Administrator"
                    class="top-user-avatar"
                >


                {{-- Nama --}}
                <div class="top-user-info">

                    <strong>
                        {{ Auth::user()->name ?? 'Administrator' }}
                    </strong>

                    <small>
                        System Admin
                    </small>

                </div>

            </a>


            {{-- =========================
                 DROPDOWN
            ========================== --}}
            <ul class="dropdown-menu dropdown-menu-end top-user-dropdown">

                <li>

                    <a class="dropdown-item"
                       href="{{ route('profile') }}">

                        <i class="fa-solid fa-user me-2"></i>

                        Profile

                    </a>

                </li>


                <li>
                    <hr class="dropdown-divider">
                </li>


                <li>

                    <a class="dropdown-item text-danger"
                       href="#"
                       onclick="event.preventDefault(); document.getElementById('navbarLogoutForm').submit();">

                        <i class="fa-solid fa-right-from-bracket me-2"></i>

                        Logout

                    </a>

                </li>

            </ul>

        </div>


        {{-- Logout Form --}}
        <form id="navbarLogoutForm"
              action="{{ route('logout') }}"
              method="POST"
              style="display:none;">

            @csrf

        </form>

    </div>

</div>


{{-- =========================================================
     STYLE NAVBAR
========================================================= --}}

<style>

    /* =========================================
       TOP NAVBAR
    ========================================= */

    .top-navbar {

        position: relative;

        width: 100%;
        height: 80px;

        background: #ffffff;

        border-radius: 15px;

        box-shadow: 0 5px 15px rgba(0,0,0,.08);

        margin-bottom: 25px;

        display: flex;

        align-items: center;

        padding: 0 25px;

    }


    /* =========================================
       TANGGAL - KIRI
    ========================================= */

    .top-navbar-date {

        display: flex;

        align-items: center;

        gap: 7px;

        color: #536779;

        font-size: 14px;

        white-space: nowrap;

    }


    .top-navbar-date i {

        font-size: 14px;

    }


    /* =========================================
       JAM - TENGAH
    ========================================= */

    .top-navbar-clock {

        position: absolute;

        left: 50%;

        top: 50%;

        transform: translate(-50%, -50%);

        display: flex;

        align-items: center;

        gap: 7px;

        color: #536779;

        font-size: 14px;

        white-space: nowrap;

    }


    .top-navbar-clock i {

        font-size: 14px;

    }


    /* =========================================
       USER - KANAN
    ========================================= */

    .top-navbar-user {

        margin-left: auto;

        display: flex;

        align-items: center;

    }


    .top-user-button {

        display: flex;

        align-items: center;

        gap: 9px;

        color: #2c3e50;

        text-decoration: none;

        padding: 4px 0;

    }


    .top-user-button:hover {

        color: #2c3e50;

    }


    /* =========================================
       AVATAR
    ========================================= */

    .top-user-avatar {

        width: 42px;

        height: 42px;

        border-radius: 50%;

        border: 2px solid #0d6efd;

        object-fit: cover;

    }


    /* =========================================
       USER INFO
    ========================================= */

    .top-user-info {

        display: flex;

        flex-direction: column;

        justify-content: center;

        line-height: 1.2;

        min-width: 100px;

    }


    .top-user-info strong {

        font-size: 14px;

        font-weight: 600;

        color: #2c3e50;

    }


    .top-user-info small {

        margin-top: 4px;

        font-size: 12px;

        color: #7f8c8d;

    }


    /* =========================================
       DROPDOWN
    ========================================= */

    .top-user-dropdown {

        margin-top: 10px !important;

        border: none;

        border-radius: 12px;

        box-shadow: 0 10px 25px rgba(0,0,0,.12);

        min-width: 180px;

    }


    .top-user-dropdown .dropdown-item {

        padding: 10px 16px;

        font-size: 14px;

    }


    .top-user-dropdown .dropdown-item:hover {

        background: #f1f5f9;

    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media(max-width:768px) {

        .top-navbar {

            height: 70px;

            padding: 0 15px;

        }


        .top-navbar-date {

            font-size: 12px;

        }


        .top-navbar-clock {

            font-size: 12px;

        }


        .top-user-info {

            display: none;

        }


        .top-user-avatar {

            width: 38px;

            height: 38px;

        }

    }

</style>


{{-- =========================================================
     CLOCK SCRIPT
========================================================= --}}

<script>

    function updateClock() {

        const now = new Date();

        const hours =
            String(now.getHours()).padStart(2, '0');

        const minutes =
            String(now.getMinutes()).padStart(2, '0');

        const seconds =
            String(now.getSeconds()).padStart(2, '0');


        const clock =
            document.getElementById('clock');


        if (clock) {

            clock.textContent =
                hours + ':' +
                minutes + ':' +
                seconds;

        }

    }


    updateClock();

    setInterval(updateClock, 1000);

</script>