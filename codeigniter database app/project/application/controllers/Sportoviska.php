<?php


class Sportoviska extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Sportoviska_model');


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
		$data['sportoviska'] = $this->Sportoviska_model->getRows();
		$data['title'] = 'Sportoviska List';

		$this->load->view('templates/header', $data);
		$this->load->view('Sportoviska/index', $data);
		$this->load->view('templates/footer');
	}




	public function add(){
		$data = array();
		$postData = array();
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('nazov', 'nazov', 'required');
			$this->form_validation->set_rules('oznacenie', 'oznacenie',
				'required');

			$postData = array(
				'nazov' => $this->input->post('nazov'),
				'oznacenie' => $this->input->post('oznacenie'),
			);
			if($this->form_validation->run() == true){
				$insert = $this->Sportoviska_model->insert($postData);
				if($insert){
					$this->session->set_userdata('success_msg', 'Sportovisko pridane.');
					redirect('/sportoviska');
				}else{
					$data['error_msg'] = 'Vyskitol sa problem.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Create Sportovisko';
		$data['action'] = 'Add';
		$this->load->view('templates/header', $data);
		$this->load->view('Sportoviska/addedit', $data);
		$this->load->view('templates/footer');
	}

	public function view($id){
		$data = array();
		if(!empty($id)){
			$data['sportoviska'] = $this->Sportoviska_model->getRows($id);
			$data['title'] = $data['sportoviska']['nazov'];
			$this->load->view('templates/header', $data);
			$this->load->view('Sportoviska/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/sportoviska');
		}
	}

	public function edit($id){
		$data = array();
		$postData = $this->Sportoviska_model->getRows($id);
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('nazov', 'nazov', 'required');
			$this->form_validation->set_rules('oznacenie', 'oznacenie', 'required');
			$postData = array(
				'nazov' => $this->input->post('nazov'),
				'oznacenie' => $this->input->post('oznacenie'),

			);
			if($this->form_validation->run() == true){
				$update = $this->Sportoviska_model->update($postData, $id);
				if($update){
					$this->session->set_userdata('success_msg', 'Sportovisko upravene.');

					redirect('/sportoviska');
				}else{
					$data['error_msg'] = 'Vyskitol sa problem.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Update Sportovisko';
		$data['action'] = 'Edit';
		$this->load->view('templates/header', $data);
		$this->load->view('sportoviska/addedit', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id){
		if($id){
			$delete = $this->Sportoviska_model->delete($id);
			if($delete){
				$this->session->set_userdata('success_msg', 'Sportovisko odstranene.');
			}else{
				$this->session->set_userdata('error_msg', 'Vyskitol sa problem.');
			}
		}
		redirect('/sportoviska');
	}

}
