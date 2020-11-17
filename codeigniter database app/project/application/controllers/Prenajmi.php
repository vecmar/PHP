<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Prenajmi extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Prenajmi_model');
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
		$data['prenajom'] = $this->Prenajmi_model->getRows();
		$data['title'] = 'Prenajmi List';
		$this->load->view('templates/header', $data);
		$this->load->view('prenajmi/index', $data);
		$this->load->view('templates/footer');
	}


	public function view($id){
		$data = array();
		if(!empty($id)){
			$data['prenajom'] = $this->Prenajmi_model->getRows($id);
			$data['title'] = $data['prenajom']['idpren'];
			$this->load->view('templates/header', $data);
			$this->load->view('prenajmi/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/prenajmi');
		}
	}

	public function add(){

		$data = array();
		$postData = array();
		if($this->input->post('postSubmit')){

			$this->form_validation->set_rules('sportoviska_idsport', 'sportoviska_idsport', 'required');
			$this->form_validation->set_rules('zakaznici_idzak', 'zakaznici_idzak', 'required');
			$this->form_validation->set_rules('termin', 'termin', 'required');
			$this->form_validation->set_rules('trvanie', 'trvanie', 'required');
			$postData = array(
				'sportoviska_idsport' => $this->input->post('sportoviska_idsport'),
				'zakaznici_idzak' => $this->input->post('zakaznici_idzak'),
				'termin' => $this->input->post('termin'),
				'trvanie' => $this->input->post('trvanie'),
			);

			if($this->form_validation->run() == true){
				$insert = $this->Prenajmi_model->insert($postData);
				if($insert){
					$this->session->set_userdata('success_msg', 'Prenajom pridany.');
					redirect('/prenajmi');
				}else{
					$data['error_msg'] = 'Vyskitol sa problem..';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Create Prenajom';
		$data['action'] = 'Add';
		$this->load->view('templates/header', $data);
		$this->load->view('Prenajmi/addedit', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id){
		$data = array();
		$postData = $this->Prenajmi_model->getRows($id);
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('sportoviska_idsport', 'sportoviska_idsport', 'required');
			$this->form_validation->set_rules('zakaznici_idzak', 'zakaznici_idzak', 'required');
			$this->form_validation->set_rules('termin', 'termin', 'required');
			$this->form_validation->set_rules('trvanie', 'trvanie', 'required');
			$postData = array(
				'sportoviska_idsport' => $this->input->post('sportoviska_idsport'),
				'zakaznici_idzak' => $this->input->post('zakaznici_idzak'),
				'termin' => $this->input->post('termin'),
				'trvanie' => $this->input->post('trvanie'),
			);
			if($this->form_validation->run() == true){
				$update = $this->Prenajmi_model->update($postData, $id);
				if($update){
					$this->session->set_userdata('success_msg', 'Prenajom upraveny.');

					redirect('/prenajmi');
				}else{
					$data['error_msg'] = 'Vyskitol sa problem.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Update Prenajom';
		$data['action'] = 'Edit';
		$this->load->view('templates/header', $data);
		$this->load->view('prenajmi/addedit', $data);
		$this->load->view('templates/footer');
	}



	public function delete($id){
		if($id){
			$delete = $this->Prenajmi_model->delete($id);
			if($delete){
				$this->session->set_userdata('success_msg', 'Prenajom odstraneny.');
			}else{
				$this->session->set_userdata('error_msg', 'Vyskitol sa problem.');
			}
		}
		redirect('/prenajmi');
	}

}
