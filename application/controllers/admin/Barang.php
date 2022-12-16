<?php

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barangmodel');
	}

	public function index()
	{
		$data['goods'] = $this->Barangmodel->get();
		$this->load->view('admin/barang_list.php', $data);
	}

	public function create()
	{
		
		if ($this->input->method() === 'post') {
			$dataBarang = [
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'init_stock' => $this->input->post('init_stock'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'created_at' => $this->input->post('created_at')
			];

			$saved = $this->Barangmodel->insert($dataBarang);

			if ($saved) {
				$this->session->set_flashdata('message', 'New Barang was created');
				return redirect('admin/barang');
			}
		}

		$this->load->view('admin/barang_create.php', $data);
	}

	public function edit($id = null)
	{
		
		$data['barangs'] = $this->Barangmodel->find($id);

		if (!$data['barangs'] || !$id) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			$databarang = [
				'id' => $id,
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'init_stock' => $this->input->post('init_stock'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'updated_at' => $this->input->post('updated_at')
				
			];
			$updated = $this->Barangmodel->update($databarang);
			if ($updated) {
				$this->session->set_flashdata('message', 'Barang data was updated');
				redirect('admin/barang');
			}
		}

		$this->load->view('admin/barang_edit.php', $data);
	}

	public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}

		$deleted = $this->Barangmodel->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Barang data was deleted');
			redirect('admin/barang');
		}
	}
}