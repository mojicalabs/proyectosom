<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Showtasas extends CI_Controller {

	public function index($param){
		
		$data['empresas'] = array();
		$counter = 0;
		$empresas = $this->datamanager_model->getEmpresas(1);
		foreach ($empresas as $empresa):
			$counter++;
			$emp = new stdClass();
			$emp->id = $empresa->id;
			$emp->key = $empresa->keyEmpresa;
			$emp->url = $empresa->urlDataEmpresa;
			$emp->location = $empresa->selectorJQueryEmpresa;
			$emp->name = $empresa->nombreEmpresa;
			$data['empresas'][$empresa->keyEmpresa] = $emp;
		endforeach;
		
		if ($param == 'back'){
			$this->load->view("showtasasback", $data);
		} else {
			$this->load->view("showtasasfront", $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */