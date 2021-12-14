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
                        <h2 class="page-title">Form Pendaftaran Karyawan</h2>
                        <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Data Identias Siswa</strong>
                            </div>
                            <div class="card-body">
                                <form action="/C_Admin/saveSiswa" method="POST" enctype="multipart/form-data">

                                    <h5>Data Login</h5>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, obcaecati blanditiis? Quo, praesentium. Reprehenderit voluptatum unde fugiat, doloremque nam veniam quas eaque magnam voluptates porro illo fugit libero id dolor.</p>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtNisn">NISN</label>
                                                        <input type="text" id="txtNisn" name="txtNisn" minlength="4" class="form-control txtNisn <?= ($validation->hasError('txtNisn')) ? 'is-invalid' : ''; ?>" value="<?= old('txtNisn'); ?>" placeholder="Masukan NISN Siswa">
                                                        <div class=" invalid-feedback">
                                                            <?= $validation->getError('txtNisn'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtPwSiswa">Password : </label>
                                                        <input type="password" id="txtPwSiswa" name="txtPwSiswa" minlength="6" class="form-control txtPwSiswa" placeholder="Masukan Password (Min 6 Digit)" value="<?= old('txtPwSiswa'); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <h5>Data Diri Siswa</h5>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, obcaecati blanditiis? Quo, praesentium. Reprehenderit voluptatum unde fugiat, doloremque nam veniam quas eaque magnam voluptates porro illo fugit libero id dolor.</p>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="txtNamaLengkap">Nama : </label>
                                                <input type="text txtNamaLengkap" id="txtNamaLengkap" name="txtNamaLengkap" class="form-control" placeholder="masukan nama lengkap Siswa" value="<?= old('txtNamaLengkap'); ?>" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtJK">Jenis Kelamin</label>
                                                <select class="form-control txtJK" id="txtJK" name="txtJK">
                                                    <option value="Laki - laki">Laki - laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtAlamat">Alamat Lengkap</label>
                                                <textarea class="form-control txtAlamat" id="txtAlamat" name="txtAlamat" rows="4" <?= old('txtAlamat'); ?>required><?= old('txtAlamat'); ?></textarea>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-6">



                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtTempatLahir">Tempat Lahir</label>
                                                        <input type="text" id="txtTempatLahir" name="txtTempatLahir" class="form-control txtTempatLahir" placeholder="Masukan  Kota Kelahiran" value="<?= old('txtTempatLahir'); ?>" required>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtTglLahir">Tanggal Lahir</label>
                                                        <input class="form-control txtTglLahir" type="date" id="txtTglLahir" name="txtTglLahir" value="<?= old('txtTglLahir'); ?>" required>
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
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katolik">Katolik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Buddha">Buddha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                            <option value="Lain-lain">Lain-lain</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtNoTelp">Nomor Telp Wali</label>
                                                        <input type="number" class="form-control txtNoTelp" id="txtNoTelp" name="txtNoTelp" value="<?= old('txtNoTelp'); ?>" placeholder="masukan nomor telp wali murid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Foto Siswa</label>
                                                <input type="file" class="form-control-file <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" required>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('foto'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="txtIdKls" name="txtIdKls" class="form-control txtIdKls" value="<?= $id_kelas; ?>">
                                    <input type="hidden" id="txtIdSub" name="txtIdSub" class="form-control txtIdSub" value="<?= $id_sub; ?>">
                                    <div class="mx-auto mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Data Siswa</button>
                                    </div>
                            </div>
                            </form>
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