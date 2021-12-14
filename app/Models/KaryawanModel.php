<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'KARYAWAN';
    protected $primaryKey = 'ID_KRY';
    protected $allowedFields = ['ID_KRY', 'ID_JABATAN', 'NIP', 'NAMA_KRY', 'ALAMAT_KRY', 'AGAMA_KRY', 'JK_KRY', 'EMAIL_KRY', 'TLP_KRY', 'PW_KRY', 'TEMPAT_LAHIR_KRY', 'TGL_LAHIR', 'PENDIDIKAN_TERAKIR', 'FOTO_KRY', 'STATUS_KRY'];
}
