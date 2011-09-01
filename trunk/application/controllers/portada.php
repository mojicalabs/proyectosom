<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portada extends CI_Controller {

	public function index($idIndicador = 1){
		$data['tasas'] = $this->datamanager_model->getTasas($idIndicador);
		$data['tipos_empresas'] = $this->datamanager_model->getTiposEmpresas($idIndicador);
		//$data['tipos_indicadores'] = $this->datamanager_model->getTiposIndicadores($idIndicador);
		$this->load->view("portada", $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */