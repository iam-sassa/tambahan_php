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

			$ori_filename = $_FILES['image']['name'];
			$new_name = time()."".str_replace(" ", ".",$ori_filename);
			$config = [
				'upload_path' => './images/',
				'allowed_types' => 'gif|jpg|png',
				'file_name' => $new_name,
			];

			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload('userfile')){
				$imageError = array('imageError' => $this->upload->display_errors());
				$this->load->view('admin/barang_create.php', $imageError);
			}
			else {
				$prod_filename = $this->upload->data('file_name');
				$dataBarang = [
					'code' => $this->input->post('code'),
					'name' => $this->input->post('name'),
					'price' => $this->input->post('price'),
					'init_stock' => $this->input->post('init_stock'),
					'image' => $prod_filename,
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),
					'created_at' => $this->input->post('created_at')
				];
	
				$saved = $this->Barangmodel->insert($dataBarang);
	
				if ($saved) {
					$this->session->set_flashdata('message', 'New Barang was created');
					return redirect('admin/barang');
				}
				
				$this->load->view('admin/barang_create.php', $dataBarang);
			}
		}

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