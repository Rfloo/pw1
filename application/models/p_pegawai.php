<?php
class p_pegawai extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}

	public function tampil_data()
	{
		return $this->db->get('tb_pegawai');
	}

	public function tampil_admin()
	{
		return $this->db->get('admin');
	}

	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function edit_admin($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function detail_data($no = NULL)
	{
		$query = $this->db->get_where('tb_pegawai', array('no' => $no))->row();
		return $query;
	}

	public function detail_admin($ya = NULL)
	{
		$query = $this->db->get_where('admin', array('no' => $ya))->row();
		return $query;
	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('tb_pegawai');
		$this->db->like('no', $keyword);
		$this->db->or_like('nip', $keyword);
		$this->db->or_like('nama', $keyword);
		$this->db->or_like('tgl_lahir', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('no_telp', $keyword);
		return $this->db->get()->result();
	}

	public function getData()
	{
		return $this->db->get('tb_pegawai')->result_array();
	}

	public function getAdmin()
	{
		return $this->db->get('admin')->result_array();
	}

	function user()
	{
		$this->db->select('*');
		$this->db->from('tb_pegawai');

		return $this->db->get()->num_rows();
	}
}
