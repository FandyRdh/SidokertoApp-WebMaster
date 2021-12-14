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
                        <h2 class="mb-2 page-title">Bank Soal</h2>
                        <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table. </p>
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
                                                        <a class="nav-link <?php echo $id_Kls ==  'All' ? 'active' : ''; ?>" href="/adm/bank/All">Semua </a>
                                                    </li>

                                                    <?php foreach ($DataKelas->getResultArray()  as $DataKelas) : ?>
                                                        <li class="nav-item ">
                                                            <a class="nav-link <?php echo $id_Kls ==  $DataKelas['ID_KLS'] ? 'active' : ''; ?>" href="/adm/bank/<?= $DataKelas['ID_KLS']; ?>">Kelas <?= $DataKelas['NAMA_KLS']; ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class=" col-md">
                                                <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#modaladdsoal" data-whatever="@mdo"><span class="fe fe-settings fe-16 mr-2"></span>Buat Paket Soal Baru</button>
                                            </div>
                                        </div>


                                        <br>
                                        <!-- Tabel -->
                                        <table class=" table datatables" id="dataTable-1">
                                            <thead>

                                                <tr>
                                                    <th>Judul Soal</th>
                                                    <th>Pembuat Soal</th>
                                                    <th>Mata Pelajaran</th>
                                                    <!-- <th>Kelas</th> -->
                                                    <th>Jenis Soal</th>
                                                    <!-- <th>Jumlah Soal</th> -->
                                                    <th>Tanggal Pembuatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($DataBankSoal->getResultArray()  as $DataBankSoal) : ?>
                                                    <tr>
                                                        <th><?= $DataBankSoal['JUDUL_SOAL']; ?><br> ( <?= $DataBankSoal['ID_PAKET'];; ?> )</th>
                                                        <th><?= $DataBankSoal['NAMA_KRY']; ?></th>
                                                        <th><?= $DataBankSoal['NAMA_MAPEL']; ?><br> ( Kelas <?= $DataBankSoal['NAMA_KLS'];; ?> )</th>
                                                        <th><?= $DataBankSoal['JENIS_SOAL']; ?></th>
                                                        <th><?= $DataBankSoal['TGL_PEMBUATAN']; ?></th>
                                                        <td><a class="btn mb-2 btn-secondary btn-sm" href="/adm/bank/detail/<?= $DataBankSoal['ID_PAKET']; ?>">Lihat Detail</a></td>
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


            <!-- Modal Add Soal -->
            <div class="modal fade" id="modaladdsoal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyModalLabel">Tabah Paket Soal Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="/C_ADMIN/savePKT">
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="txtjudulsoal">Judul Soal</label>
                                            <input type="text" class="form-control col-md-12 mb-3" id="txtjudulsoal" name="txtJudulSoal"">
                                        </div>
                                        <div class=" col ml-5">
                                            <label for="formGroupExampleInput">ID Paket Soal</label>
                                            <input type="text" class="form-control col-md-10" id="txtidpaketsoal" name="txtidpaketsoal" value="PKT<?= 1 + rand(0, 999999999) ?>" readonly>

                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="col">
                                            <label for="formGroupExampleInput">Pembuat Soal</label>
                                            <select id="txtidkry" name="txtidkry" class="form-control col-md-12 mb-3">
                                                <?php foreach ($DataKaryawan->getResultArray()  as $DataKaryawan) : ?>
                                                    <option value="<?= $DataKaryawan['ID_KRY']; ?>"> <?= $DataKaryawan['NAMA_KRY']; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                        <div class=" col ml-5">
                                            <label for="txtmapel">Mata Pelajaran</label>
                                            <select id="txtidmapel" name="txtidmapel" class="form-control col-md-10">
                                                <?php foreach ($DataMapel->getResultArray()  as $DataMapel) : ?>
                                                    <option value="<?= $DataMapel['ID_MAPEL']; ?>"><?= $DataMapel['NAMA_MAPEL']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="col">
                                            <label for="formGroupExampleInput">Kelas</label>
                                            <select id="txtidkls" name="txtidkls" class="form-control col-md-12 mb-3">
                                                <?php foreach ($DataKelas1->getResultArray()  as $DataKelas1) : ?>
                                                    <option value="<?= $DataKelas1['ID_KLS']; ?>"> Kelas <?= $DataKelas1['NAMA_KLS']; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                        <div class=" col ml-5">
                                            <label for="formGroupExampleInput">Jenis Soal</label>
                                            <select id="txtjenis" name="txtjenis" class="form-control col-md-10">
                                                <option value="UTS">UTS</option>
                                                <option value="UAS">UAS</option>
                                                <option value="QUIS" disabled>QUIS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
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