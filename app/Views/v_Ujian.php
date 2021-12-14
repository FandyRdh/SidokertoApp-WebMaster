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
                        <h2 class="mb-2 page-title">Ujian</h2>
                        <!-- Navbar atas -->
                        <?= $this->include('Layout/pesan_aksi'); ?>

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
                                                        <a class="nav-link <?php echo $id_Kls ==  'All' ? 'active' : ''; ?>" href="/adm/ujian/All">Semua </a>
                                                    </li>

                                                    <?php foreach ($DataKelas->getResultArray()  as $DataKelas) : ?>
                                                        <li class="nav-item ">
                                                            <a class="nav-link <?php echo $id_Kls ==  $DataKelas['ID_KLS'] ? 'active' : ''; ?>" href="/adm/ujian/<?= $DataKelas['ID_KLS']; ?>">Kelas <?= $DataKelas['NAMA_KLS']; ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class=" col-md">
                                                <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#modaladdsoal" data-whatever="@mdo"><span class="fe fe-settings fe-16 mr-2"></span>Buat Ujian Baru</button>
                                            </div>
                                        </div>


                                        <br>
                                        <!-- Tabel -->
                                        <table class=" table datatables" id="dataTable-1">
                                            <thead>

                                                <tr>
                                                    <th>Jenis Soal</th>
                                                    <th>Kelas</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Guru Pembuat Ujian</th>
                                                    <th>Jadwal Ujian</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($DataUjian->getResultArray()  as $DataUjian) : ?>
                                                    <tr>
                                                        <td><?= $DataUjian['JENIS_UJIAN']; ?></td>
                                                        <td>Kelas <?= $DataUjian['NAMA_KLS']; ?></td>
                                                        <td><?= $DataUjian['NAMA_MAPEL']; ?></td>
                                                        <td><?= $DataUjian['NAMA_KRY']; ?></td>
                                                        <td><?= $DataUjian['JadwalUjian']; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted sr-only">Aksi</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                                                    <a class="dropdown-item" href="/adm/ujian/detail/<?= $DataUjian['ID_UJIAN']; ?>">Detail</a>
                                                                    <a class="dropdown-item" href="/adm/ujian/delete/<?= $DataUjian['ID_UJIAN']; ?>" onclick="return confirm('Anda Yakin Menghapus Data Ujian !!!')">Hapus</a>
                                                                </div>
                                                            </div>

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


            <!-- Modal Add Ujian -->
            <div class="modal fade" id="modaladdsoal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyModalLabel">Tabah Paket Soal Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="/C_ADMIN/saveUjian">
                            <div class="modal-body">
                                <div class="modal-body">
                                    <!-- Judul -->
                                    <div class="form-row">
                                        <div class=" col">
                                            <div class="container">
                                                <label for="formGroupExampleInput">Judul Ujian</label>
                                                <input type="text" class="form-control col-md" id="txtJudulUjian" name="txtJudulUjian" value="<?= old('txtJudulUjian'); ?>" placeholder="masukan Judul Ujian" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tanggal Selesai Dan Mulai -->
                                    <div class=" form-row mt-3">
                                        <div class=" col">
                                            <div class="col-md">
                                                <label for="txtTglLahir">Tanggal Mulai Ujian</label>
                                                <!-- <input type="text" name="datetimes" class="form-control datetimes"> -->
                                                <input class="form-control txtTglMulai" type="datetime-local" id="txtTglMulai" name="txtTglMulai" value="" required>
                                            </div>
                                        </div>
                                        <div class=" col">
                                            <div class="col-md">
                                                <label for="txtTglLahir">Tanggal Selesai Ujian</label>
                                                <input class="form-control txtTglSelesai" type="datetime-local" id="txtTglSelesai" name="txtTglSelesai" value="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class=" form-row">
                                        <div class="col">
                                            <label for="formGroupExampleInput">Jenis Ujian</label>
                                            <select id="txtJenissUjian" name="txtJenisSujian" class="form-control col-md-12 mb-3">
                                                <option value="UTS">UTS - Ujian Tengah Semester</option>
                                                <option value="UAS">UAS - Ujian Akhir Semester</option>
                                                <option value="QUIS" disabled> Quis / Latihan</option>
                                            </select>

                                        </div>
                                        <div class=" col">
                                            <label for="formGroupExampleInput">Kelas</label>
                                            <select id="txtIDKelas" name="txtIDKelas" class="form-control col">
                                                <?php foreach ($DataKelas2->getResultArray()  as $DataKelas2) : ?>
                                                    <option value="<?= $DataKelas2['ID_KLS']; ?>">Kelas <?= $DataKelas2['NAMA_KLS']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Mapel & KRy -->
                                    <div class=" form-row">
                                        <div class=" col">
                                            <label for="formGroupExampleInput">Guru Pembuat</label>
                                            <select id="txtIDKry" name="txtIDKry" class="form-control col-md">
                                                <?php foreach ($DataKry->getResultArray()  as $DataKry) : ?>
                                                    <option value="<?= $DataKry['ID_KRY']; ?>"> <?= $DataKry['NAMA_KRY']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class=" col">
                                            <label for="formGroupExampleInput">Mata Pelajaran</label>
                                            <select id="txtIDMapel" name="txtIDMapel" class="form-control col">
                                                <?php foreach ($DataMapel->getResultArray()  as $DataMapel) : ?>
                                                    <option value="<?= $DataMapel['ID_MAPEL']; ?>"> <?= $DataMapel['NAMA_MAPEL']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Paket Soal -->
                                    <div class="form-row mt-3">
                                        <div class=" col">
                                            <label for="formGroupExampleInput">Paket Soal</label>
                                            <select id="txtIdpaket" name="txtIdpaket" class="form-control col-md">
                                                <?php foreach ($DataPaket->getResultArray()  as $DataPaket) : ?>
                                                    <option value="<?= $DataPaket['ID_PAKET']; ?>">Paket Soal <?= $DataPaket['JENIS_SOAL']; ?> <?= $DataPaket['NAMA_MAPEL']; ?>, Kelas <?= $DataPaket['NAMA_KLS']; ?>, Dibuat Oleh : <?= $DataPaket['NAMA_KRY']; ?> | <?= $DataPaket['TGL_PEMBUATAN']; ?></option>
                                                <?php endforeach; ?>
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
    <!-- 
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <script src='/js/daterangepicker.js'></script>
    <script src='/js/jquery.stickOnScroll.js'></script>
    <script src="/js/tinycolor-min.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/d3.min.js"></script>
    <script src="/js/topojson.min.js"></script>
    <script src="/js/datamaps.all.min.js"></script>
    <script src="/js/datamaps-zoomto.js"></script>
    <script src="/js/datamaps.custom.js"></script>
    <script src="/js/Chart.min.js"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="/js/gauge.min.js"></script>
    <script src="/js/jquery.sparkline.min.js"></script>
    <script src="/js/apexcharts.min.js"></script>
    <script src="/js/apexcharts.custom.js"></script>
    <script src='/js/jquery.mask.min.js'></script>
    <script src='/js/select2.min.js'></script>
    <script src='/js/jquery.steps.min.js'></script>
    <script src='/js/jquery.validate.min.js'></script>
    <script src='/js/jquery.timepicker.js'></script>
    <script src='/js/dropzone.min.js'></script>
    <script src='/js/uppy.min.js'></script>
    <script src='/js/quill.min.js'></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script> -->

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