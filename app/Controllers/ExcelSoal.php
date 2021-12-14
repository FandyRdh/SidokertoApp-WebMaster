<?php

namespace App\Controllers;

use PHPExcel;
use PHPExcel_IOFactory;
use App\Models\SoalModel;

class ExcelSoal extends BaseController
{
	public function __construct()
	{
		$this->soal = new SoalModel();
	}


	public function index()
	{
		$data['soal'] = $this->soal->findAll();
		echo view('index', $data);
	}

	public function tesImport()
	{
		$data['soal'] = $this->soal->findAll();

		echo view('tesExport/testimport', $data);
	}


	public function prosesExcel()
	{
		$file = $this->request->getFile('fileexcel');
		if ($file) {
			$excelReader  = new PHPExcel();
			//mengambil lokasi temp file
			$fileLocation = $file->getTempName();
			//baca file
			$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
			//ambil sheet active
			$sheet	= $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			//looping untuk mengambil data
			foreach ($sheet as $idx => $data) {
				//skip index 1 karena title excel
				if ($idx == 1) {
					continue;
				}
				$nama = $data['A'];
				$hp = $data['B'];
				$email = $data['C'];
				// $email = $data['C'];
				echo $nama, $hp, $email, $data['D'], $data['F'] . '</br>';
				// insert data
				// $this->contact->insert([
				// 	'nama' => $nama,
				// 	'handphone' => $hp,
				// 	'email' => $email
				// ]);
			}
		}
		// session()->setFlashdata('message', 'Berhasil import excel');
		// return redirect()->to('/home');
	}
	//--------------------------------------------------------------------
	public function ImportSoal()
	{
		// dd($this->request->getVar());
		$pilihanbtn = $this->request->getVar('pilihanbtn');
		$idpaket = $this->request->getVar('idpaket');

		if ($pilihanbtn == 'Simpan') {
			$file = $this->request->getFile('fileexcel');
			if ($file) {
				$excelReader  = new PHPExcel();
				//mengambil lokasi temp file
				$fileLocation = $file->getTempName();
				//baca file
				$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
				//ambil sheet active
				$sheet	= $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				//looping untuk mengambil data
				foreach ($sheet as $idx => $data) {
					//skip index 1 karena title excel
					if ($idx == 1 || $idx == 2 || $idx == 3 || $idx == 4 || $idx == 5 || $idx == 6) {
						continue;
					}
					$nomorUrut = $data['A'];
					$txtsoal = $data['B'];
					$txta1 = $data['C'];
					$txtb1 = $data['D'];
					$txtc1 = $data['E'];
					$txtd1 = $data['F'];
					$kunci = $data['G'];
					// Insert Query
					$id_soal = 'MP' . rand(0, 100000);
					$Sub_KelasModel = new \App\Models\JabatanModel();
					$Sub_KelasModel->query("INSERT INTO soal(id_soal,ID_PAKET, NOMOR_URUT, SOAL_UJIAN, PILIHAN_1, PILIHAN_2, PILIHAN_3, PILIHAN_4, KUNCI, ASSET_SOAL) VALUES ('$id_soal','$idpaket','$nomorUrut','$txtsoal','$txta1','$txtb1','$txtc1','$txtd1','$kunci',null);");
				}



				// Redirec
				session()->setFlashdata('pesan_insert', 'Insert Soal Berhasil, Soal Baru Berhasil Ditambhakan.');
				return redirect()->to("/adm/bank/detail/$idpaket");
			}
		} else if ($pilihanbtn == 'Lihat') {
			$file = $this->request->getFile('fileexcel');
			if ($file) {
				$excelReader  = new PHPExcel();
				//mengambil lokasi temp file
				$fileLocation = $file->getTempName();
				//baca file
				$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
				//ambil sheet active
				$sheet	= $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				$Sub_KelasModel = new \App\Models\JabatanModel();
				$DataPaketSoal = $Sub_KelasModel->query("SELECT PS.JENIS_SOAL,KLS.NAMA_KLS,MP.NAMA_MAPEL,KRY.NAMA_KRY
				from paket_soal PS
				JOIN KELAS KLS
				ON PS.id_kls = KLS.id_kls
				join mapel MP
				on MP.ID_MAPEL = PS.ID_MAPEL
				join karyawan KRY
				on KRY.ID_KRY = PS.ID_KRY
				where PS.ID_PAKET = '$idpaket'");


				$data = [
					'title' => 'Perview Soal | SDN Sidoketo',
					'sheet' => $sheet,
					'DataPaketSoal' => $DataPaketSoal,
				];
				echo view('/CetakPrint/PerviewSoal', $data);
			}
		}
	}
}
