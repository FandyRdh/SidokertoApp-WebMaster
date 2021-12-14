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
                                <strong class="card-title">Data Diri</strong>
                            </div>
                            <div class="card-body">
                                <form action="/C_Admin/saveKry" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="TxtNip">NIP</label>
                                                <input type="text" id="TxtNip" name="TxtNip" class="form-control TxtNip <?= ($validation->hasError('TxtNip')) ? 'is-invalid' : ''; ?>" value="<?= old('TxtNip'); ?>">
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('TxtNip'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtNamaLengkap">Nama Lengkap</label>
                                                <input type="text txtNamaLengkap" id="txtNamaLengkap" name="txtNamaLengkap" class="form-control" placeholder="masukan nama lengkap karyawan" value="<?= old('txtNamaLengkap'); ?>" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtJK">Jenis Kelamin</label>
                                                <select class="form-control txtJK" id="txtJK" name="txtJK">
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="txtAlamat">Alamat Lengkap</label>
                                                <textarea class="form-control txtAlamat" id="txtAlamat" name="txtAlamat" rows="4" <?= old('txtAlamat'); ?>required><?= old('txtAlamat'); ?></textarea>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-6">

                                            <div class="form-group mb-3">
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
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtEmail">Email : </label>
                                                        <input type="text" class="form-control txtEmail" id="txtEmail" name="txtEmail" value="<?= old('txtTempatLahir'); ?>" placeholder="masukan email (Optional)">
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtNoTelp">Nomor Telp</label>
                                                        <input type="number" class="form-control txtNoTelp" id="txtNoTelp" name="txtNoTelp" value="<?= old('txtNoTelp'); ?>" placeholder="masukan nomor telp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Foto Karyawan</label>
                                                <input type="file" class="form-control-file <?= ($validation->hasError('fotokry')) ? 'is-invalid' : ''; ?>" id="fotokry" name="fotokry" required>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('fotokry'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="txtAlamat">Pendidikan Terakhir</label>
                                                <textarea class="form-control txtPendidikanTerakir" id="txtPendidikanTerakir" name="txtPendidikanTerakir" rows="4" required><?= old('txtPendidikanTerakir'); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <h5>Data Login</h5>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, obcaecati blanditiis? Quo, praesentium. Reprehenderit voluptatum unde fugiat, doloremque nam veniam quas eaque magnam voluptates porro illo fugit libero id dolor.</p>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label for="txtIdKry">ID Karyawan</label>
                                                        <input type="text" id="txtIdKry" name="txtIdKry" minlength="4" class="form-control txtIdKry <?= ($validation->hasError('txtIdKry')) ? 'is-invalid' : ''; ?>" value="<?= old('txtIdKry'); ?>" placeholder="Masukan ID Unik (Min 4 Digit)">
                                                        <div class=" invalid-feedback">
                                                            <?= $validation->getError('txtIdKry'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="txtPwKry">Password : </label>
                                                        <input type="password" id="txtPwKry" name="txtPwKry" minlength="6" class="form-control txtPwKry" placeholder="Masukan Password (Min 6 Digit)" value="<?= old('txtPwKry'); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="txtIdJab" name="txtIdJab" minlength="4" class="form-control txtIdJab" value="<?= $id_Jabatan; ?>" placeholder="Masukan ID Unik (Min 4 Digit)">
                                    <div class="mx-auto mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Data Karyawan</button>
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