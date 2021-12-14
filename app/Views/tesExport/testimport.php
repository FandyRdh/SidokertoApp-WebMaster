<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Import Excel Codeigniter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <?php
        if (session()->getFlashdata('message')) {
        ?>
            <div class="alert alert-info">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php
        }
        ?>
        <form method="post" action="/ExcelSoal/ImportSoal" enctype="multipart/form-data">
            <div class="form-group">
                <label>File Excel</label>
                <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Handphone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="contactTable">
                <?php
                if (!empty($contacts)) {
                    foreach ($contacts as $contact) {
                ?>
                        <tr>
                            <td><?= $contact['nama'] ?></td>
                            <td><?= $contact['handphone'] ?></td>
                            <td><?= $contact['email'] ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="3">Tidak ada data</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>