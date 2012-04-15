<?php
class Country_model extends CI_Model{

	public function get_country(){
		$this->db->order_by("id", "desc");
		$query = $this->db->get('country');
		return $query->result();
	}
	
	public function add_new(){
				
		$data = array(		
		'name'=> $this->input->post('name'),
		'country_code'=> $this->input->post('country_code'),
		'currency' => $this->input->post('currency'),
		'currency_code' => $this->input->post('currency_code')
		);
		
		return $this->db->insert('country', $data);
	}
	
	public function get($id){
		$query = $this->db->get_where('country',array('id' => $id));
		return $query->row_array();
	}
		
	public function update(){
		$data = array(		
		'name'=> $this->input->post('name'),
		'country_code'=> $this->input->post('country_code'),
		'currency' => $this->input->post('currency'),
		'currency_code' => $this->input->post('currency_code')
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('country',$data);
	}
	
	public function delete($id){ 
		$this->db->delete('country', array('id' => $id)); 
	}
	
}
?>