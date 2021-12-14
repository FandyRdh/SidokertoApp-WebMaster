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
                        <h2 class="mb-2 page-title">Data Karyawan</h2>
                        <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table. </p>
                        <!-- Alret Insert -->
                        <?php if (session()->getFlashdata('pesan_insert')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('pesan_insert'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('pesan_Update')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('pesan_Update'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Alret Delete -->
                        <?php if (session()->getFlashdata('pesan_hapus')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan_hapus'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <!-- Tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class=" nav-link <?php echo $KlikId ==  "all" ? 'active' : ''; ?>" aria-current="page" href="/adm/kry/all">Semua</a>
                                                    </li>

                                                    <?php foreach ($DataJbt->getResultArray()  as $DataJbt) : ?>
                                                        <li class="nav-item ">
                                                            <a class="nav-link <?php echo $KlikId ==  $DataJbt['ID_JABATAN'] ? 'active' : ''; ?>" href="/adm/kry/<?= $DataJbt['ID_JABATAN']; ?>"><?= $DataJbt['NAMA_JABATAN']; ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Tambah Karyawan Baru
                                                </button>
                                            </div>
                                        </div>


                                        <br>
                                        <!-- Tabel -->
                                        <table class="table datatables" id="dataTable-1">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Jenis Klamin</th>
                                                    <th>No Telp</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($DataKry->getResultArray()  as $DataKry) : ?>
                                                    <tr>
                                                        <td><img src="/assets/images/profile_kry/<?= $DataKry['FOTO_KRY']; ?>" alt="..." width='70px' class="avatar-img rounded-circle"></td>
                                                        <td><?= $DataKry['NAMA_KRY']; ?><br>(<?= $DataKry['NIP']; ?>)</td>
                                                        <td><?= $DataKry['ALAMAT_KRY']; ?></td>
                                                        <td><?= $DataKry['JK_KRY']; ?></td>
                                                        <td><?= $DataKry['TLP_KRY']; ?></td>
                                                        <!-- <td><?= $DataKry['TGL_LAHIR']; ?></td> -->
                                                        <td><?= $DataKry['EMAIL_KRY']; ?></td>
                                                        <td> <a class="btn mb-2 btn-primary btn-sm float-right" href="/adm/kry/detail/<?= $DataKry['ID_KRY']; ?>" data-whatever="@mdo">Lihat Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Jenis jabatan Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <a class="btn btn-outline-primary mr-1" href="/adm/kry/add/JB002">Tamabah Guru</a>
                            <!-- <a  class="btn btn-outline-primary mr-1" href="/adm/kry/add/(:segment)">Tamabah Guru Mata Pelajaran</a> -->
                            <a class="btn btn-outline-primary mr-1" href="/adm/kry/add/JB001">Tamabah Admin</a>
                            <!-- <a class="btn btn-outline-primary mr-1" href="/adm/kry/add/JB81868">Tamabah Kepala Sekolah</a>  -->
                            <!-- <HR> -->
                            <!-- <button type="button" class="btn btn-outline-primary mr-1">Jabtan Lain..</button> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>

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