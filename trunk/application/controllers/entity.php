<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entity extends CI_Controller {
	public function index($idEmpresa = 0, $idIndicador = 0){
		$data['empresa'] = $this->datamanager_model->getEmpresa($idEmpresa);
		$data['comentarios'] = $this->datamanager_model->getEvaluaciones($idEmpresa);
		$this->load->view("entity", $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */