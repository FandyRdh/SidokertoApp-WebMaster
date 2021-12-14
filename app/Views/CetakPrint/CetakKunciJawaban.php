<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/feather.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            /* font: 12pt "Tahoma"; */
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            font-family: "Times New Roman", Times, serif;
        }

        /* .container {
            border: 1px solid black;
        } */

        .judul-ujian {
            font-size: 40px;
        }

        .atribut_ujian1 {
            margin-left: 20px;
            font-weight: bold;
            padding-top: 0px;
        }

        .atribut_ujian2 {
            margin-left: 20px;
            font-weight: bold;
            padding-top: 10px;
            padding-bottom: 0px;
        }

        .atribut_identitas {

            /* border: 1px solid black; */
            padding: 6px;
            border-top: 4px solid black;
            border-bottom: 4px solid black;
            /* height: 3px; */
            /* Set the hr color */
            /* color: #333; */
            /* old IE */
            /* background-color: #333; */
            /* Modern Browsers */
            margin-bottom: 20px;
        }

        @media print {
            @page {
                /* size: auto; */
                margin: 0mm;
            }

            .btnset {
                display: none;
            }

            #debug-icon-link {
                display: none;
            }

        }
    </style>
</head>

<body>
    <div class="container btnset">
        <br>
        <button type="button" class="btn mb-2 btn-secondary btn-sm ml-1" onclick="window.print()"><span class="fe fe-printer fe-16 mr-2"></span>Cetak</button>
        <a type="button" href="/adm/ujian/detail/<?= $idUjian; ?>" class="btn mb-2 btn-primary btn-sm ml-1">Kembali</a>

    </div>
    <br>
    <div class="container">
        <center>
            <p class="judul-ujian"><?= $TipeUjian; ?></p>
        </center>
        <?php foreach ($DataUjian->getResultArray()  as $DataUjian) : ?>
            <div class="row atribut_identitas">
                <div class="col-5">
                    <div class="row">
                        <div class="atribut_ujian1">Nama : ..............................................................</div>
                    </div>
                    <div class="row">
                        <div class="atribut_ujian2">Kelas &nbsp;: .............................................................. </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="atribut_ujian1">Tanggal Ujian &nbsp; : <?= $DataUjian['jammulai']; ?> </div>
                    </div>
                    <div class="row">
                        <div class="atribut_ujian2">Waktu &nbsp;&nbsp; : <?= $DataUjian['lamaujian']; ?> Jam</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="atribut_ujian1">Pengajar : <?= $DataUjian['NAMA_KRY']; ?> </div>
                    </div>
                    <div class="row">
                        <div class="atribut_ujian2">Mata Pelajaran : <?= $DataUjian['NAMA_MAPEL']; ?> </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Petunjuk -->
        <div class="row">
            <div class="col">
                <h5><b>I.Berilah Tanda silang (X) pada jawaban yang paling anggap kamu benar !</b></h5>
            </div>
        </div>
        <br>
        <!-- Soal -->
        <?php $nomor = 1; ?>
        <?php foreach ($DataSoal->getResultArray()  as $DataSoal) : ?>
            <div class="row">
                <div class="col">
                    <h5><?= $nomor++; ?>. <?= $DataSoal['SOAL_UJIAN']; ?></h5>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="col" <?php if ($DataSoal['PILIHAN_1']  ==  $DataSoal['KUNCI']) echo "style='color: green; font-weight: bold; text-decoration: underline;'" ?>>
                                    <div class="row">
                                        <div class="col-0.3">A.</div>
                                        <div class="col"><?= $DataSoal['PILIHAN_1']; ?>.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col" <?php if ($DataSoal['PILIHAN_2']  ==  $DataSoal['KUNCI']) echo "style='color: green; font-weight: bold; text-decoration: underline;'" ?>>
                                    <div class="row">
                                        <div class="col-0.3">A.</div>
                                        <div class="col"><?= $DataSoal['PILIHAN_3']; ?>.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="row">
                            <div class="col">
                                <div class="col" <?php if ($DataSoal['PILIHAN_3']  ==  $DataSoal['KUNCI']) echo "style='color: green; font-weight: bold; text-decoration: underline;'" ?>>
                                    <div class="row">
                                        <div class="col-0.3">B.</div>
                                        <div class="col"><?= $DataSoal['PILIHAN_2']; ?>.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col" <?php if ($DataSoal['PILIHAN_4']  ==  $DataSoal['KUNCI']) echo "style='color: green; font-weight: bold; text-decoration: underline;'" ?>>
                                    <div class="row">
                                        <div class="col-0.3">D.</div>
                                        <div class="col"><?= $DataSoal['PILIHAN_4']; ?>.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php endforeach; ?>
                </div>
            </div>
            <br>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>