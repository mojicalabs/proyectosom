<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gettasas extends CI_Controller {

	public function index($idIndicador = 1){
		$this->loadtasas($idIndicador);
	}
	
	public function loadtasas($idIndicador = 1){
		$data['tasas'] = $this->datamanager_model->getTasas($idIndicador);
		$this->load->view("displaytasas", $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */