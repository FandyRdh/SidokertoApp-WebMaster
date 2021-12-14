<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table      = 'Jabatan';
    protected $primaryKey = 'ID_JABATAN';
    protected $allowedFields = ['ID_JABATAN', 'Nama_Jabatan'];
}
