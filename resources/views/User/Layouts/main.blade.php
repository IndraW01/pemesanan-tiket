
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard {{ auth()->user()->is_admin ? 'Admin' : 'User' }}</title>

    <!-- Custom fonts for this template-->
    <link href="/user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/user/css/sb-admin-2.min.css" rel="stylesheet">

    {{-- Sweet Alert CSS --}}
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('User.Layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('User.Layouts.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('user.content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelompok 4</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="/user/vendor/jquery/jquery.min.js"></script>
    <script src="/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/user/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="/user/js/sb-admin-2.min.js"></script>

    {{-- Sweet Alert JS --}}
    <script src="/js/sweetalert2.min.js"></script>

    <script>
        var flash = $('#flash').data('flash');
        @if (session()->has('status') && session('status') == 'success')
            if(flash) {
                Swal.fire({
                icon: 'success',
                title: 'Success',
                text: flash,
                })
            }
        @elseif (session()->has('status') && session('status') == 'failed')
            if(flash) {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: flash,
                })
            }
        @endif

        $(document).on('click', '#btn-logout', function(e) {
            Swal.fire({
                title: 'Are you sure to Logout?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#logoutform').submit();
                }
            })
        });

        $(document).on('click', '#btn-lunaskan', function(e) {
            Swal.fire({
                title: 'Apakah anda ingin melunaskan ?',
                text: "Transaksi anda akan diunaskan, dan tungggu jam tayang Film anda",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Lunaskan'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#lunaskan').submit();
                }
            })
        });

        $(document).on('click', '#btn-destroy', function(e) {
            Swal.fire({
                title: 'Apakah anda ingin menghapus transaksi ?',
                text: "Transaksi anda akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#destroy').submit();
                }
            })
        });

        $(document).on('click', '#btn-delete-film', function(e) {
            Swal.fire({
                title: 'Apakah anda ingin menghapus Film ?',
                text: "Film anda akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-film').submit();
                }
            })
        });
    </script>

</body>

</html>
