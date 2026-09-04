<div id="sidebar" class="sidebar">

    {{-- =====================================================
         SIDEBAR MENU
    ====================================================== --}}

    <div class="sidebar-menu">

        <ul class="menu">

            {{-- =================================================
                 UTAMA
            ================================================== --}}

            <li class="menu-section">
                <span>UTAMA</span>
            </li>

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <i class="fa-solid fa-house"></i>

                    <span>Dashboard</span>

                </a>
            </li>


            {{-- =================================================
                 MASTER DATA
            ================================================== --}}

            <li class="menu-section">
                <span>MASTER DATA</span>
            </li>


            {{-- Company --}}
            <li>
                <a href="{{ route('master-companies.index') }}"
                   class="{{ request()->routeIs('master-companies.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-building"></i>

                    <span>Company</span>

                </a>
            </li>


            {{-- Category --}}
            <li>
                <a href="{{ route('master-categories.index') }}"
                   class="{{ request()->routeIs('master-categories.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-layer-group"></i>

                    <span>Category</span>

                </a>
            </li>


            {{-- Location --}}
            <li>
                <a href="{{ route('master-locations.index') }}"
                   class="{{ request()->routeIs('master-locations.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-location-dot"></i>

                    <span>Location</span>

                </a>
            </li>


            {{-- Employees --}}
            <li>
                <a href="{{ route('master-employees.index') }}"
                   class="{{ request()->routeIs('master-employees.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-users"></i>

                    <span>Employees</span>

                </a>
            </li>


            {{-- Assets --}}
            <li>
                <a href="{{ route('master-assets.index') }}"
                   class="{{ request()->routeIs('master-assets.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-laptop"></i>

                    <span>Assets</span>

                </a>
            </li>


            {{-- =================================================
                 OPERASIONAL
            ================================================== --}}

            <li class="menu-section">
                <span>OPERASIONAL</span>
            </li>


            {{-- Asset Transaction --}}
            <li>
                <a href="{{ route('asset-transactions.index') }}"
                   class="{{ request()->routeIs('asset-transactions.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-right-left"></i>

                    <span>Asset Transaction</span>

                </a>
            </li>


            {{-- Maintenance --}}
            <li>
                <a href="{{ route('maintenances.index') }}"
                   class="{{ request()->routeIs('maintenances.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-screwdriver-wrench"></i>

                    <span>Maintenance</span>

                </a>
            </li>


            {{-- =================================================
                 LAPORAN
            ================================================== --}}

            <li class="menu-section">
                <span>LAPORAN</span>
            </li>


            {{-- Report --}}
            <li>
                <a href="{{ route('reports.index') }}"
                   class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-chart-column"></i>

                    <span>Report</span>

                </a>
            </li>

        </ul>

    </div>


    {{-- =====================================================
         BOTTOM MENU
         AKUN
    ====================================================== --}}

    <div class="sidebar-bottom">

        <ul class="menu">

            {{-- =================================================
                 AKUN
            ================================================== --}}

            <li class="menu-section">
                <span>AKUN</span>
            </li>


            {{-- Profile --}}
            <li>

                <a href="{{ route('profile') }}"
                   class="profile-link {{ request()->routeIs('profile*') ? 'active' : '' }}">

                    <i class="fa-solid fa-user"></i>

                    <span>Profile</span>

                </a>

            </li>


            {{-- Logout --}}
            <li>

                <a href="{{ route('logout') }}"
                   class="logout-link"
                   onclick="
                        event.preventDefault();
                        document.getElementById('sidebarLogoutForm').submit();
                   ">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>Logout</span>

                </a>


                <form
                    id="sidebarLogoutForm"
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display:none;"
                >

                    @csrf

                </form>

            </li>

        </ul>

    </div>

</div>