<?php
class Country extends CI_Controller{
	public function index(){
		$this->load->model('country_model');
		$data['country_list'] = $this->country_model->get_country();	
		$this->load->view('country_index', $data);
	}
	
	public function add_form(){		
		$this->load->view('country_add_form');
	}
	
	public function add_new(){		
		//set rules for form fields
		//the name of the input field, the name to be used in error messages, and the rule		
		$this->form_validation->set_rules('name','Country name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('country_code','Country code', 'required|max_length[4]|xss_clean');
		$this->form_validation->set_rules('currency','Currency', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('currency_code','Currency code', 'required|max_length[5]|xss_clean');
		
		/*
		$rules['name'] = "required|max_length[50]";
		$rules['country_code'] = "required|max_length[4]";
		$rules['currency'] = "required|max_length[50]";
		$rules['currency_code'] = "required|max_length[5]";
		
		$this->validation->set_rules($rules);
		
		$fields['']
		$fields['name'] = "Country Name";
		$fields['country_code'] = "Country code";
		$fields['currency'] = "Currency";
		$fields['currency_code'] = "Currency code";
		
		$this->validation->set_fields($fields);
		*/
		
		//show form again if not valid, else show success msg
		if($this->form_validation->run() === FALSE){
			$data = array(		
			'name'=> $this->input->post('name'),
			'country_code'=> $this->input->post('country_code'),
			'currency' => $this->input->post('currency'),
			'currency_code' => $this->input->post('currency_code')
			);
			$this->load->view('country_add_form', $data);
		}else{
			$this->load->model('country_model');
			if($this->input->post('id')){
				$this->country_model->update();
				$this->session->set_flashdata('message','Record updated successfully');
				redirect('country', 'refresh');
			}else{
				$this->country_model->add_new();								
				$this->index();
				$this->session->set_flashdata('message','Hurray!..New record Added');
				redirect('country', 'refresh');
			}
		}
	}
	
	public function edit($id){
		$this->load->model('country_model');
		if((int)$id>0){
			$query = $this->country_model->get($id);
			$data['id']['value'] = $query['id'];
			$data['name']['value'] = $query['name'];
			$data['country_code']['value'] = $query['country_code'];
			$data['currency']['value'] = $query['currency'];
			$data['currency_code']['value'] = $query['currency_code'];
		}
		$this->load->view('country_add_form', $data);
	}
	
	public function delete($id){ 
		$this->load->model('country_model');
		
		if((int)$id>0){
			$this->country_model->delete($id);
		}	
		
		$this->index();
		$this->session->set_flashdata('message','You have Deleted a record');
		redirect('country', 'refresh');
	}
}
?>