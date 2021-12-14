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
                        <h2 class="mb-2 page-title">Paket Soal</h2>
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

                        <!-- Detail Data Soal -->
                        <div class="row my-4">
                            <div class="col-md-10">
                                <?php foreach ($DataBankSoal->getResultArray()  as $DataBankSoal) : ?>
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">Data Paket Soal</h5>
                                            <form>

                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="txtjudulsoal">Judul Soal</label>
                                                        <input type="text" class="form-control col-md-12 mb-3" id="txtjudulsoal" name="txtJudulSoal" value="<?= $DataBankSoal['JUDUL_SOAL']; ?> ( <?= $DataBankSoal['ID_PAKET']; ?> )" readonly>
                                                    </div>
                                                    <div class=" col ml-5">
                                                        <label for="txtmapel">Mata Pelajaran</label>
                                                        <input type="text" class="form-control col-md-10" id="txtmapel" name="txtmapel" value="<?= $DataBankSoal['NAMA_MAPEL']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class=" form-row">
                                                    <div class="col">
                                                        <label for="formGroupExampleInput">Pembuat Soal</label>
                                                        <input type="text" class="form-control col-md-12 mb-3" id="txt" name="txtNmWaliKls" value="<?= $DataBankSoal['NAMA_KRY']; ?>" readonly>
                                                    </div>
                                                    <div class=" col ml-5">
                                                        <label for="formGroupExampleInput">Jumlah Soal</label>
                                                        <input type="text" class="form-control col-md-10" id="txtJumSiswaL" name="txtJumSiswaL" value=" <?= $DataBankSoal['Jum_Soal']; ?> Soal" readonly>
                                                    </div>
                                                </div>
                                                <div class=" form-row">
                                                    <div class="col">
                                                        <label for="formGroupExampleInput">Kelas</label>
                                                        <input type="text" class="form-control col-md-12" id="txtJumSiswaP" name="txtJumSiswaP" value="Kelas <?= $DataBankSoal['NAMA_KLS']; ?> " readonly>

                                                    </div>
                                                    <div class=" col ml-5">
                                                        <label for="formGroupExampleInput">Jenis Soal</label>
                                                        <input type="text" class="form-control col-md-10" id="txtJumSiswaP" name="txtJumSiswaP" value="<?= $DataBankSoal['JENIS_SOAL']; ?> " readonly>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                    <!-- Modal Edit -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="modaleditpaket" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="varyModalLabel">Ubah Data Paket Soal - <?= $DataBankSoal['JUDUL_SOAL']; ?> ( <?= $DataBankSoal['ID_PAKET']; ?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/adm/bank/updt/<?= $DataBankSoal['ID_PAKET']; ?>">
                                                    <div class="modal-body">
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="txtjudulsoal">Judul Soal</label>
                                                                    <input type="text" class="form-control col-md-12 mb-3" id="txtjudulsoal" name="txtJudulSoal" value="<?= $DataBankSoal['JUDUL_SOAL']; ?>">
                                                                </div>
                                                                <div class=" col ml-5">
                                                                    <label for="txtmapel">Mata Pelajaran</label>
                                                                    <select id="txtIdMapel" name="txtIdMapel" class="form-control col-md-10">
                                                                        <?php foreach ($DataMapel->getResultArray()  as $DataMapel) : ?>
                                                                            <option value="<?= $DataMapel['ID_MAPEL']; ?>" <?php echo $DataMapel['NAMA_MAPEL'] ==  $DataBankSoal['NAMA_MAPEL'] ? 'selected' : ''; ?>><?= $DataMapel['NAMA_MAPEL']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class=" form-row">
                                                                <div class="col">
                                                                    <label for="formGroupExampleInput">Pembuat Soal</label>
                                                                    <select id="txtIdKry" name="txtIdKry" class="form-control col-md-12 mb-3">
                                                                        <?php foreach ($DataKaryawan->getResultArray()  as $DataKaryawan) : ?>
                                                                            <option value="<?= $DataKaryawan['ID_KRY']; ?>" <?php echo $DataKaryawan['NAMA_KRY'] ==  $DataBankSoal['NAMA_KRY'] ? 'selected' : ''; ?>><?= $DataKaryawan['NAMA_KRY']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>

                                                                </div>
                                                                <div class=" col ml-5">
                                                                    <label for="formGroupExampleInput">Jumlah Soal</label>
                                                                    <input type="text" class="form-control col-md-10" id="txtJumSiswaL" name="txtJumSiswaL" value="<?= $DataBankSoal['Jum_Soal']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class=" form-row">
                                                                <div class="col">
                                                                    <label for="formGroupExampleInput">Kelas</label>
                                                                    <select id="txtIdKelas" name="txtIdKelas" class="form-control col-md-12 mb-3">
                                                                        <?php foreach ($DataKelas->getResultArray()  as $DataKelas) : ?>
                                                                            <option value="<?= $DataKelas['ID_KLS']; ?>" <?php echo $DataKelas['NAMA_KLS'] ==  $DataBankSoal['NAMA_KLS'] ? 'selected' : ''; ?>> Kelas <?= $DataKelas['NAMA_KLS']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>

                                                                </div>
                                                                <div class=" col ml-5">
                                                                    <label for="formGroupExampleInput">Jenis Soal</label>
                                                                    <!-- <input type="text" class="form-control col-md-10" id="txtJumSiswaP" name="txtJumSiswaP" value="<?= $DataBankSoal['JENIS_SOAL']; ?> "> -->
                                                                    <select id="txtJenis" name="txtJenis" class="form-control col-md-10">
                                                                        <option value="UTS" <?php echo 'UTS' ==  $DataBankSoal['JENIS_SOAL'] ? 'selected' : ''; ?>>UTS</option>
                                                                        <option value="UAS" <?php echo 'UAS' ==  $DataBankSoal['JENIS_SOAL'] ? 'selected' : ''; ?>>UAS</option>
                                                                        <option value="QUIS" <?php echo 'QUIS' ==  $DataBankSoal['JENIS_SOAL'] ? 'selected' : ''; ?>>QUIS</option>
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
                                <?php endforeach; ?>
                            </div>



                            <div class=" col-md">
                                <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#modaleditpaket" data-whatever="@mdo"><span class="fe fe-settings fe-16 mr-2"></span>Ubah Data Paket &nbsp;</button>

                                <a type="button" href="/adm/bank/del/<?= $id_paket; ?>" class="btn mb-2 btn-danger" onclick="return confirm(' Anda yakin akan menghapus paket soal  ? Data Soal dipaket ini akan terhapus semua ')"><span class="fe fe-trash-2 fe-16 mr-2"></span>Hapus Paket Soal</a>
                                <hr>
                                <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#modaladdsoal" data-whatever="@mdo"><span class="fe fe-plus fe-16 mr-2"></span>Tambah Soal Baru</button>
                                <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#modalExportSoal" data-whatever="@mdo"><span class="fe fe-upload fe-16 mr-2"></span>Export Soal Excel</button>
                            </div>
                        </div>




                        <!-- Loop di sini -->
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <?php $v_i = 1; ?>
                                <?php foreach ($DataSoal->getResultArray()  as $DataSoal) : ?>
                                    <BR>
                                    <HR>
                                    <BR>
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5 class="card-title">Soal No. <?php echo $v_i ?></h5>
                                                </div>
                                                <div class="col-2">
                                                    <a class="btn  btn-danger  btn-block btn-sm ml-4 " href="/adm/soal/del/<?= $id_paket; ?>/<?= $DataSoal['ID_SOAL']; ?>" onclick="return confirm(' Anda yakin akan menghapus Soal No. <?php echo $v_i++ ?> ')">Hapus Soal</a>

                                                </div>
                                                <div class=" col-2">
                                                    <button class="btn  btn-primary  btn-block btn-sm float-right btn-editsoal" data-toggle="modal" data-idsoal="<?= $DataSoal['ID_SOAL']; ?>" data-idpaket="<?= $id_paket ?>" data-soal="<?= $DataSoal['SOAL_UJIAN']; ?>" data-a="<?= $DataSoal['PILIHAN_1']; ?>" data-b="<?= $DataSoal['PILIHAN_2']; ?>" data-c="<?= $DataSoal['PILIHAN_3']; ?>" data-d="<?= $DataSoal['PILIHAN_4']; ?>" data-kunci="<?= $DataSoal['KUNCI']; ?>">Edit Soal</button>

                                                </div>
                                            </div>
                                            <hr>
                                            <form action="">
                                                <!-- Soal -->
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" readonly><?= $DataSoal['SOAL_UJIAN']; ?></textarea>
                                                </div>

                                                <!-- Baris 1 | A & B -->
                                                <div class="form-row ">
                                                    <!-- A -->
                                                    <div class="col">
                                                        <label class="form-check-label" for="inlineRadio1">A.</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?= $DataSoal['PILIHAN_1']; ?></textarea>
                                                        <!-- <input type="text" class="form-control col-md-12 mb-3" id="txtNmKelas" name="txtNmKelas" value="" rows="4" readonly> -->
                                                    </div>
                                                    <!-- B -->
                                                    <div class="col">
                                                        <label class="form-check-label" for="inlineRadio1">B.</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?= $DataSoal['PILIHAN_2']; ?></textarea>
                                                        <!-- <input type="text" class="form-control col-md-12 mb-3" id="txtNmKelas" name="txtNmKelas" value="" rows="4" readonly> -->
                                                    </div>
                                                </div>
                                                <br>
                                                <!-- Baris 2 | C & D -->
                                                <div class="form-row ">
                                                    <!-- C -->
                                                    <div class="col">
                                                        <label class="form-check-label" for="inlineRadio1">C.</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?= $DataSoal['PILIHAN_3']; ?></textarea>
                                                        <!-- <input type="text" class="form-control col-md-12 mb-3" id="txtNmKelas" name="txtNmKelas" value="" rows="4" readonly> -->
                                                    </div>

                                                    <!-- D -->
                                                    <div class="col">
                                                        <label class="form-check-label" for="inlineRadio1">D.</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?= $DataSoal['PILIHAN_4']; ?></textarea>
                                                        <!-- <input type="text" class="form-control col-md-12 mb-3" id="txtNmKelas" name="txtNmKelas" value="" rows="4" readonly> -->
                                                    </div>
                                                </div>
                                                <br>
                                                <!-- Baris 3 | Kunci Jawaban -->
                                                <div class="form-row ">
                                                    <!-- Jawaban Benar -->
                                                    <div class="col">
                                                        <label for="exampleFormControlSelect1">Jawaban Benar : </label>
                                                        <select class="form-control " id="" name="" disabled>
                                                            <option value="<?= $DataSoal['PILIHAN_1']; ?>" <?php echo $DataSoal['KUNCI'] ==  $DataSoal['PILIHAN_1'] ? 'selected' : ''; ?>> A. <?= $DataSoal['PILIHAN_1']; ?></option>
                                                            <option value="<?= $DataSoal['PILIHAN_2']; ?>" <?php echo $DataSoal['KUNCI'] ==  $DataSoal['PILIHAN_2'] ? 'selected' : ''; ?>> B. <?= $DataSoal['PILIHAN_2']; ?></option>
                                                            <option value="<?= $DataSoal['PILIHAN_3']; ?>" <?php echo $DataSoal['KUNCI'] ==  $DataSoal['PILIHAN_3'] ? 'selected' : ''; ?>> C. <?= $DataSoal['PILIHAN_3']; ?></option>
                                                            <option value="<?= $DataSoal['PILIHAN_4']; ?>" <?php echo $DataSoal['KUNCI'] ==  $DataSoal['PILIHAN_4'] ? 'selected' : ''; ?>> D. <?= $DataSoal['PILIHAN_4']; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                <?php endforeach; ?>


                            </div> <!-- simple table -->
                        </div> <!-- end section -->


                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->


            <!-- Modal add soal-->
            <div class="modal fade" id="modaladdsoal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyModalLabel">Tambah Soal Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="/C_Admin/saveSoal">
                            <div class="modal-body">
                                <!-- Soal -->
                                <div class="form-group">
                                    <textarea class="form-control txtsoal" id="txtsoal" name="txtsoal" rows="4" placeholder="Masukan pertanyaan soal" required></textarea>
                                </div>

                                <!-- Baris 1 | A & B -->
                                <div class="form-row ">
                                    <!-- A -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">A.</label>
                                        <textarea class="form-control txta1" id="ida1" name="txta1" rows="3" placeholder="Masukan pilihan jawaban ( A )" required></textarea>
                                    </div>
                                    <!-- B -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">B.</label>
                                        <textarea class="form-control txtb1" id="idb1" name="txtb1" rows="3" placeholder="Masukan pilihan jawaban ( B )" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <!-- Baris 2 | C & D -->
                                <div class="form-row ">
                                    <!-- C -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">C.</label>
                                        <textarea class="form-control txtc1" id="idc1" name="txtc1" rows="3" placeholder="Masukan pilihan jawaban ( C )" required></textarea>
                                    </div>

                                    <!-- D -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">D.</label>
                                        <textarea class="form-control txt1d" id="idd1" name="txtd1" rows="3" placeholder="Masukan pilihan jawaban ( D )" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <!-- Baris 3 | Kunci Jawaban -->
                                <div class="form-row ">
                                    <!-- Jawaban Benar -->
                                    <div class="col">
                                        <label for="exampleFormControlSelect1">Jawaban Benar : </label>
                                        <select class="form-control jawabanbenar1" id="jawabanbena1r" name="jawabanbenar1">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" class="form-control col-md-12 mb-3" id="txtIdPktSoal" name="txtIdPktSoal" value="<?= $id_paket ?>">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal Edit -->
            <div class="modal fade" id="modaleditsoal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyModalLabel">Edit Soal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/adm/soal/updt">
                            <div class="modal-body">
                                <!-- Soal -->
                                <div class="form-group">
                                    <textarea class="form-control txtsoal" id="txtsoal" name="txtsoal" rows="4">
                                        </textarea>
                                </div>

                                <!-- Baris 1 | A & B -->
                                <div class="form-row ">
                                    <!-- A -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">A.</label>
                                        <textarea class="form-control txta" id="ida" name="txta" rows="3"></textarea>
                                    </div>
                                    <!-- B -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">B.</label>
                                        <textarea class="form-control txtb" id="idb" name="txtb" rows="3"></textarea>
                                    </div>
                                </div>
                                <br>
                                <!-- Baris 2 | C & D -->
                                <div class="form-row ">
                                    <!-- C -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">C.</label>
                                        <textarea class="form-control txtc" id="idc" name="txtc" rows="3"></textarea>
                                    </div>

                                    <!-- D -->
                                    <div class="col">
                                        <label class="form-check-label" for="inlineRadio1">D.</label>
                                        <textarea class="form-control txtd" id="idd" name="txtd" rows="3"></textarea>
                                    </div>
                                </div>
                                <br>
                                <!-- Baris 3 | Kunci Jawaban -->
                                <div class="form-row ">
                                    <!-- Jawaban Benar -->
                                    <div class="col">
                                        <label for="exampleFormControlSelect1">Jawaban Benar : </label>
                                        <select class="form-control jawabanbenar" id="jawabanbenar" name="jawabanbenar" required>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control idsoal" id="idsoal" name="idsoal" rows="3">
                                <input type="hidden" class="form-control idpaket" id="idpaket" name="idpaket" rows="3">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    </div>


    <!-- Modal Export -->
    <div class="modal fade" id="modalExportSoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export Soal Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/ExcelSoal/ImportSoal" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>File Excel</label>
                            <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" />
                            </p>
                        </div>
                        <input type="hidden" id="pilihanbtn" name="pilihanbtn" />
                        <input type="hidden" id="idpaket" name="idpaket" value="<?= $id_paket; ?>" />

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="setPerviewSoal()">Preview Soal</button>
                        <button type="submit" class="btn btn-primary" onclick="setSimpanSoal()">Save changes</button>
                    </div>
            </div>
            </form>
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
    <script type="text/javascript">
        function setPerviewSoal() {
            document.getElementById("pilihanbtn").value = "Lihat";
        }

        function setSimpanSoal() {
            document.getElementById("pilihanbtn").value = "Simpan";
        }
    </script>
</body>

</html>