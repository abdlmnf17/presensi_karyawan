<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Aplikasi Absensi') }}</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Your existing styles -->
    <style>
        body {
            padding-top: 56px; /* Adjust this value according to your navbar height */
        }

        .navbar {
            transition: top 0.3s; /* Add smooth transition effect */
        }

        .navbar.sticky {
            position: fixed;
            top: 0;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for a visual effect */
            background-color: #fff; /* Optional: Customize background color */
            z-index: 1000; /* Optional: Ensure it's above other elements */
        }

        #sidebar {
            min-width: 225px;
            max-width: 225px;
            min-height: 100vh;
        }

        .nav-link i {
            margin-right: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand mr-auto" href="{{ url('/') }}">
                    {{ config('app.name', 'Aplikasi Absensi ') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <!-- Left side of the Navbar content -->
                    </ul>

                    <ul class="navbar-nav mx-auto">
                        <ul class="navbar-nav mx-auto">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="karyawanDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">badge</i> Karyawan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="karyawanDropdown">
                                    <a class="dropdown-item" href="/karyawan/profile">Data Karyawan</a>
                                    <a class="dropdown-item" href="/karyawan/lembur">Lemburan</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="presensiDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">event_available</i> Presensi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="presensiDropdown">
                                    <a class="dropdown-item" href="/karyawan/presensi">Absen karyawan</a>
                                    {{-- <a class="dropdown-item" href="#">Submenu 2</a>
                                    <a class="dropdown-item" href="#">Submenu 3</a> --}}
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="cutiDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">calendar_view_month</i> Cuti
                                </a>
                                <div class="dropdown-menu" aria-labelledby="cutiDropdown">
                                    <a class="dropdown-item" href="/karyawan/cuti">Cuti Karyawan</a>
                                </div>
                            </li>

                        </ul>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <!-- Right side of the Navbar content -->
                        <!-- ... -->

                        <ul class="navbar-nav ms-auto">

                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}
                                        </a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <i class="bi bi-person-plus"></i> {{ __('Register') }}
                                        </a>
                                    </li>
                                @endif
                                @else

                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="material-icons">
                                            account_circle
                                            </i> {{ Auth::user()->name }} ({{ Auth::user()->role }})
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>


                            @endguest
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <!-- Main content -->
            <!-- ... -->
            {{-- @if (Auth::check())
    @if (Auth::user()->hasRole('admin'))
        @include('layouts.admin-navigation') <!-- Include admin navigation jika role-nya admin -->
    @else
        @include('layouts.karyawan-navigation') <!-- Include karyawan navigation jika role-nya karyawan -->

    @endif
@endif --}}

@yield('content')
        </main>

        <footer class="bg-dark text-white text-center py-3">
            <div class="container">
                <p>&copy; 2023 Aplikasi Presensi. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS and other scripts... -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</body>
</html>
