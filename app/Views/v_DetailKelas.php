<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?= $title; ?></title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/css/feather.css">
    <link rel="stylesheet" href="/css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/css/app-light.css" id="lightTheme">
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <!-- Navbar atas -->
        <?= $this->include('Layout/navbar_atas'); ?>

        <!-- Menu Samping -->
        <?= $this->include('Layout/menu_samping'); ?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">KELAS 5 - A</h2>
                        <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table. </p>


                        <!-- Detail Data Kelas -->
                        <div class="row my-4">
                            <div class="col-md-10">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="formGroupExampleInput">Kelas</label>
                                                    <input type="text" class="form-control col-md-12 mb-3" id="txtNmKelas" name="txtNmKelas" value="" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <label for="formGroupExampleInput">Jumlah Siswa</label>
                                                    <input type="text" class="form-control col-md-10" id="txtJumSiswa" name="txtJumSiswa" value=" Siswa" readonly>
                                                </div>
                                            </div>
                                            <div class=" form-row">
                                                <div class="col">
                                                    <label for="formGroupExampleInput">Nama Wali Kelas</label>
                                                    <input type="text" class="form-control col-md-12 mb-3" id="txtNmWaliKls" name="txtNmWaliKls" value="" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <label for="formGroupExampleInput">Jumlah Siswa Laki-Laki</label>
                                                    <input type="text" class="form-control col-md-10" id="txtJumSiswaL" name="txtJumSiswaL" value=" Siswa" readonly>
                                                </div>
                                            </div>
                                            <div class=" form-row">
                                                <div class="col">
                                                    <input type="hidden" class="form-control col-md-12 mb-3" value="" readonly>
                                                </div>
                                                <div class=" col ml-5">
                                                    <label for="formGroupExampleInput">Jumlah Siswa Prempuan</label>
                                                    <input type="text" class="form-control col-md-10" id="txtJumSiswaP" name="txtJumSiswaP" value=" Siswi" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md">
                                <button type="button" class="btn mb-2 btn-primary"><span class="fe fe-settings fe-16 mr-2"></span>Ubah Data Kelas</button>
                            </div>


                        </div>


                        <div class="row mt-5">
                            <div class="col-12">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class=" nav-link active" aria-current="page" href="/adm/kry/all">Data Siswa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/adm/kry/all">Nilai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/adm/kry/all">Nilai Ekstrakurikuler</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/adm/kry/all">Nilai Kepribadian</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link " aria-current="page" href="/adm/kry/all">Absensi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <!-- Tabs -->
                                                <h5 class="card-title">Simple Table</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                            <div class="col">
                                                <a class="btn mb-2 btn-primary btn-sm float-right" href="/adm/snk" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Tambah Kelas Baru</a>
                                            </div>
                                        </div>


                                        <br>
                                        <!-- Tabel -->
                                        <table class="table datatables" id="dataTable-1">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>NIP</th>
                                                    <th>Name</th>
                                                    <th>Jabatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td> <img src="/assets/avatars/face-1.jpg" alt="..." width='50px' class="avatar-img rounded-circle"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Remove</a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->

                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->


        </main> <!-- main -->

    </div> <!-- .wrapper -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <script src='/js/daterangepicker.js'></script>
    <script src='/js/jquery.stickOnScroll.js'></script>
    <script src="/js/tinycolor-min.js"></script>
    <script src="/js/config.js"></script>
    <script src='/js/jquery.dataTables.min.js'></script>
    <script src='/js/dataTables.bootstrap4.min.js'></script>
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>
    <script src="/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>