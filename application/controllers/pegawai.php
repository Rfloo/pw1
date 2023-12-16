<?php
class pegawai extends CI_Controller
{
	public function index()
	{
		$data['pegawai'] = $this->p_pegawai->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pegawai', $data);
		$this->load->view('templates/footer');
	}

	public function about()
	{
		$data['pegawai'] = $this->p_pegawai->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('about', $data);
		$this->load->view('templates/footer');
	}

	public function home()
	{
		$data['pegawai'] = $this->p_pegawai->tampil_data()->result();
		$data['jml_pegawai'] = $this->p_pegawai->user();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('p_pegawai');
	}


	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pegawai');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$nip       = $this->input->post('nip');
		$nama      = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat    = $this->input->post('alamat');
		$no_telp   = $this->input->post('no_telp');
		$foto	   = $_FILES['foto'];
		if ($foto = '') {
		} else {
			$config['upload_path'] = './aset/foto';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';

			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				echo "upload gagal";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}
		$data = array(
			'nip'       => $nip,
			'nama'      => $nama,
			'tgl_lahir' => $tgl_lahir,
			'alamat'   	=> $alamat,
			'no_telp'   => $no_telp,
			'foto'		=> $foto
		);
		$this->p_pegawai->input_data($data, 'tb_pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong> Data Berhasil Ditambahkan!</strong></div>');
		redirect('pegawai');
	}

	public function hapus($no)
	{
		$where = array('no' => $no);
		$this->p_pegawai->hapus_data($where, 'tb_pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong> Data Berhasil Dihapus!</strong></div>');
		redirect('pegawai');
	}

	public function edit($no)
	{
		$where = array('no' => $no);
		$data['pegawai'] = $this->p_pegawai->edit_data($where, 'tb_pegawai')
			->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_admin($no)
	{
		$where = array('no' => $no);
		$data['pegawai'] = $this->p_pegawai->edit_admin($where, 'admin')
			->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit_admin', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$no = $this->input->post('no');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$foto	   = $_FILES['foto'];
		if ($foto = '') {
		} else {
			$config['upload_path'] = './aset/foto';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';

			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				echo "upload gagal";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}


		$data = array(
			'nip'       => $nip,
			'nama'      => $nama,
			'tgl_lahir' => $tgl_lahir,
			'alamat'   	=> $alamat,
			'no_telp'   => $no_telp,
			'foto'		=> $foto
		);
		$where = array(
			'no' => $no
		);
		$this->p_pegawai->update_data($where, $data, 'tb_pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong> Data Berhasil Diupdate!</strong></div>');
		redirect('pegawai');
	}

	public function detail($no)
	{
		$this->load->model('p_pegawai');
		$detail = $this->p_pegawai->detail_data($no);
		$data['detail'] = $detail;

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		// $this->load->model('p_pegawai');
		$profile = $this->p_pegawai->detail_admin();
		$data['profile'] = $profile;

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('profile_admin', $data);
		$this->load->view('templates/footer');
	}

	public function printmhs()
	{
		$data['pegawai'] = $this->p_pegawai->tampil_data("tb_pegawai")->result();
		$this->load->view('print_pegawai', $data);
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['pegawai'] = $this->p_pegawai->get_keyword($keyword);

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pegawai', $data);
		$this->load->view('templates/footer');
	}

	public function pdf1()
	{
		$this->load->library('pdf');
		error_reporting(0);
		$pdf = new FPDF('p', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'DAFTAR PEGAWAI', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(30, 10, 'NIP', 1, 0, 'C');
		$pdf->Cell(55, 10, 'Nama Pegawai', 1, 0, 'C');
		$pdf->Cell(50, 10, 'Tanggal Lahir', 1, 0, 'C');
		$pdf->Cell(50, 10, 'Nomor Telepon', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);


		$pegawai =  $this->db->get('tb_pegawai')->result();

		foreach ($pegawai as $data) {
			$pdf->Cell(30, 10, $data->nip, 1, 0, 'C');
			$pdf->Cell(55, 10, $data->nama, 1, 0, 'C');
			$pdf->Cell(50, 10, $data->tgl_lahir, 1, 0, 'C');
			$pdf->Cell(50, 10, $data->no_telp, 1, 1, 'C');
		}
		$pdf->output();
	}

	public function exportExcel()
	{
		$data = $this->p_pegawai->getData();

		include_once APPPATH . '/third_party/xlsxwriter.class.php';
		ini_set('display_errors', 0);
		ini_set('log_errors', 1);
		error_reporting(E_ALL & ~E_NOTICE);


		$filename = "report-" . date('d-m-Y-H-i-s') . ".xlsx";
		header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
		header("Content-Type: application/
			vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		$styles = array('widths' => [20, 20, 40, 30, 20], 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'center', 'border' => 'left,right,top,bottom');
		$style2 = array(['font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'center', 'border' => 'left,right,top,bottom', 'fill' => '#ffc'], ['fill' => '#fcf'], ['fill' => '#ccf'], ['fill' => '#cff'], ['fill' => '#cff'],);

		$header = array(
			'NIP' 				=> 'integer',
			'Nama pegawai'	 	=> 'string',
			'Tanggal Lahir' 	=> 'string',
			'Alamat' 			=> 'string',
			'Nomor Telepon' 	=> 'varchar',
		);

		$writer = new XLSXWriter();
		$writer->setAuthor('Jinan Pacarku Satu-satunya');

		$writer->writeSheetHeader('Sheet1', $header, $styles);

		foreach ($data as $row) {
			$writer->writeSheetRow('Sheet1', [
				$row['nip'], $row['nama'], $row['tgl_lahir'], $row['alamat'],
				$row['no_telp']
			], $styles2);
		}
		$writer->writeToStdOut();
	}

	function tampil_grafik()
	{
		$data['hasil'] = $this->p_pegawai->Jum_mahasiswa_perjurusan();
		$this->load->model('p_pegawai');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_grafik', $data);
		$this->load->view('templates/footer');
	}
}
