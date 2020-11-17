<?php


class Zakaznici extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Zakaznici_model');
	}


	public function index(){
		$data = array();
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		$data['zakaznici'] = $this->Zakaznici_model->getRows();
		$data['title'] = 'Zakaznici List';
		$this->load->view('templates/header', $data);
		$this->load->view('Zakaznici/index', $data);
		$this->load->view('templates/footer');
	}




	// pridanie zaznamu
	public function add(){
		$data = array();
		$postData = array();
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('meno', 'meno', 'required');
			$this->form_validation->set_rules('adresa', 'adresa', 'required');

			$postData = array(
				'meno' => $this->input->post('meno'),
				'adresa' => $this->input->post('adresa'),
			);
			if($this->form_validation->run() == true){
				$insert = $this->Zakaznici_model->insert($postData);
				if($insert){
					$this->session->set_userdata('success_msg', 'Zakaznik pridany.');
					redirect('/zakaznici');
				}else{
					$data['error_msg'] = 'Vyskitol sa problem.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Create Zakaznik';
		$data['action'] = 'Add';
		$this->load->view('templates/header', $data);
		$this->load->view('Zakaznici/addedit', $data);
		$this->load->view('templates/footer');
	}



	public function view($id){
		$data = array();
		if(!empty($id)){
			$data['zakaznici'] = $this->Zakaznici_model->getRows($id);
			$data['title'] = $data['zakaznici']['meno'];
			$this->load->view('templates/header', $data);
			$this->load->view('Zakaznici/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/zakaznici');
		}
	}



	public function edit($id){
		$data = array();
		$postData = $this->Zakaznici_model->getRows($id);
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('meno', 'meno', 'required');
			$this->form_validation->set_rules('adresa', 'adresa', 'required');
			$postData = array(
				'meno' => $this->input->post('meno'),
				'adresa' => $this->input->post('adresa'),

			);
			if($this->form_validation->run() == true){
				$update = $this->Zakaznici_model->update($postData, $id);
				if($update){
					$this->session->set_userdata('success_msg', 'Zakaznik upraveny.');

					redirect('/zakaznici');
				}else{
					$data['error_msg'] = 'Vyskitol sa problem.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Update Zakaznik';
		$data['action'] = 'Edit';
		$this->load->view('templates/header', $data);
		$this->load->view('zakaznici/addedit', $data);
		$this->load->view('templates/footer');
	}



	public function delete($id){
		if($id){
			$delete = $this->Zakaznici_model->delete($id);
			if($delete){
				$this->session->set_userdata('success_msg', 'Zakaznik odstraneny.');
			}else{
				$this->session->set_userdata('error_msg', 'Vyskitol sa problem.');
			}
		}
		redirect('/zakaznici');
	}

}
