<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;

class C_Admin extends BaseController
{
	public function Login()
	{
		$data = [
			'title' => 'Login | SDN Sidoketo'
		];
		echo view('/Layout/Header_Login', $data);
		echo view('/v_Login.php');
	}

	public function Logout()
	{
		session()->destroy();
		return redirect()->to('/Login');
	}


	public function Logic_Login()
	{
		$ID_USER = $this->request->getVar('ID_USER');
		$PW_USER = $this->request->getVar('PW_USER');


		$KaryawanModel = new \App\Models\JabatanModel();
		$DataUser = $KaryawanModel->query("
		SELECT COUNT(ID_KRY)'Jumlah_Kry',ID_KRY,ID_JABATAN,NIP,NAMA_KRY,FOTO_KRY,STATUS_KRY,PW_KRY
		from karyawan where ID_KRY = '$ID_USER' and  PW_KRY  LIKE  '$PW_USER' COLLATE utf8_bin;");
		foreach ($DataUser->getResultArray() as $DataUser) {
		}
		// Admin
		if (strcmp($DataUser['ID_JABATAN'], 'JB001') == 0) {
			session()->set('ID_KRY', $ID_USER);
			session()->set('NM_KRY', $DataUser['NAMA_KRY']);
			session()->set('ID_JABATAN', $DataUser['ID_JABATAN']);
			session()->set('FOTO_KRY', $DataUser['FOTO_KRY']);

			$nama =  session()->get('NM_KRY');
			session()->setFlashdata('pesan_insert', "Selamat Datang Bpk/Ibu $nama.");
			return redirect()->to('/adm/dashboard');
		} else {
			session()->setFlashdata('pesan_gagal', 'ID atau Password yang anda masukan salah.');
			return redirect()->to('/Login');
		}
		return redirect()->to('/Login');
	}

	//--------------------------------------------------------------------

	public function Dashboard()
	{

		$KaryawanModel = new \App\Models\JabatanModel();

		$datakelas = $KaryawanModel->query("
		select kls.NAMA_KLS,count(ID_SUB)'JumlahKelas'
		from sub_kelas sub
		join kelas kls
		on kls.ID_KLS = sub.ID_KLS
		GROUP by kls.NAMA_KLS
		order by kls.NAMA_KLS ASC;");
		$JumlahSiswa1 = $KaryawanModel->query("select count(NISN)'JumlahSiswa' from siswa where ID_KLS = 'KLS_001';");
		$JumlahSiswa2 = $KaryawanModel->query("select count(NISN)'JumlahSiswa' from siswa where ID_KLS = 'KLS_002';");
		$JumlahSiswa3 = $KaryawanModel->query("select count(NISN)'JumlahSiswa' from siswa where ID_KLS = 'KLS_003';");
		$JumlahSiswa4 = $KaryawanModel->query("select count(NISN)'JumlahSiswa' from siswa where ID_KLS = 'KLS_004';");
		$JumlahSiswa5 = $KaryawanModel->query("select count(NISN)'JumlahSiswa' from siswa where ID_KLS = 'KLS_005';");
		$JumlahSiswa6 = $KaryawanModel->query("select count(NISN)'JumlahSiswa' from siswa where ID_KLS = 'KLS_006';");
		$JumlahSiswaAll = $KaryawanModel->query("select count(NISN)'JumlahSiswa' from siswa ;");
		$JumlahGuru = $KaryawanModel->query("select count(ID_KRY)'JumlahGuru' from karyawan where ID_JABATAN = 'JB002';");
		$JumlahKelas = $KaryawanModel->query("select count(ID_SUB)'JumlahKelas' from sub_kelas;");

		foreach ($JumlahSiswa1->getResultArray() as $JumlahSiswa1) {
		}
		foreach ($JumlahSiswa2->getResultArray() as $JumlahSiswa2) {
		}
		foreach ($JumlahSiswa3->getResultArray() as $JumlahSiswa3) {
		}
		foreach ($JumlahSiswa4->getResultArray() as $JumlahSiswa4) {
		}
		foreach ($JumlahSiswa5->getResultArray() as $JumlahSiswa5) {
		}
		foreach ($JumlahSiswa6->getResultArray() as $JumlahSiswa6) {
		}
		foreach ($JumlahSiswaAll->getResultArray() as $JumlahSiswaAll) {
		}
		foreach ($JumlahGuru->getResultArray() as $JumlahGuru) {
		}
		foreach ($JumlahKelas->getResultArray() as $JumlahKelas) {
		}
		$data = [
			'title' => 'Dashboard | SDN Sidoketo',
			'DetailJumlahKelas' => $datakelas,
			'jumkelas1' =>  $JumlahSiswa1['JumlahSiswa'],
			'jumkelas2' =>  $JumlahSiswa2['JumlahSiswa'],
			'jumkelas3' =>  $JumlahSiswa3['JumlahSiswa'],
			'jumkelas4' =>  $JumlahSiswa4['JumlahSiswa'],
			'jumkelas5' =>  $JumlahSiswa5['JumlahSiswa'],
			'jumkelas6' =>  $JumlahSiswa6['JumlahSiswa'],
			'jumkelasAll' =>  $JumlahSiswaAll['JumlahSiswa'],
			'JumlahGuru' =>  $JumlahGuru['JumlahGuru'],
			'JumlahKelas' =>  $JumlahKelas['JumlahKelas']
		];
		return view('v_Dashboard', $data);
	}

	//--------------------KAryawan----------------------------
	public function karyawan($idJbt)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();

		$DataJbt = $Sub_KelasModel->query("select * from jabatan");

		if ($idJbt == 'all') {
			$DataKry = $Sub_KelasModel->query("
			SELECT * from Karyawan");
		} else {
			$DataKry = $Sub_KelasModel->query("
			SELECT * from Karyawan
			where ID_JABATAN = '$idJbt';");
		}

		$data = [
			'title' => 'Data Karyawan| SDN Sidoketo',
			'DataKry' => $DataKry,
			'DataJbt' => $DataJbt,
			'KlikId' => $idJbt

		];
		return view('v_Kry', $data);
	}

	public function DetailKry($idKry)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$DataKry = $Sub_KelasModel->query("SELECT * FROM KARYAWAN KRY JOIN JABATAN JBT ON KRY.ID_JABATAN = JBT.ID_JABATAN WHERE ID_KRY = '$idKry';");
		$DataJbt = $Sub_KelasModel->query("SELECT * FROM JABATAN;");
		$JbtUser = $Sub_KelasModel->query("SELECT ID_JABATAN FROM KARYAWAN WHERE ID_KRY='$idKry'");
		$DataMapel = $Sub_KelasModel->query("SELECT * FROM mapel;");
		$DataPlotAjar = $Sub_KelasModel->query("SELECT * FROM plotting_ajar PA JOIN mapel MP ON PA.ID_MAPEL = MP.ID_MAPEL WHERE ID_KRY = '$idKry';");

		foreach ($JbtUser->getResultArray() as $JbtUser) {
		}

		$data = [
			'title' => 'Data Karyawan| SDN Sidoketo',
			'DataKry' => $DataKry,
			'idKry' => $idKry,
			'DataJbt' => $DataJbt,
			'DataMapel' => $DataMapel,
			'JbtUser' => $JbtUser['ID_JABATAN'],
			'DataPlotAjar' => $DataPlotAjar,
			'validation' => \Config\Services::validation()
		];
		return view('v_DetailKry', $data);
	}

	public function addKry($id_Jabatan)
	{
		$data = [
			'title' => 'Daftar Karyawan Baru | SDN Sidoketo',
			'validation' => \Config\Services::validation(),
			'id_Jabatan' => $id_Jabatan
		];
		// Admin
		return view('v_AddKry_Guru', $data);
		// if ($id_Jabatan == 'JB002') {
		// }
		// // Admin
		// else if ($id_Jabatan == 'JB81868') {
		// }


		$Sub_KelasModel = new \App\Models\JabatanModel();
	}

	public function DelKry($id_kry)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("DELETE FROM karyawan WHERE ID_KRY = '$id_kry';");
		session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
		return redirect()->to("/adm/kry/all");
	}

	public function UpdtKry()
	{

		// d($this->request->getFile('fotokry'));
		// echo $this->request->getFile('fotokry');

		// dd($this->request->getVar());
		$TxtNip = $this->request->getVar('TxtNip');
		$txtNamaLengkap  = $this->request->getVar('txtNamaLengkap');
		$txtAlamat = $this->request->getVar('txtAlamat');
		$txtJK = $this->request->getVar('txtJK');
		$txtNoTelp = $this->request->getVar('txtNoTelp');
		$txtAgama = $this->request->getVar('txtAgama');
		$txtEmail = $this->request->getVar('txtEmail');
		$txtTempatLahir = $this->request->getVar('txtTempatLahir');
		$txtTglLahir = $this->request->getVar('txtTglLahir');
		$txtPendidikanTerakir = $this->request->getVar('txtPendidikanTerakir');
		$txtNamaFoto = $this->request->getVar('txtNamaFoto');

		$txtJabatan = $this->request->getVar('txtJabatan');
		$txtStatusKry = $this->request->getVar('txtStatusKry');



		$txtIdKry = $this->request->getVar('txtIdKry');
		$txtPwKry = $this->request->getVar('txtPwKry');


		if (!$this->validate([

			'fotokry' => [
				'rules' => [
					'max_size[fotokry,5120]',
					'is_image[fotokry]'

				],
				'errors' => [
					'max_size' => 'ukuran foto terlalu besar (max 5Mb)',
					'is_image' => 'hanya bisa upload file format gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
			return redirect()->to("/adm/kry/detail/$txtIdKry")->withInput();
		}
		if ($this->request->getFile('fotokry') == "") {
			echo "Kosong";
		} else {
			echo "ada";
			if ($txtNamaFoto == 'default.jpg') {
				$fotokry = $this->request->getFile('fotokry');
				$fotokry->move('assets/images/profile_kry', "$txtIdKry.jpg");

				$txtNamaFoto = "$txtIdKry.jpg";
			} else {
				unlink('assets/images/profile_kry/' . $txtNamaFoto);

				$fotokry = $this->request->getFile('fotokry');
				$fotokry->move('assets/images/profile_kry', "$txtNamaFoto");
			}
		}



		$Sub_KelasModel = new \App\Models\JabatanModel();

		// // insert Detail Karyawan
		$Sub_KelasModel->query(
			"UPDATE karyawan SET ID_JABATAN='$txtJabatan',NIP='$TxtNip',NAMA_KRY='$txtNamaLengkap',ALAMAT_KRY='$txtAlamat',AGAMA_KRY='$txtAgama',JK_KRY='$txtJK',EMAIL_KRY='$txtEmail',TLP_KRY='$txtNoTelp',PW_KRY='$txtPwKry',Tempat_Lahir_Kry='$txtTempatLahir',TGL_LAHIR='$txtTglLahir',PENDIDIKAN_TERAKIR='$txtPendidikanTerakir ',Status_Kry='$txtStatusKry',Foto_Kry='$txtNamaFoto' WHERE ID_KRY='$txtIdKry';"
		);

		session()->setFlashdata('pesan_Update', 'Data Karyawan berhasil di rubah.');
		return redirect()->to("/adm/kry/detail/$txtIdKry");
	}

	public function saveKry()
	{

		// dd($this->request->getVar());
		$TxtNip = $this->request->getVar('TxtNip');
		$txtNamaLengkap  = $this->request->getVar('txtNamaLengkap');
		$txtAlamat = $this->request->getVar('txtAlamat');
		$txtJK = $this->request->getVar('txtJK');
		$txtNoTelp = $this->request->getVar('txtNoTelp');
		$txtAgama = $this->request->getVar('txtAgama');
		$txtEmail = $this->request->getVar('txtEmail');
		$txtTempatLahir = $this->request->getVar('txtTempatLahir');
		$txtTglLahir = $this->request->getVar('txtTglLahir');
		$txtPendidikanTerakir = $this->request->getVar('txtPendidikanTerakir');

		$txtIdJab = $this->request->getVar('txtIdJab');



		$txtIdKry = $this->request->getVar('txtIdKry');
		$txtPwKry = $this->request->getVar('txtPwKry');

		if (!$this->validate([
			'txtIdKry' => [
				'rules' => 'required|is_unique[karyawan.ID_KRY]',
				'errors' => [
					'required' => 'Kolom ID Harus Di isi.',
					'is_unique' => 'Data ID sudah ada / terdaftar.'
				]
			],
			'fotokry' => [
				'rules' => [
					'max_size[fotokry,5120]',
					'uploaded[fotokry]',
					'is_image[fotokry]'

				],
				'errors' => [
					'uploaded' => 'pilih file foto terlebih dahulu',
					'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
					'is_image' => 'hanya bisa upload file format gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
			return redirect()->to("/adm/kry/add/$txtIdJab")->withInput();
		}


		$fotokry = $this->request->getFile('fotokry');
		$fotokry->move('assets/images/profile_kry', "$txtIdKry.jpg");

		$Sub_KelasModel = new \App\Models\JabatanModel();

		// insert Detail Karyawan
		$Sub_KelasModel->query(
			"INSERT INTO karyawan(ID_KRY, ID_JABATAN, NIP, NAMA_KRY, ALAMAT_KRY, AGAMA_KRY, JK_KRY, EMAIL_KRY, TLP_KRY, PW_KRY, Tempat_Lahir_Kry, TGL_LAHIR, PENDIDIKAN_TERAKIR, Status_Kry, Foto_Kry) VALUES ('$txtIdKry','$txtIdJab','$TxtNip','$txtNamaLengkap','$txtAlamat','$txtAgama','$txtJK','$txtEmail','$txtNoTelp','$txtPwKry','$txtTempatLahir','$txtTglLahir','$txtPendidikanTerakir','Aktif','$txtIdKry.jpg');"
		);

		session()->setFlashdata('pesan_insert', 'Karyawan Baru Berhasil Ditambhakan.');
		return redirect()->to("/adm/kry/$txtIdJab")->withInput();
	}

	public function InsertPlot()
	{

		$txtMapelAjar = $this->request->getVar('txtMapelAjar');
		$txtNIP = $this->request->getVar('txtNIP');

		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->Query("INSERT INTO plotting_ajar(ID_MAPEL, ID_KRY) VALUES ('$txtMapelAjar','$txtNIP')");
		session()->setFlashdata('pesan_Update', 'Plotting ajar berhasil ditambahkan.');
		return redirect()->to("/adm/kry/detail/$txtNIP");
	}

	public function DeletePlot($txtNIP, $txtIdMapel)
	{

		$Sub_KelasModel = new \App\Models\JabatanModel();

		$Sub_KelasModel->Query("DELETE FROM plotting_ajar WHERE ID_MAPEL = '$txtIdMapel' and ID_KRY = '$txtNIP';");
		session()->setFlashdata('pesan_hapus', 'Plotting ajar berhasil dihapus.');
		return redirect()->to("/adm/kry/detail/$txtNIP");
	}

	// --------------------Siswa Dan Kelas----------------------

	public function SiswaDanKelas()
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Q_Sub_KelasModel = $Sub_KelasModel->query("
	  	SELECT sub.ID_SUB,sub.ID_KLS,NAMA_SUB,COUNT(sis.NISN)'Jumlah_Siswa'
		from sub_kelas sub
		left join siswa sis
		on sub.ID_SUB = sis.ID_SUB
		group by ID_SUB;
		");

		$DataKry = $Sub_KelasModel->query("
		select * from kelas
		");
		$DataKls = $Sub_KelasModel->query("SELECT * FROM kelas;");



		$data = [
			'title' => 'Siswa Dan Kelas | SDN Sidoketo',
			'Q_Sub_KelasModel' => $Q_Sub_KelasModel,
			'DataKry' => $DataKry,
			'DataKls' => $DataKls
		];
		return view('v_SiswaDanKelas', $data);
	}

	public function SaveKelas()
	{
		$txtIdKelas = $this->request->getVar('txtIdKelas');

		$Sub_KelasModel = new \App\Models\JabatanModel();
		$DataKlsTerakir = $Sub_KelasModel->query("
		SELECT MAX(ID_SUB)'idSubKelas',MAX(NAMA_SUB)'namaSubKelas' from kelas
		join sub_kelas 
		on kelas.ID_KLS = sub_kelas.ID_KLS
		where kelas.ID_KLS = '$txtIdKelas'
		");

		foreach ($DataKlsTerakir->getResultArray() as $DataKlsTerakir) {
		}
		$idSub = $DataKlsTerakir['idSubKelas'];
		$nmSub = $DataKlsTerakir['namaSubKelas'];
		$idSub++;
		$nmSub++;

		$Sub_KelasModel->query("INSERT INTO sub_kelas (ID_SUB, ID_KLS,NAMA_SUB) VALUES ('$idSub', '$txtIdKelas','$nmSub');");
		session()->setFlashdata('pesan_insert', 'Kelas Baru Berhasil Ditambhakan.');

		return redirect()->to('/adm/snk');
	}

	public function Sub_Del($p_id_SUB)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$v1 = $Sub_KelasModel->query("Select Count(NISN)'Penggunaan' from siswa where ID_SUB = '$p_id_SUB'");
		foreach ($v1->getResultArray() as $testPenggunaan) {
		}
		if ($testPenggunaan['Penggunaan'] > 0) {
			session()->setFlashdata('pesan_hapus', "Kelas tidak dapat dihapus, Masih ada siswa yang terdaftar di kelas");
			return redirect()->to("/adm/snk/detail/$p_id_SUB");
		} else {
			$Sub_KelasModel = new \App\Models\JabatanModel();
			$Sub_KelasModel->query("DELETE FROM sub_kelas WHERE ID_SUB = '$p_id_SUB';");
			session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
			return redirect()->to("/adm/snk");
		}
	}

	public function Detail_Kelas($p_id_SUB)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$DataKls = $Sub_KelasModel->query("
		SELECT sub.ID_SUB,sub.ID_KLS,NAMA_SUB,COUNT(sis.NISN)'Jumlah_Siswa'
		from sub_kelas sub
		left join siswa sis
		on sub.ID_SUB = sis.ID_SUB
		where sis.ID_SUB = '$p_id_SUB';
		");

		$DataSiswa = $Sub_KelasModel->query("select * from siswa where ID_SUB = '$p_id_SUB';");
		$JumLaki = $Sub_KelasModel->query("Select Count(JK_SISWA)'JumLaki' from siswa where ID_SUB = '$p_id_SUB' and  JK_SISWA = 'Laki - laki'");
		$JumPer = $Sub_KelasModel->query("Select Count(JK_SISWA)'JumPer' from siswa where ID_SUB = '$p_id_SUB' and  JK_SISWA = 'Perempuan'");

		foreach ($JumLaki->getResultArray() as $JumLaki) {
		}
		foreach ($JumPer->getResultArray() as $JumPer) {
		}
		foreach ($DataKls->getResultArray() as $DataKls) {
		}

		$data = [
			'title' => 'Siswa Dan Kelas | SDN Sidoketo',
			'JumLaki' => $JumLaki['JumLaki'],
			'JumPer' => $JumPer['JumPer'],
			'Nama_Sub' => $DataKls['NAMA_SUB'],
			'ID_KLS' => $DataKls['ID_KLS'],
			'JumSiswa' => $DataKls['Jumlah_Siswa'],
			'DataSiswa' => 	$DataSiswa,
			'id_SUB' => $p_id_SUB
		];
		return view('v_DataKelas', $data);
	}

	public function addSiswa($id_kelas, $id_sub)
	{
		$data = [
			'title' => 'Daftar Siswa Baru | SDN Sidoketo',
			'validation' => \Config\Services::validation(),
			'id_kelas' => $id_kelas,
			'id_sub' => $id_sub
		];

		return view('v_AddSiswa', $data);
	}


	public function saveSiswa()
	{

		// dd($this->request->getVar());
		$txtNisn = $this->request->getVar('txtNisn');
		$txtPwSiswa  = $this->request->getVar('txtPwSiswa');

		$txtNamaLengkap = $this->request->getVar('txtNamaLengkap');
		$txtJK = $this->request->getVar('txtJK');
		$txtAlamat = $this->request->getVar('txtAlamat');
		$txtTempatLahir = $this->request->getVar('txtTempatLahir');
		$txtTglLahir = $this->request->getVar('txtTglLahir');
		$txtAgama = $this->request->getVar('txtAgama');
		$txtNoTelp = $this->request->getVar('txtNoTelp');
		$txtIdKls = $this->request->getVar('txtIdKls');
		$txtIdSub  = $this->request->getVar('txtIdSub');



		if (!$this->validate([
			'txtNisn' => [
				'rules' => 'required|is_unique[siswa.NISN]',
				'errors' => [
					'required' => 'Kolom ID Harus Di isi.',
					'is_unique' => 'Data ID sudah ada / terdaftar.'
				]
			],
			'foto' => [
				'rules' => [
					'max_size[foto,5120]',
					'uploaded[foto]',
					'is_image[foto]'

				],
				'errors' => [
					'uploaded' => 'pilih file foto terlebih dahulu',
					'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
					'is_image' => 'hanya bisa upload file format gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/adm/kry/add')->withInput()->with('validation', $validation);
			// return redirect()->to("/adm/kry/add/$txtIdJab")->withInput();
			return redirect()->to("/adm/snk/s/add/$txtIdKls/$txtIdSub")->withInput();
		}


		$foto = $this->request->getFile('foto');
		$foto->move('assets/images/profile_siswa', "$txtNisn.jpg");

		$Sub_KelasModel = new \App\Models\JabatanModel();

		// insert Detail Karyawan
		$Sub_KelasModel->query(
			"INSERT INTO siswa(NISN, ID_SUB, ID_KLS, NAMA_SISWA, ALAMAT_SISWA, JK_SISWA, Tempat_Lahir_Siswa, TGL_LAHIR_SISWA, AGAMA_SISWA, TELP_WALI_SISWA, Status_Siswa, Foto_Siswa, PW_SISWA) VALUES ('$txtNisn','$txtIdSub','$txtIdKls','$txtNamaLengkap','$txtAlamat','$txtJK','$txtTempatLahir','$txtTglLahir','$txtAgama','$txtNoTelp','Aktif','$txtNisn.jpg','$txtPwSiswa');"
		);

		session()->setFlashdata('pesan_insert', 'Siswa Baru Berhasil Ditambhakan.');
		return redirect()->to("/adm/snk/detail/$txtIdSub");
	}


	public function sis_Del($sub_kls, $nisn)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("DELETE FROM siswa WHERE NISN = '$nisn';");
		session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');

		return redirect()->to("/adm/snk/detail/$sub_kls");
	}


	public function detailSiswa($sub_kls, $nisn)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$DataSiswa = $Sub_KelasModel->query("SELECT * FROM SISWA WHERE NISN = '$nisn'");
		$DataSubKls = $Sub_KelasModel->query("SELECT * FROM sub_kelas");

		$data = [
			'title' => 'Dashboard | SDN Sidoketo',
			'DataSiswa' => $DataSiswa,
			'DataSubKls' => $DataSubKls,
			'validation' => \Config\Services::validation()
		];


		return view('v_DetailSiswa', $data);
	}

	public function updtSiswa()
	{
		$txtNisn = $this->request->getVar('txtNisn');
		$txtPwSiswa  = $this->request->getVar('txtPwSiswa');

		$txtNamaLengkap = $this->request->getVar('txtNamaLengkap');
		$txtJK = $this->request->getVar('txtJK');
		$txtAlamat = $this->request->getVar('txtAlamat');
		$txtTempatLahir = $this->request->getVar('txtTempatLahir');
		$txtTglLahir = $this->request->getVar('txtTglLahir');
		$txtAgama = $this->request->getVar('txtAgama');
		$txtNoTelp = $this->request->getVar('txtNoTelp');
		$txtIdSub  = $this->request->getVar('txtsubkls');
		$nmFotoSiswa  = $this->request->getVar('nmFotoSiswa');
		$txtstatussiswa  = $this->request->getVar('txtstatussiswa');


		$Sub_KelasModel = new \App\Models\JabatanModel();
		$CariKelas = $Sub_KelasModel->query("SELECT * FROM sub_kelas where ID_SUB = '$txtIdSub';");
		foreach ($CariKelas->getResultArray() as $CariKelas2) {
			$txtIdKls = $CariKelas2['ID_KLS'];
		}

		if (!$this->validate([
			'foto' => [
				'rules' => [
					'max_size[foto,5120]',
					'is_image[foto]'

				],
				'errors' => [
					'max_size' => 'ukuran foto terlalu besar (max 1Mb)',
					'is_image' => 'hanya bisa upload file format gambar'
				]
			]
		])) {
			return redirect()->to("/adm/snk/s/updt/$txtIdSub/$txtNisn")->withInput();
		}


		if ($this->request->getFile('foto') == "") {
		} else {
			if ($nmFotoSiswa == 'default.jpg' || $nmFotoSiswa == '') {
				$nmFotoSiswa = "$txtNisn.jpg";

				$fotokry = $this->request->getFile('foto');
				$fotokry->move('assets/images/profile_siswa', "$nmFotoSiswa");
			} else {
				unlink('assets/images/profile_siswa/' . $nmFotoSiswa);

				$fotokry = $this->request->getFile('foto');
				$fotokry->move('assets/images/profile_siswa', "$nmFotoSiswa");
			}
		}


		$Sub_KelasModel = new \App\Models\JabatanModel();

		// insert Detail Karyawan
		$Sub_KelasModel->query(
			"UPDATE siswa SET ID_SUB='$txtIdSub',ID_KLS='$txtIdKls',NAMA_SISWA='$txtNamaLengkap',ALAMAT_SISWA='$txtAlamat',JK_SISWA='$txtJK',TEMPAT_LAHIR_SISWA='$txtTempatLahir',TGL_LAHIR_SISWA='$txtTglLahir',AGAMA_SISWA='$txtAgama',TELP_WALI_SISWA='$txtNoTelp',Status_Siswa='$txtstatussiswa',FOTO_SISWA='$nmFotoSiswa',PW_SISWA='$txtPwSiswa' WHERE  NISN='$txtNisn';"
		);

		session()->setFlashdata('pesan_insert', 'Data Siswa Berhasil Di ubah');
		return redirect()->to("/adm/snk/s/updt/$txtIdSub/$txtNisn");
	}



	// --------------------Bank Soal----------------------


	public function bankSoal($id_Kls)
	{
		$JabatanModel = new \App\Models\JabatanModel();
		if ($id_Kls == 'All') {
			$DataBankSoal = $JabatanModel->query("
			select ps.ID_PAKET,ps.JUDUL_SOAL,mp.NAMA_MAPEL,kls.NAMA_KLS,kry.NAMA_KRY,ps.JENIS_SOAL,ps.TGL_PEMBUATAN
			from paket_soal ps 
			join mapel mp 
			on  mp.ID_MAPEL =  ps.ID_MAPEL
			join karyawan kry
			on kry.ID_KRY = ps.ID_KRY
			join kelas kls
			on kls.ID_KLS = ps.ID_KLS;
			");
		} else {
			$DataBankSoal = $JabatanModel->query("
			select ps.ID_PAKET,ps.JUDUL_SOAL,mp.NAMA_MAPEL,kls.NAMA_KLS,kry.NAMA_KRY,ps.JENIS_SOAL,ps.TGL_PEMBUATAN
			from paket_soal ps 
			join mapel mp 
			on  mp.ID_MAPEL =  ps.ID_MAPEL
			join karyawan kry
			on kry.ID_KRY = ps.ID_KRY
			join kelas kls
			on kls.ID_KLS = ps.ID_KLS
			where ps.ID_KLS = '$id_Kls'
			;");
		}
		$DataMapel = $JabatanModel->query("SELECT * from mapel;");
		$DataKaryawan = $JabatanModel->query("SELECT * FROM karyawan;");
		$DataKelas = $JabatanModel->query("SELECT * from kelas;");
		$DataKelas1 = $JabatanModel->query("SELECT * from kelas;");

		$data = [
			'title' => 'Dashboard | SDN Sidoketo',
			'id_Kls' => $id_Kls,
			'DataBankSoal' => $DataBankSoal,
			'DataMapel' => $DataMapel,
			'DataKaryawan' => $DataKaryawan,
			'DataKelas1' => $DataKelas1,
			'DataKelas' => $DataKelas
		];


		return view('v_BankSoal', $data);
	}

	public function savePKT()
	{
		$txtJudulSoal = $this->request->getVar('txtJudulSoal');
		$txtidpaketsoal = $this->request->getVar('txtidpaketsoal');
		$txtidkry = $this->request->getVar('txtidkry');
		$txtidmapel = $this->request->getVar('txtidmapel');
		$txtidkls = $this->request->getVar('txtidkls');
		$asdtxtjenisasd = $this->request->getVar('txtjenis');


		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("INSERT INTO paket_soal(ID_PAKET, ID_KRY, ID_KLS, ID_MAPEL, JUDUL_SOAL, JENIS_SOAL, TGL_PEMBUATAN) VALUES ('$txtidpaketsoal','$txtidkry','$txtidkls','$txtidmapel','$txtJudulSoal','$asdtxtjenisasd', DATE_FORMAT(SYSDATE(), '%Y-%m-%d'));");
		session()->setFlashdata('pesan_insert', 'Paket Soal Baru Berhasil Ditambhakan.');
		return redirect()->to("/adm/bank/detail/$txtidpaketsoal");
	}

	public function DetailSoal($id_paket)
	{

		$JabatanModel = new \App\Models\JabatanModel();
		$DataBankSoal = $JabatanModel->query("
		select ps.ID_PAKET,ps.JUDUL_SOAL,mp.NAMA_MAPEL,kls.NAMA_KLS,kry.NAMA_KRY,ps.JENIS_SOAL,ps.TGL_PEMBUATAN,count(so.ID_PAKET)'Jum_Soal'
		from paket_soal ps 
		join mapel mp 
		on  mp.ID_MAPEL =  ps.ID_MAPEL
		join karyawan kry
		on kry.ID_KRY = ps.ID_KRY
		join kelas kls
		on kls.ID_KLS = ps.ID_KLS
		join soal so
		on so.ID_PAKET = ps.ID_PAKET
		where ps.ID_PAKET = '$id_paket'
		;");

		$DataMapel = $JabatanModel->query("SELECT * from mapel;");
		$DataKelas = $JabatanModel->query("SELECT * from kelas;");
		$DataKaryawan = $JabatanModel->query("SELECT * FROM karyawan;");
		$DataSoal = $JabatanModel->query("SELECT * FROM soal WHERE ID_PAKET = '$id_paket';");
		$data = [
			'title' => 'Dashboard | SDN Sidoketo',
			'DataBankSoal' => $DataBankSoal,
			'DataMapel' => $DataMapel,
			'DataKelas' => $DataKelas,
			'DataKaryawan' => $DataKaryawan,
			'DataSoal' => $DataSoal,
			'id_paket' => $id_paket
		];
		return view('v_DetailSoal', $data);
	}

	public function DelPaket($id_Paket)
	{

		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("DELETE FROM soal WHERE ID_PAKET = '$id_Paket';");
		$Sub_KelasModel->query("DELETE FROM paket_soal WHERE ID_PAKET = '$id_Paket';");
		session()->setFlashdata('pesan_hapus', 'Soal Berhasil Dihapus.');
		return redirect()->to("/adm/bank/All");
	}
	public function UpdatePaket($id_Paket)
	{
		// dd($this->request->getVar());
		$txtJudulSoal = $this->request->getVar('txtJudulSoal');
		$txtIdKelas = $this->request->getVar('txtIdKelas');
		$txtIdKry = $this->request->getVar('txtIdKry');
		$txtIdMapel = $this->request->getVar('txtIdMapel');
		$txtJenis = $this->request->getVar('txtJenis');
		$JabModel = new \App\Models\JabatanModel();
		$JabModel->query("UPDATE paket_soal SET ID_PAKET='$id_Paket',ID_KRY='$txtIdKry',ID_KLS='$txtIdKelas',ID_MAPEL='$txtIdMapel',JUDUL_SOAL='$txtJudulSoal',JENIS_SOAL='$txtJenis' WHERE  ID_PAKET='$id_Paket'");

		session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
		return redirect()->to("/adm/bank/detail/$id_Paket");
	}


	public function saveSoal()
	{
		// dd($this->request->getVar());
		$txtsoal = $this->request->getVar('txtsoal');
		$txta1 = $this->request->getVar('txta1');
		$txtb1 = $this->request->getVar('txtb1');
		$txtc1  = $this->request->getVar('txtc1');
		$txtd1 = $this->request->getVar('txtd1');
		$jawabanbenar = $this->request->getVar('jawabanbenar1');
		$txtIdPktSoal = $this->request->getVar('txtIdPktSoal');

		if ($jawabanbenar == 'A') {
			$kunci =  $txta1;
		} else if ($jawabanbenar == 'B') {
			$kunci = $txtb1;
		} else if ($jawabanbenar == 'C') {
			$kunci = $txtc1;
		} else if ($jawabanbenar == 'D') {
			$kunci = $txtd1;
		}

		$id_soal = 'MP' . rand(0, 100000);
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("INSERT INTO buku(ID_BUKU, NAMA_BUKU, NAMA_PENERBIT, TAHUN_TERBIT) VALUES ('','','','')");
		session()->setFlashdata('pesan_insert', 'Soal Baru Berhasil Ditambhakan.');
		return redirect()->to("/adm/bank/detail/$txtIdPktSoal");
	}

	public function UpdtSoal()
	{
		// dd($this->request->getVar());
		$txtsoal = $this->request->getVar('txtsoal');
		$txta = $this->request->getVar('txta');
		$txtb = $this->request->getVar('txtb');
		$txtc  = $this->request->getVar('txtc');
		$txtd = $this->request->getVar('txtd');
		$jawabanbenar = $this->request->getVar('jawabanbenar');
		$idsoal = $this->request->getVar('idsoal');
		$idpaket = $this->request->getVar('idpaket');

		if ($jawabanbenar == 'A') {
			$kunci =  $txta;
		} else if ($jawabanbenar == 'B') {
			$kunci = $txtb;
		} else if ($jawabanbenar == 'C') {
			$kunci = $txtc;
		} else if ($jawabanbenar == 'D') {
			$kunci = $txtd;
		}

		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("UPDATE soal SET SOAL_UJIAN='$txtsoal',PILIHAN_1='$txta',PILIHAN_2='$txtb',PILIHAN_3='$txtc',PILIHAN_4='$txtd',KUNCI='$kunci' WHERE ID_SOAL='$idsoal'");
		session()->setFlashdata('pesan_insert', 'Soal Baru Berhasil Ditambhakan.');
		return redirect()->to("/adm/bank/detail/$idpaket");
	}


	public function DelSoal($idpaket, $idSoal)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("DELETE FROM soal WHERE ID_SOAL = '$idSoal';");
		session()->setFlashdata('pesan_hapus', 'Soal Berhasil Dihapus.');
		return redirect()->to("/adm/bank/detail/$idpaket");
	}



	// --------------------Bank Soal--------------------

	public function Ujian($idkls)
	{

		$JabatanModel = new \App\Models\JabatanModel();
		if ($idkls == 'All') {
			$DataUjian = $JabatanModel->query("
			Select uj.ID_UJIAN,JUDUL_UJIAN,mp.NAMA_MAPEL,kry.NAMA_KRY,ID_PAKET,kls.NAMA_KLS,uj.JENIS_UJIAN,CONCAT(DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%d-%m-%Y %H:%i') ,' - ',DATE_FORMAT(UJ.TGL_SELESAI_UJIAN, '%d-%m-%Y %H:%i')) 'JadwalUjian'
			from ujian uj
			join mapel mp
			on uj.ID_MAPEL = mp.ID_MAPEL
			join karyawan kry
			on kry.ID_KRY = uj.ID_KRY
			join kelas kls
			on kls.ID_KLS = uj.ID_KLS;
			");
		} else {
			$DataUjian = $JabatanModel->query("
			Select uj.ID_UJIAN,JUDUL_UJIAN,mp.NAMA_MAPEL,kry.NAMA_KRY,ID_PAKET,kls.NAMA_KLS,uj.JENIS_UJIAN,CONCAT(DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%d-%m-%Y %H:%i') ,' - ',DATE_FORMAT(UJ.TGL_SELESAI_UJIAN, '%d-%m-%Y %H:%i')) 'JadwalUjian'
			from ujian uj
			join mapel mp
			on uj.ID_MAPEL = mp.ID_MAPEL
			join karyawan kry
			on kry.ID_KRY = uj.ID_KRY
			join kelas kls
			on kls.ID_KLS = uj.ID_KLS
			where uj.ID_KLS = '$idkls'	
			;");
		}

		$DataMapel = $JabatanModel->query("SELECT * from mapel;");
		$DataKelas = $JabatanModel->query("SELECT * from kelas;");
		$DataKry = $JabatanModel->query("SELECT * from karyawan where ID_JABATAN = 'JB002';");
		$DataPaket = $JabatanModel->query("SELECT * from paket_soal join mapel on mapel.ID_MAPEL = paket_soal.ID_MAPEL join kelas on kelas.ID_KLS = paket_soal.ID_KLS join karyawan on karyawan.ID_KRY = paket_soal.ID_KRY;");

		$data = [
			'title' => 'Ujian | SDN Sidoketo',
			'id_Kls' => $idkls,
			'DataUjian' => $DataUjian,
			'DataMapel' => $DataMapel,
			'DataKelas' => $DataKelas,
			'DataKelas2' => $DataKelas,
			'DataKry' => $DataKry,
			'DataPaket' => $DataPaket
		];
		return view('v_Ujian', $data);
	}

	public function ResetJawabanUjian($nisn, $idujian)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();


		$Sub_KelasModel->query("UPDATE nilai SET NILAI_UJIAN=NULL WHERE NISN='$nisn' and ID_UJIAN='$idujian';");
		$Sub_KelasModel->query("UPDATE jawaban_ujian SET JAWABAN_UJIAN=NULL WHERE NISN='$nisn' AND ID_UJIAN='$idujian'");


		session()->setFlashdata('pesan_insert', "Jawaban  Berhasil Direset.");
		return redirect()->to("/adm/ujian/detail/$idujian");
	}
	public function updateJawabanUjian()
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();

		$txtNamaSiswa = $this->request->getVar('txtNamaSiswa');
		$txtNilaSiswa  = $this->request->getVar('txtNilaSiswa');
		$txtIDUjian = $this->request->getVar('txtIDUjian');
		$txtNISNSiswa = $this->request->getVar('txtNISNSiswa');

		$Sub_KelasModel->query("UPDATE nilai SET NILAI_UJIAN='$txtNilaSiswa' WHERE NISN='$txtNISNSiswa' and ID_UJIAN='$txtIDUjian';");

		session()->setFlashdata('pesan_insert', "Jawaban ($txtNamaSiswa) Berhasil Diubah.");
		return redirect()->to("/adm/ujian/detail/$txtIDUjian");
	}
	public function saveUjian()
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();


		$IDUjian = 'UJ' . rand(0, 100000);;
		$txtJudulUjian = $this->request->getVar('txtJudulUjian');
		$txtTglMulai = $this->request->getVar('txtTglMulai');
		$txtTglSelesai = $this->request->getVar('txtTglSelesai');
		$txtJenisSujian = $this->request->getVar('txtJenisSujian');
		$txtIDKelas = $this->request->getVar('txtIDKelas');
		$txtIDKry = $this->request->getVar('txtIDKry');
		$txtIDMapel = $this->request->getVar('txtIDMapel');
		$txtIdpaket = $this->request->getVar('txtIdpaket');

		$tglMulaiTanpaT = str_replace('T', ' ', $txtTglMulai);
		$tglSelesaiTanpaT = str_replace('T', ' ', $txtTglSelesai);

		$Sub_KelasModel->query("INSERT INTO ujian(ID_UJIAN, ID_KLS, ID_KRY, ID_PAKET, ID_MAPEL, JUDUL_UJIAN, JENIS_UJIAN, TGL_MULAI_UJIAN, TGL_SELESAI_UJIAN, CODE_UJIAN) VALUES ('$IDUjian','$txtIDKelas','$txtIDKry','$txtIdpaket','$txtIDMapel','$txtJudulUjian','$txtJenisSujian','$tglMulaiTanpaT','$tglSelesaiTanpaT','');");
		session()->setFlashdata('pesan_insert', 'Ujian Berhasil Di Buat.');
		return redirect()->to("/adm/ujian/$txtIDKelas");
	}

	public function DetailUjian($idUjian)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$DataNilaiUjian = $Sub_KelasModel->query("
		SELECT S.NISN,S.NAMA_SISWA,SK.NAMA_SUB,N.NILAI_UJIAN,N.ID_UJIAN,IFNULL(N.NILAI_UJIAN, 'Belum Ujian') as 'Nilai_Ujian'
		FROM NILAI N
		JOIN siswa S
		ON S.NISN = N.NISN
		JOIN sub_kelas SK
		ON S.ID_SUB = SK.ID_SUB
		WHERE N.ID_UJIAN = '$idUjian';");

		$DataUjian = $Sub_KelasModel->query("SELECT KLS.NAMA_KLS,UJ.JUDUL_UJIAN,KRY.NAMA_KRY,MP.NAMA_MAPEL,UJ.JENIS_UJIAN,DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%d %M %Y') as jammulai,DATE_FORMAT(UJ.TGL_SELESAI_UJIAN, '%H:%i')-DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%H:%i') as lamaujian
		FROM UJIAN UJ
		JOIN MAPEL MP
		ON UJ.ID_MAPEL = MP.ID_MAPEL
		JOIN karyawan KRY
		ON KRY.ID_KRY = UJ.ID_KRY
		JOIN KELAS KLS
		ON KLS.ID_KLS = UJ.ID_KLS
		WHERE UJ.ID_UJIAN = '$idUjian'
		 ");

		$data = [
			'title' => 'Ujian | SDN Sidoketo',
			'id_Kls' => $idUjian,
			'idUjian' => $idUjian,
			'DataUjian' => $DataUjian,
			'DataNilaiUjian' => $DataNilaiUjian,
		];
		return view('v_DetailJawabanUjian', $data);
	}


	public function deleteUjian($idUjian)
	{
		$Sub_KelasModel = new \App\Models\JabatanModel();
		$Sub_KelasModel->query("DELETE FROM ujian WHERE ID_UJIAN = '$idUjian'");
		session()->setFlashdata('pesan_hapus', 'Ujian Berhasil Di Hapus.');
		return redirect()->to("/adm/ujian/All");
	}

	// --------------------Master----------------------

	public function Master()
	{

		$JabatanModel = new \App\Models\JabatanModel();
		$DataJabatan = $JabatanModel->query("
		select * from jabatan;
		 ");

		$DataMapel = $JabatanModel->query("
			select * from mapel;
		 ");

		$data = [
			'title' => 'Data Master | SDN Sidoketo',
			'DataJabatan' => $DataJabatan,
			'DataMapel' => $DataMapel
		];
		return view('v_Master', $data);
	}


	public function Master_Save($tipeInset)
	{
		if ($tipeInset == 'imapel') {
			$txtIdMapel = $this->request->getVar('txtIdMapel');
			$txtNamaMapel = $this->request->getVar('txtNamaMapel');
			$txtstatusmapel = $this->request->getVar('txtstatusmapel');
			$txtbobotmapel = $this->request->getVar('txtbobotmapel');
			$Sub_KelasModel = new \App\Models\JabatanModel();
			$Sub_KelasModel->query("INSERT INTO mapel (ID_MAPEL, NAMA_MAPEL,STATUS_MAPEL,BOBOT_MAPEL) VALUES ('$txtIdMapel', '$txtNamaMapel','$txtstatusmapel', '$txtbobotmapel');");
			session()->setFlashdata('pesan_insert', 'Mata Pelajaran Baru Berhasil Ditambhakan.');
			return redirect()->to('/adm/master');
		} elseif ($tipeInset == 'ijab') {
			$txtIdJabatan = $this->request->getVar('txtIdJabatan');
			$txtNamaJabatan = $this->request->getVar('txtNamaJabatan');
			$JabatanModel = new \App\Models\JabatanModel();
			$JabatanModel->query("INSERT INTO jabatan (ID_JABATAN, NAMA_JABATAN) VALUES ('$txtIdJabatan', '$txtNamaJabatan');");
			session()->setFlashdata('pesan_insert', 'Jabatan Baru Berhasil Ditambhakan.');
			return redirect()->to('/adm/master');
		}
	}


	public function Master_Update($tipeInset)
	{
		// Update Jabatan

		if ($tipeInset == 'ujab') {
			$ID_Jab = $this->request->getVar('txtIdJabU');
			$Nama_Jab = $this->request->getVar('txtNamJabU');
			$JabModel = new \App\Models\JabatanModel();
			$JabModel->query("UPDATE Jabatan SET ID_JABATAN = '$ID_Jab', NAMA_JABATAN= '$Nama_Jab' WHERE ID_JABATAN = '$ID_Jab';");
			session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
			return redirect()->to("/adm/master");
		}
		// Update Mate Pelajaran
		elseif ($tipeInset == 'umapel') {
			$ID_Jab = $this->request->getVar('txtIdMapelU');
			$Nama_Jab = $this->request->getVar('txtNMMapelU');
			$txtstatusmapel = $this->request->getVar('txtstatusmapel');
			$txtbobotmapel = $this->request->getVar('txtbobotmapel');

			$JabModel = new \App\Models\JabatanModel();
			$JabModel->query("UPDATE Mapel SET  NAMA_MAPEL= '$Nama_Jab',STATUS_MAPEL= '$txtstatusmapel',BOBOT_MAPEL= '$txtbobotmapel'
			WHERE ID_MAPEL = '$ID_Jab';");

			session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
			return redirect()->to("/adm/master");
		}
	}

	public function Master_Del($tipeDel, $id)
	{
		if ($tipeDel == 'dmapel') {
			$Sub_KelasModel = new \App\Models\JabatanModel();
			$v1 = $Sub_KelasModel->query("SELECT COUNT(ID_MAPEL) 'Penggunaan' FROM paket_soal WHERE ID_MAPEL = '$id'");
			foreach ($v1->getResultArray() as $testPenggunaan) {
			}
			if ($testPenggunaan['Penggunaan'] > 0) {
				session()->setFlashdata('pesan_hapus', "Data Mata Pelajar Tidak Dapat Di Hapus, Karena masih di gunakan di tabel lain");
				return redirect()->to("/adm/master");
			} else {
				$Sub_KelasModel = new \App\Models\JabatanModel();
				$Sub_KelasModel->query("DELETE FROM mapel WHERE ID_MAPEL = '$id';");
				session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
				return redirect()->to("/adm/master");
			}
		} else if ($tipeDel == 'djab') {
			$Sub_KelasModel = new \App\Models\JabatanModel();
			$v1 = $Sub_KelasModel->query("SELECT COUNT(ID_JABATAN) 'Penggunaan' FROM karyawan WHERE ID_JABATAN = '$id'");
			foreach ($v1->getResultArray() as $testPenggunaan) {
			}
			if ($id == 'JB001' or $id == 'JB002' or $id == 'JB81868') {
				session()->setFlashdata('pesan_hapus', "Jabatan Wajib, Tidak Dapat Dihapus");
				return redirect()->to("/adm/master");
			} else if ($testPenggunaan['Penggunaan'] > 0) {
				$DataJabatan = $Sub_KelasModel->query("SELECT * from Jabatan where ID_JABATAN = '$id';");
				foreach ($DataJabatan->getResultArray() as $DataJabatan) {
				}
				session()->setFlashdata('pesan_hapus', "Data Jabatan Tidak Dapat Di Hapus, Karena Masih Ada Karyawan yang sedang terdaftar sebagai ( " . $DataJabatan['NAMA_JABATAN'] . ")");
				return redirect()->to("/adm/master");
			} else {
				$Sub_KelasModel = new \App\Models\JabatanModel();
				$Sub_KelasModel->query("DELETE FROM Jabatan WHERE ID_JABATAN = '$id';");
				session()->setFlashdata('pesan_hapus', 'Data Jabatan Berhasil Dihapus.');
				return redirect()->to("/adm/master");
			}
		}
	}

	public function SetJabatan()
	{
		$JabatanModel = new \App\Models\JabatanModel();
		$DataJabatan = $JabatanModel->query("
		select * from jabatan;
		 ");
		return view('v_Master');
	}


	// ------------------------------------------
	public function CetakSoal($idUjian)
	{
		$JabatanModel = new \App\Models\JabatanModel();
		$DataSoal = $JabatanModel->query("
		select SOAL_UJIAN,PILIHAN_1,PILIHAN_2,PILIHAN_3,PILIHAN_4 
		from ujian uj
		join paket_soal ps
		on uj.ID_PAKET = ps.ID_PAKET
		join soal so
		on so.ID_PAKET = ps.ID_PAKET
		where uj.ID_UJIAN = '$idUjian'
		 ");

		$DataUjian = $JabatanModel->query("
		SELECT KRY.NAMA_KRY,MP.NAMA_MAPEL,UJ.JENIS_UJIAN,DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%d %M %Y') as jammulai,DATE_FORMAT(UJ.TGL_SELESAI_UJIAN, '%H:%i')-DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%H:%i') as lamaujian
		FROM UJIAN UJ
		JOIN MAPEL MP
		ON UJ.ID_MAPEL = MP.ID_MAPEL
		JOIN karyawan KRY
		ON KRY.ID_KRY = UJ.ID_KRY
		WHERE UJ.ID_UJIAN = '$idUjian'
		 ");
		foreach ($DataUjian->getResultArray() as $cekjenis) {
		}
		if ($cekjenis['JENIS_UJIAN'] == 'UTS') {
			$TipeUjian = 'Ujian Tengah Semester';
		} else if ($cekjenis['JENIS_UJIAN'] == 'UAS') {
			$TipeUjian = 'Ujian Akhir Semester';
		} else {
			$TipeUjian = 'Latihan Soal';
		}

		$data = [
			'title' => 'Data Master | SDN Sidoketo',
			'DataSoal' => $DataSoal,
			'DataUjian' => $DataUjian,
			'idUjian' => $idUjian,
			'TipeUjian' => $TipeUjian
		];
		return view('CetakPrint/CetakSoalUjian', $data);
	}

	public function CetakKuncijawaban($idUjian)
	{
		$JabatanModel = new \App\Models\JabatanModel();
		$DataSoal = $JabatanModel->query("
		select SOAL_UJIAN,PILIHAN_1,PILIHAN_2,PILIHAN_3,PILIHAN_4,KUNCI
		from ujian uj
		join paket_soal ps
		on uj.ID_PAKET = ps.ID_PAKET
		join soal so
		on so.ID_PAKET = ps.ID_PAKET
		where uj.ID_UJIAN = '$idUjian'
		 ");

		$DataUjian = $JabatanModel->query("
		SELECT KRY.NAMA_KRY,MP.NAMA_MAPEL,UJ.JENIS_UJIAN,DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%d %M %Y') as jammulai,DATE_FORMAT(UJ.TGL_SELESAI_UJIAN, '%H:%i')-DATE_FORMAT(UJ.TGL_MULAI_UJIAN, '%H:%i') as lamaujian
		FROM UJIAN UJ
		JOIN MAPEL MP
		ON UJ.ID_MAPEL = MP.ID_MAPEL
		JOIN karyawan KRY
		ON KRY.ID_KRY = UJ.ID_KRY
		WHERE UJ.ID_UJIAN = '$idUjian'
		 ");
		foreach ($DataUjian->getResultArray() as $cekjenis) {
		}
		if ($cekjenis['JENIS_UJIAN'] == 'UTS') {
			$TipeUjian = 'Ujian Tengah Semester';
		} else if ($cekjenis['JENIS_UJIAN'] == 'UAS') {
			$TipeUjian = 'Ujian Akhir Semester';
		} else {
			$TipeUjian = 'Latihan Soal';
		}

		$data = [
			'title' => 'Data Master | SDN Sidoketo',
			'DataSoal' => $DataSoal,
			'DataUjian' => $DataUjian,
			'idUjian' => $idUjian,
			'TipeUjian' => $TipeUjian
		];
		return view('CetakPrint/CetakKunciJawaban', $data);
	}
}
