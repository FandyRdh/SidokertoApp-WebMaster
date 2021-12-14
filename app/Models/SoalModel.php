<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table      = 'soal';
    protected $primaryKey = 'ID_SOAL';
    protected $allowedFields = ['ID_PAKET', 'NOMOR_URUT', 'SOAL_UJIAN', 'PILIHAN_1', 'PILIHAN_2', 'PILIHAN_3', 'PILIHAN_4', 'KUNCI', 'ASSET_SOAL'];
}
