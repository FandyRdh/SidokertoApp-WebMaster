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
        <?php foreach ($DataKry->getResultArray()  as $DataKry) : ?>
            <main role="main" class="main-content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="mb-2 page-title">Data Karyawan (<?= $DataKry['NAMA_KRY'] ?>)</h2>
                            <!-- <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table. </p> -->
                            <?= $this->include('Layout/pesan_aksi'); ?>

                            <!-- INFRO KRY -->
                            <div class="row my-4">
                                <div class="col-md-10">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="row mt-5 align-items-center">
                                                <div class="col-md-3 text-center mb-5">
                                                    <div class="avatar avatar-xl">
                                                        <img src="/assets/images/profile_kry/<?= $DataKry['FOTO_KRY'] ?>" alt="..." class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-7">
                                                            <h4 class="mb-1"><?= $DataKry['NAMA_KRY'] ?></h4>
                                                            <p class="small mb-3"><span class="badge badge-primary"><?= $DataKry['NAMA_JABATAN'] ?></span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col">
                                                            <p class="small mb-0 text-muted">Karyawan <?= $DataKry['STATUS_KRY'] ?></p>
                                                            <p class="small mb-0 text-muted"><?= $DataKry['EMAIL_KRY'] ?></p>
                                                            <p class="small mb-0 text-muted"><?= $DataKry['TLP_KRY'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BTN ADD/UPDATE/DELETE -->
                                <div class=" col-md">
                                    <a class="btn  btn-danger  btn-block " href="/adm/kry/del/<?= $idKry; ?>" onclick="return confirm(' Anda yakin akan menghaapus karyawan bernama <?= $DataKry['NAMA_KRY'] ?> ')">Hapus Karyawan</a>
                                    <hr>
                                    <button class="btn  btn-primary  btn-block " data-toggle="modal" data-target="#exampleModal">Tambah Plotting Ajar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <!-- data diri lengkap -->
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <br>
                                <div class="container">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Diri karyawan</a>
                                            <?php if ($JbtUser == 'JB002') : ?>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Plotting Ajar</a>
                                            <?php endif; ?>
                                        </div>
                                    </nav>
                                </div>



                                <div class="card-body">
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- Data Diri -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <form action="/C_ADMIN/UpdtKry" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="TxtNip">NIP</label>
                                                            <input type="text" id="TxtNip" name="TxtNip" class="form-control TxtNip " value="<?= $DataKry['NIP'] ?>">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="txtNamaLengkap">Nama Lengkap</label>
                                                            <input type="text txtNamaLengkap" id="txtNamaLengkap" name="txtNamaLengkap" class="form-control" placeholder="masukan nama lengkap karyawan" value="<?= $DataKry['NAMA_KRY'] ?>">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="txtMapelAjar">Jenis Kelamin</label>
                                                            <select class="form-control txtJK" id="txtJK" name="txtJK">
                                                                <option <?php echo $DataKry['JK_KRY']  ==  'Pria' ? 'selected' : ''; ?> value="Pria">Pria</option>
                                                                <option <?php echo $DataKry['JK_KRY']  ==  'Wanita' ? 'selected' : ''; ?> value="Wanita">Wanita</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="txtAlamat">Alamat Lengkap</label>
                                                            <textarea class="form-control txtAlamat" id="txtAlamat" name="txtAlamat" rows="4"><?= $DataKry['ALAMAT_KRY'] ?> </textarea>
                                                        </div>
                                                    </div> <!-- /.col -->
                                                    <div class="col-md-6">

                                                        <div class="form-group mb-3">
                                                            <label for="txtAgama">Agama</label>
                                                            <select class="form-control txtAgama" id="txtAgama" name="txtAgama">
                                                                <option <?php echo $DataKry['AGAMA_KRY']  ==  'Islam' ? 'selected' : ''; ?> value="Islam">Islam</option>
                                                                <option <?php echo $DataKry['AGAMA_KRY']  ==  'Kristen' ? 'selected' : ''; ?> value="Kristen">Kristen</option>
                                                                <option <?php echo $DataKry['AGAMA_KRY']  ==  'Katolik' ? 'selected' : ''; ?> value="Katolik">Katolik</option>
                                                                <option <?php echo $DataKry['AGAMA_KRY']  ==  'Hindu' ? 'selected' : ''; ?> value="Hindu">Hindu</option>
                                                                <option <?php echo $DataKry['AGAMA_KRY']  ==  'Buddha' ? 'selected' : ''; ?> value="Buddha">Buddha</option>
                                                                <option <?php echo $DataKry['AGAMA_KRY']  ==  'Konghucu' ? 'selected' : ''; ?> value="Konghucu">Konghucu</option>
                                                                <option <?php echo $DataKry['AGAMA_KRY']  ==  'Lain-lain' ? 'selected' : ''; ?> value="Lain-lain">Lain-lain</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <label for="txtTempatLahir">Tempat Lahir</label>
                                                                    <input type="text" id="txtTempatLahir" name="txtTempatLahir" class="form-control txtTempatLahir" placeholder="Masukan  Kota Kelahiran" value="<?= $DataKry['TEMPAT_LAHIR_KRY'] ?>">
                                                                </div>
                                                                <div class="col-md">
                                                                    <label for="txtTglLahir">Tanggal Lahir</label>
                                                                    <input class="form-control txtTglLahir" type="date" id="txtTglLahir" name="txtTglLahir" value="<?= $DataKry['TGL_LAHIR'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <label for="txtEmail">Email : </label>
                                                                    <input type="text" class="form-control txtEmail" id="txtEmail" name="txtEmail" value="<?= $DataKry['EMAIL_KRY'] ?>" placeholder="masukan email (Optional)">
                                                                </div>
                                                                <div class="col-md">
                                                                    <label for="txtNoTelp">Nomor Telp</label>
                                                                    <input type="number" class="form-control txtNoTelp" id="txtNoTelp" name="txtNoTelp" value="<?= $DataKry['TLP_KRY'] ?>" placeholder="masukan nomor telp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <label for="txtStatusKry">Status Karyawan</label>
                                                                    <select class="form-control txtStatusKry" id="txtStatusKry" name="txtStatusKry">
                                                                        <option value="Aktif" <?php echo $DataKry['STATUS_KRY']  ==  'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                                                                        <option value="Nonaktif" <?php echo $DataKry['STATUS_KRY']  ==  'Nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                                                                        <option value="Cuti" <?php echo $DataKry['STATUS_KRY']  ==  'Cuti' ? 'selected' : ''; ?>>Cuti</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md">
                                                                    <label for="txtJabatan">Jabatan : </label>
                                                                    <select class="form-control txtJabatan" id="txtJabatan" name="txtJabatan">
                                                                        <?php foreach ($DataJbt->getResultArray()  as $DataJbt) : ?>
                                                                            <option value="<?= $DataJbt['ID_JABATAN']; ?>" <?php echo $DataKry['ID_JABATAN']  ==   $DataJbt['ID_JABATAN'] ? 'selected' : ''; ?>><?= $DataJbt['NAMA_JABATAN']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Foto Karyawan</label>
                                                            <input type="hidden" class="form-control txtNamaFoto" id="txtNamaFoto" name="txtNamaFoto" value="<?= $DataKry['FOTO_KRY']; ?>">
                                                            <input type="file" class="form-control-file <?= ($validation->hasError('fotokry')) ? 'is-invalid' : ''; ?>" id="fotokry" name="fotokry">
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
                                                            <textarea class="form-control txtPendidikanTerakir" id="txtPendidikanTerakir" name="txtPendidikanTerakir" rows="4"><?= $DataKry['PENDIDIKAN_TERAKIR'] ?></textarea>
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
                                                                    <input type="text" id="txtIdKry" name="txtIdKry" minlength="4" class="form-control txtIdKry " value="<?= $DataKry['ID_KRY'] ?>" placeholder="Masukan ID Unik (Min 4 Digit)" readonly>
                                                                </div>
                                                                <div class="col-md">
                                                                    <label for="txtPwKry">Password : </label>
                                                                    <input type="text" id="txtPwKry" name="txtPwKry" minlength="6" class="form-control txtPwKry" placeholder="Masukan Password (Min 6 Digit)" value="<?= $DataKry['PW_KRY'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mx-auto mt-3">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="return confirm(' Anda yakin akan mengubah data karyawan ( <?= $DataKry['NAMA_KRY'] ?> ) ')">Simpan Perubahan Data Karyawan</button>
                                                </div>

                                            </form>
                                        </div>


                                        <!-- Plotting Ajjar -->
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <!-- Tabel -->
                                            <table class="table datatables" id="dataTable-1">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Matapelajaran</th>
                                                        <th>Status Mapel</th>
                                                        <th>Bobot Mapel</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($DataPlotAjar->getResultArray()  as $DataPlotAjar) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?= $DataPlotAjar['NAMA_MAPEL']; ?></td>
                                                            <td><?= $DataPlotAjar['STATUS_MAPEL']; ?></td>
                                                            <td><?= $DataPlotAjar['BOBOT_MAPEL']; ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="text-muted sr-only">Aksi</span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                                        <a class="dropdown-item" href="/adm/kry/delPlot/<?= $idKry; ?>/<?= $DataPlotAjar['ID_MAPEL']; ?>" onclick="return confirm('Anda Yakin Menghapus Data Plotting Ajar !!!')">Hapus</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div> <!-- / .card -->

                    </div> <!-- .row -->
                </div> <!-- .container-fluid -->
                <!-- </div> -->
            </main> <!-- main -->
        <?php endforeach; ?>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Plotting Ajar Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/C_Admin/InsertPlot">
                        <div class="modal-body">
                            <label for="txtMapelAjar">Mata Pelajaran</label>
                            <select class="form-control txtMapelAjar" id="txtMapelAjar" name="txtMapelAjar">
                                <?php foreach ($DataMapel->getResultArray()  as $DataMapel) : ?>
                                    <option value="<?= $DataMapel['ID_MAPEL']; ?>"><?= $DataMapel['NAMA_MAPEL']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" id="txtNIP" name="txtNIP" class="form-control txtNIP " value="<?= $idKry; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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


    <!-- Script Ubah Soal -->
    <script>
        $(document).ready(function() {
            //get Edit Product
            $('.btn-editsoal').on('click', function() {
                var radios = document.getElementsByName('inlineRadioOptions');
                // alert("sadasd");
                // // get data from button edit
                const soal = $(this).data('soal');
                const idsoal = $(this).data('idsoal');
                const idpaket = $(this).data('idpaket');
                const a = $(this).data('a');
                const b = $(this).data('b');
                const c = $(this).data('c');
                const d = $(this).data('d');
                const jawabanbenar = $(this).data('jawabanbenar');
                var a231 = soal;
                // // Set data to Form Edit
                $('.txtsoal').val(soal);
                $('.idsoal').val(idsoal);
                $('.idpaket').val(idpaket);
                $('.txta').val(a);
                $('.txtb').val(b);
                $('.txtc').val(c);
                $('.txtd').val(d);
                $('.jawabanbenar').val(d).trigger('jawabanbenar');
                // // Call Modal Edit
                $('#modaleditsoal').modal('show');
            });

        });
    </script>
</body>

</html>