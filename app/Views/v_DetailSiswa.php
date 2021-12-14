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
                        <h2 class="page-title">Detail Siswa</h2>
                        <!-- Navbar atas -->
                        <?= $this->include('Layout/pesan_aksi'); ?>
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Data Identias Siswa</strong>
                            </div>
                            <div class="card-body">


                                <?php foreach ($DataSiswa->getResultArray()  as $DataSiswa) : ?>
                                    <form action="/C_Admin/updtSiswa" method="POST" enctype="multipart/form-data">

                                        <h5>Data Login</h5>
                                        <p>Data Login siswa merupakan data yamg digunakan untuk login di aplikasi ujian (Android), Terdiri dari 2 data yaitu NISN sebagai ID & Password. NISN & Password login bersifat rahasia.</p>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="txtNisn">NISN</label>
                                                            <input type="text" id="txtNisn" name="txtNisn" minlength="4" class="form-control txtNisn " value="<?= $DataSiswa['NISN']; ?>" placeholder="Masukan NISN Siswa" readonly>
                                                            <div class=" invalid-feedback">
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="txtPwSiswa">Password : </label>
                                                            <input type="password" id="txtPwSiswa" name="txtPwSiswa" minlength="6" class="form-control txtPwSiswa" placeholder="Masukan Password (Min 6 Digit)" value="<?= $DataSiswa['PW_SISWA']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <h5>Data Diri Siswa</h5>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="txtNamaLengkap">Nama : </label>
                                                    <input type="text txtNamaLengkap" id="txtNamaLengkap" name="txtNamaLengkap" class="form-control" placeholder="masukan nama lengkap Siswa" value="<?= $DataSiswa['NAMA_SISWA']; ?>">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="txtJK">Jenis Kelamin</label>
                                                    <select class="form-control txtJK" id="txtJK" name="txtJK">
                                                        <option <?php echo $DataSiswa['JK_SISWA']  ==  'Laki - laki' ? 'selected' : ''; ?> value="Laki - laki">Laki - laki</option>
                                                        <option <?php echo $DataSiswa['JK_SISWA']  ==  'Perempuan' ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="txtAlamat">Alamat Lengkap</label>
                                                    <textarea class="form-control txtAlamat" id="txtAlamat" name="txtAlamat" rows="4" <?= old('txtAlamat'); ?>><?= $DataSiswa['ALAMAT_SISWA']; ?></textarea>
                                                </div>
                                            </div> <!-- /.col -->
                                            <div class="col-md-6">



                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="txtTempatLahir">Tempat Lahir</label>
                                                            <input type="text" id="txtTempatLahir" name="txtTempatLahir" class="form-control txtTempatLahir" placeholder="Masukan  Kota Kelahiran" value="<?= $DataSiswa['TEMPAT_LAHIR_SISWA']; ?>">
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="txtTglLahir">Tanggal Lahir</label>
                                                            <input class="form-control txtTglLahir" type="date" id="txtTglLahir" name="txtTglLahir" value="<?= $DataSiswa['TGL_LAHIR_SISWA']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">

                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="txtAgama">Agama</label>
                                                            <select class="form-control txtAgama" id="txtAgama" name="txtAgama">
                                                                <option <?php echo $DataSiswa['AGAMA_SISWA']  ==  'Islam' ? 'selected' : ''; ?> value="Islam">Islam</option>
                                                                <option <?php echo $DataSiswa['AGAMA_SISWA']  ==  'Kristen' ? 'selected' : ''; ?> value="Kristen">Kristen</option>
                                                                <option <?php echo $DataSiswa['AGAMA_SISWA']  ==  'Katolik' ? 'selected' : ''; ?> value="Katolik">Katolik</option>
                                                                <option <?php echo $DataSiswa['AGAMA_SISWA']  ==  'Hindu' ? 'selected' : ''; ?> value="Hindu">Hindu</option>
                                                                <option <?php echo $DataSiswa['AGAMA_SISWA']  ==  'Buddha' ? 'selected' : ''; ?> value="Buddha">Buddha</option>
                                                                <option <?php echo $DataSiswa['AGAMA_SISWA']  ==  'Konghucu' ? 'selected' : ''; ?> value="Konghucu">Konghucu</option>
                                                                <option <?php echo $DataSiswa['AGAMA_SISWA']  ==  'Lain-lain' ? 'selected' : ''; ?> value="Lain-lain">Lain-lain</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="txtNoTelp">Nomor Telp Wali</label>
                                                            <input type="number" class="form-control txtNoTelp" id="txtNoTelp" name="txtNoTelp" value="<?= $DataSiswa['TELP_WALI_SISWA']; ?>" placeholder="masukan nomor telp wali murid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="txtsubkls">Kelas</label>
                                                            <select class="form-control txtsubkls" id="txtsubkls" name="txtsubkls">
                                                                <?php foreach ($DataSubKls->getResultArray()  as $DataSubKls) : ?>
                                                                    <option <?php echo $DataSiswa['ID_SUB']  ==  $DataSubKls['ID_SUB'] ? 'selected' : ''; ?> value="<?= $DataSubKls['ID_SUB']; ?>"><?= $DataSubKls['NAMA_SUB']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="txtsubkls">Status Siswa</label>
                                                            <select class="form-control txtstatussiswa" id="txtstatussiswa" name="txtstatussiswa">
                                                                <option <?php echo $DataSiswa['Status_Siswa']  ==  'Aktif' ? 'selected' : ''; ?> value="Aktif">Aktif</option>
                                                                <option <?php echo $DataSiswa['Status_Siswa']  ==  'Keluar' ? 'selected' : ''; ?> value="Keluar">Keluar Sekolah</option>
                                                                <option <?php echo $DataSiswa['Status_Siswa']  ==  'Break' ? 'selected' : ''; ?> value="Break">Berhenti Sementara</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Foto Siswa</label>
                                                    <input type="file" class="form-control-file " id="foto" name="foto">
                                                    <div class="invalid-feedback">
                                                        <!--  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control-file " id="nmFotoSiswa" name="nmFotoSiswa" value="<?= $DataSiswa['FOTO_SISWA']; ?>">

                                        <div class="mx-auto mt-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Perubahan Data Siswa</button>
                                        </div>

                                    </form>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div> <!-- / .card -->



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