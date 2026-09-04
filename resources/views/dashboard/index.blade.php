@extends('layouts.app')

@section('content')

<style>

/* =========================================================
   DASHBOARD CARD
========================================================= */

.dashboard-card {
    border: none !important;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.dashboard-link {
    display: block;
    text-decoration: none !important;
    color: inherit !important;
    height: 100%;
}

.dashboard-link:hover .dashboard-card {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12) !important;
}

.dashboard-card .card-body {
    padding: 22px;
    position: relative;
    z-index: 2;
}

.dashboard-card h6 {
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 8px;
}

.dashboard-card h2 {
    font-size: 32px;
    font-weight: 700;
    margin: 0;
}

.card-icon {
    position: absolute;
    right: 20px;
    bottom: 15px;
    font-size: 55px;
    opacity: 0.15;
    transition: all 0.3s ease;
}

.dashboard-link:hover .card-icon {
    transform: scale(1.1);
}


/* =========================================================
   WARNA CARD
========================================================= */

.card-blue {
    background: linear-gradient(
        135deg,
        #dbeafe,
        #bfdbfe
    );
    color: #1e40af;
}

.card-purple {
    background: linear-gradient(
        135deg,
        #ede9fe,
        #ddd6fe
    );
    color: #6d28d9;
}

.card-green {
    background: linear-gradient(
        135deg,
        #d1fae5,
        #a7f3d0
    );
    color: #047857;
}

.card-orange {
    background: linear-gradient(
        135deg,
        #ffedd5,
        #fed7aa
    );
    color: #c2410c;
}

.card-teal {
    background: linear-gradient(
        135deg,
        #ccfbf1,
        #99f6e4
    );
    color: #0f766e;
}

.card-yellow {
    background: linear-gradient(
        135deg,
        #fef3c7,
        #fde68a
    );
    color: #b45309;
}

.card-cyan {
    background: linear-gradient(
        135deg,
        #cffafe,
        #a5f3fc
    );
    color: #0e7490;
}

.card-red {
    background: linear-gradient(
        135deg,
        #fee2e2,
        #fecaca
    );
    color: #b91c1c;
}


/* =========================================================
   CHART CARD
========================================================= */

.chart-card {
    border: none;
    border-radius: 15px;
}

.chart-card .card-header {
    background: white;
    border-bottom: 1px solid #eee;
    border-radius: 15px 15px 0 0;
    padding: 18px 20px;
}

.chart-card .card-body {
    padding: 20px;
}

.chart-container {
    position: relative;
    height: 320px;
}

</style>


{{-- =========================================================
     JUDUL DASHBOARD
========================================================= --}}

<h2 class="mb-4 fw-bold">
    Dashboard
</h2>


{{-- =========================================================
     BARIS 1
     MASTER DATA
========================================================= --}}

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-4 mb-4">


    {{-- =====================================================
         TOTAL ASSET
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-assets.index') }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-blue h-100">

                <div class="card-body">

                    <h6>
                        Total Asset
                    </h6>

                    <h2>
                        {{ $totalAssets }}
                    </h2>

                    <i class="bi bi-box-seam card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         COMPANY
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-companies.index') }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-purple h-100">

                <div class="card-body">

                    <h6>
                        Company
                    </h6>

                    <h2>
                        {{ $totalCompanies }}
                    </h2>

                    <i class="bi bi-buildings card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         CATEGORY
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-categories.index') }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-green h-100">

                <div class="card-body">

                    <h6>
                        Category
                    </h6>

                    <h2>
                        {{ $totalCategories }}
                    </h2>

                    <i class="bi bi-tags card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         LOCATION
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-locations.index') }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-orange h-100">

                <div class="card-body">

                    <h6>
                        Location
                    </h6>

                    <h2>
                        {{ $totalLocations }}
                    </h2>

                    <i class="bi bi-geo-alt card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         EMPLOYEE
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-employees.index') }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-purple h-100">

                <div class="card-body">

                    <h6>
                        Employee
                    </h6>

                    <h2>
                        {{ $totalEmployees }}
                    </h2>

                    <i class="bi bi-people card-icon"></i>

                </div>

            </div>

        </a>

    </div>

</div>



{{-- =========================================================
     BARIS 2
     STATUS ASSET
========================================================= --}}

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-4 mb-4">


    {{-- =====================================================
         READY
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-assets.index', ['status' => 'Ready']) }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-teal h-100">

                <div class="card-body">

                    <h6>
                        Ready
                    </h6>

                    <h2>
                        {{ $totalReady }}
                    </h2>

                    <i class="bi bi-check-circle card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         CHECKED OUT
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-assets.index', ['status' => 'Checked Out']) }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-yellow h-100">

                <div class="card-body">

                    <h6>
                        Checked Out
                    </h6>

                    <h2>
                        {{ $totalCheckout }}
                    </h2>

                    <i class="bi bi-box-arrow-right card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         MAINTENANCE
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-assets.index', ['status' => 'Maintenance']) }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-cyan h-100">

                <div class="card-body">

                    <h6>
                        Maintenance
                    </h6>

                    <h2>
                        {{ $totalMaintenanceAsset }}
                    </h2>

                    <i class="bi bi-tools card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         RETURNED
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-assets.index', ['status' => 'Returned']) }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-purple h-100">

                <div class="card-body">

                    <h6>
                        Returned
                    </h6>

                    <h2>
                        {{ $totalReturned }}
                    </h2>

                    <i class="bi bi-arrow-return-left card-icon"></i>

                </div>

            </div>

        </a>

    </div>


    {{-- =====================================================
         RETIRED
    ====================================================== --}}

    <div class="col">

        <a
            href="{{ route('master-assets.index', ['status' => 'Retired']) }}"
            class="dashboard-link"
        >

            <div class="card shadow-sm dashboard-card card-red h-100">

                <div class="card-body">

                    <h6>
                        Retired
                    </h6>

                    <h2>
                        {{ $totalRetired }}
                    </h2>

                    <i class="bi bi-archive card-icon"></i>

                </div>

            </div>

        </a>

    </div>

</div>



{{-- =========================================================
     GRAFIK
========================================================= --}}

<div class="row">


    {{-- =====================================================
         DONUT CHART
    ====================================================== --}}

    <div class="col-lg-5 mb-4">

        <div class="card shadow-sm chart-card h-100">

            <div class="card-header">

                <h5 class="fw-bold mb-1">

                    <i class="fas fa-chart-pie text-primary me-2"></i>

                    Persentase Status Asset

                </h5>

                <small class="text-muted">

                    Distribusi asset berdasarkan status

                </small>

            </div>


            <div class="card-body">

                <div class="chart-container">

                    <canvas id="assetStatusChart"></canvas>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         BAR CHART
    ====================================================== --}}

    <div class="col-lg-7 mb-4">

        <div class="card shadow-sm chart-card h-100">

            <div class="card-header">

                <h5 class="fw-bold mb-1">

                    <i class="fas fa-chart-bar text-primary me-2"></i>

                    Jumlah Asset Berdasarkan Status

                </h5>

                <small class="text-muted">

                    Statistik seluruh asset dalam sistem

                </small>

            </div>


            <div class="card-body">

                <div class="chart-container">

                    <canvas id="assetStatusBarChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- =========================================================
     CHART.JS
========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {


    // =====================================================
    // DATA DATABASE
    // =====================================================

    const ready = {{ $totalReady }};

    const checkedOut = {{ $totalCheckout }};

    const maintenance = {{ $totalMaintenanceAsset }};

    const returned = {{ $totalReturned }};

    const retired = {{ $totalRetired }};


    // =====================================================
    // TOTAL STATUS
    // =====================================================

    const totalStatus =
        ready +
        checkedOut +
        maintenance +
        returned +
        retired;


    // =====================================================
    // DOUGHNUT CHART
    // =====================================================

    const statusChartElement =
        document.getElementById('assetStatusChart');


    if (statusChartElement) {

        new Chart(
            statusChartElement,
            {
                type: 'doughnut',

                data: {

                    labels: [
                        'Ready',
                        'Checked Out',
                        'Maintenance',
                        'Returned',
                        'Retired'
                    ],

                    datasets: [{

                        data: [
                            ready,
                            checkedOut,
                            maintenance,
                            returned,
                            retired
                        ],

                        backgroundColor: [
                            '#20c997',
                            '#ffc107',
                            '#0dcaf0',
                            '#6f42c1',
                            '#dc3545'
                        ],

                        borderWidth: 2,

                        borderColor: '#ffffff'

                    }]

                },


                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    cutout: '65%',


                    plugins: {

                        legend: {

                            position: 'bottom',

                            labels: {

                                padding: 15,

                                usePointStyle: true

                            }

                        },


                        tooltip: {

                            callbacks: {

                                label: function(context) {

                                    const value =
                                        context.raw;

                                    const percentage =
                                        totalStatus > 0
                                            ? (
                                                (value / totalStatus) * 100
                                            ).toFixed(1)
                                            : 0;


                                    return (
                                        context.label +
                                        ': ' +
                                        value +
                                        ' asset (' +
                                        percentage +
                                        '%)'
                                    );

                                }

                            }

                        }

                    }

                }

            }
        );

    }



    // =====================================================
    // BAR CHART
    // =====================================================

    const barChartElement =
        document.getElementById('assetStatusBarChart');


    if (barChartElement) {

        new Chart(
            barChartElement,
            {
                type: 'bar',

                data: {

                    labels: [
                        'Ready',
                        'Checked Out',
                        'Maintenance',
                        'Returned',
                        'Retired'
                    ],

                    datasets: [{

                        label: 'Jumlah Asset',

                        data: [
                            ready,
                            checkedOut,
                            maintenance,
                            returned,
                            retired
                        ],

                        backgroundColor: [
                            '#20c997',
                            '#ffc107',
                            '#0dcaf0',
                            '#6f42c1',
                            '#dc3545'
                        ],

                        borderRadius: 8,

                        borderSkipped: false

                    }]

                },


                options: {

                    responsive: true,

                    maintainAspectRatio: false,


                    scales: {

                        y: {

                            beginAtZero: true,

                            ticks: {

                                precision: 0

                            },

                            grid: {

                                color: '#eeeeee'

                            }

                        },


                        x: {

                            grid: {

                                display: false

                            }

                        }

                    },


                    plugins: {

                        legend: {

                            display: false

                        },


                        tooltip: {

                            callbacks: {

                                label: function(context) {

                                    return (
                                        ' ' +
                                        context.raw +
                                        ' Asset'
                                    );

                                }

                            }

                        }

                    }

                }

            }
        );

    }

});

</script>

@endsection