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
                        <h2 class="page-title">Data Master</h2>
                        <hr>
                        <!-- <p> Tables with built-in bootstrap styles </p> -->
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

                        <!-- baris 2 -->
                        <div class="row">
                            <!-- Striped rows -->
                            <!-- Tabel Jabatan -->
                            <div class="col-md-6 my-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Data Master Jabatan</h5>
                                            </div>
                                            <div class="col">
                                                <a class="btn mb-2 btn-primary btn-sm float-right" href="/adm/snk" data-toggle="modal" data-target="#JabatanModel" data-whatever="@mdo">Tambah Jabatan Baru</a>
                                                <!-- Ini Modal Input Jabtan -->
                                                <div class="modal fade" id="JabatanModel" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Tambah Data Jabatan Baru</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/adm/master/save/ijab">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">ID Jabatan</label>
                                                                        <input type="text" class="form-control" id="txtIdJabatan" name="txtIdJabatan" value="JB<?= 1 + rand(0, 100000) ?>" readonly="readonly">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nama Jabatan</label>
                                                                        <textarea class="form-control" id="txtNamaJabatan" name="txtNamaJabatan"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <p class="card-text">Data Jabatan digunakan untuk......</p>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name Jabatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($DataJabatan->getResultArray()  as $DataJabatan) : ?>
                                                    <tr>
                                                        <td><?= $DataJabatan['ID_JABATAN']; ?></td>
                                                        <td><?= $DataJabatan['NAMA_JABATAN']; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted sr-only">Aksi</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                                    <button class="dropdown-item btn-editJab  btn-sm" data-toggle="modal" data-target="#JabatanModelUpdate" data-idjab="<?= $DataJabatan['ID_JABATAN']; ?>" data-namjab="<?= $DataJabatan['NAMA_JABATAN']; ?>" href="#">Edit</button>
                                                                    <a class="dropdown-item" href="/adm/master/del/djab/<?= $DataJabatan['ID_JABATAN']; ?>" onclick="return confirm('Anda Yakin Menghapus Data Jabatan (<?= $DataJabatan['NAMA_JABATAN']; ?> ) !!!')">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                                <!-- Ini Modal Update Jabatan-->
                                                <div class="modal fade" id="JabatanModelUpdate" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Tambah Data Jabatan Baru</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/adm/master/updt/ujab">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">ID Jabatan</label>
                                                                        <input type="text" class="form-control txtIdJabU" id="txtIdJabU" name="txtIdJabU" readonly='readonly'>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nama Jabatan</label>
                                                                        <textarea class="form-control txtNamJabU" id="txtNamJabU" name="txtNamJabU"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- simple table -->

                            <!-- table MataPelajaran-->
                            <div class="col-md-6 my-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">Data Master Mata Pelajaran</h5>
                                            </div>
                                            <div class="col">
                                                <a class="btn mb-2 btn-primary btn-sm float-right" href="/adm/snk" data-toggle="modal" data-target="#ModalMapel" data-whatever="@mdo">Tambah Mata Pelajaran Baru</a>
                                                <!-- Ini Modal Input Jabtan -->
                                                <div class="modal fade" id="ModalMapel" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Tambah Data Mata Pelajararan Baru</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/adm/master/save/imapel">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">ID Mata Pelajaran</label>
                                                                        <input type="text" class="form-control" id="txtIdMapel" name="txtIdMapel" value="MP<?= 1 + rand(0, 100000) ?>" readonly="readonly">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nama Mata Pelajaran</label>
                                                                        <input class="form-control" id="txtNamaMapel" name="txtNamaMapel">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Status Mata Pelajaran</label>
                                                                        <input class="form-control txtstatusmapel" id="txtstatusmapel" name="txtstatusmapel">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Bobot Mata Pelajaran</label>
                                                                        <input class="form-control txtbobotmapel" type="number" id="txtbobotmapel" name="txtbobotmapel">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text">Data Mata Pelajaran digunakan untuk......</p>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <!-- <th>ID</th> -->
                                                    <th>Name Mata Pelajaran</th>
                                                    <th>Status Mata Pelajaran</th>
                                                    <th>Bobot Mata Pelajaran</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($DataMapel->getResultArray()  as $DataMapel) : ?>
                                                    <tr>
                                                        <!-- <td><?= $DataMapel['ID_MAPEL']; ?></td> -->
                                                        <td><?= $DataMapel['NAMA_MAPEL']; ?></td>
                                                        <td><?= $DataMapel['STATUS_MAPEL']; ?></td>
                                                        <td><?= $DataMapel['BOBOT_MAPEL']; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted sr-only">Action</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                                    <button class="dropdown-item btn-editMapel  btn-sm" data-toggle="modal" data-idmapel="<?= $DataMapel['ID_MAPEL']; ?>" data-namamapel="<?= $DataMapel['NAMA_MAPEL']; ?>" data-statusmapel="<?= $DataMapel['STATUS_MAPEL']; ?>" data-bobotmapel="<?= $DataMapel['BOBOT_MAPEL']; ?>" href="#">Edit</button>
                                                                    <a class="dropdown-item" href="/adm/master/del/dmapel/<?= $DataMapel['ID_MAPEL']; ?>" onclick="return confirm('Anda Yakin Menghapus Mata Pelajaran (<?= $DataMapel['NAMA_MAPEL']; ?> ) !!!')">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <!-- Ini Modal Update Mapel-->
                                                <div class="modal fade" id="MapelModelUpdate" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Ubah Data Mata Pelajaran </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/adm/master/updt/umapel">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">ID Mata pelajaran</label>
                                                                        <input type="text" class="form-control txtIdMapelU" id="txtIdMapelU" name="txtIdMapelU" readonly='readonly'>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Nama Mata Pelajaran</label>
                                                                        <input class="form-control txtNMMapelU" id="txtNMMapelU" name="txtNMMapelU">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Status Mata Pelajaran</label>
                                                                        <input class="form-control txtstatusmapel" id="txtstatusmapel" name="txtstatusmapel">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Bobot Mata Pelajaran</label>
                                                                        <input class="form-control txtbobotmapel" type="number" id="txtbobotmapel" name="txtbobotmapel">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

    <script>
        $(document).ready(function() {
            //get Edit Product
            $('.btn-editJab').on('click', function() {
                // get data from button edit
                const idJab1 = $(this).data('idjab');
                const namaJab1 = $(this).data('namjab');
                // Set data to Form Edit
                $('.txtIdJabU').val(idJab1);
                $('.txtNamJabU').val(namaJab1).trigger('change');
                // Call Modal Edit
                $('#JabatanModelUpdate').modal('show');
            });

            //get Edit Product
            $('.btn-editMapel').on('click', function() {
                // get data from button edit
                const idMapel1 = $(this).data('idmapel');
                const namaMapel1 = $(this).data('namamapel');
                const statusmapel = $(this).data('statusmapel');
                const bobotmapel = $(this).data('bobotmapel');
                // Set data to Form Edit
                // alert(idMapel1);
                $('.txtIdMapelU').val(idMapel1);
                $('.txtNMMapelU').val(namaMapel1);
                $('.txtstatusmapel').val(statusmapel);
                $('.txtbobotmapel').val(bobotmapel).trigger('change');
                // Call Modal Edit
                $('#MapelModelUpdate').modal('show');
            });


        });


        // $("#menu-toggle").click(function(e) {
        //     e.preventDefault();
        //     $("#wrapper").toggleClass("toggled");
        // });
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