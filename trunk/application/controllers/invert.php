<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invert extends CI_Controller {

	public function index($idTipoEmpresa = 0, $idIndicador = 0){
		$data['tasas'] = $this->datamanager_model->getTasas($idIndicador);
		$data['indicadores'] = $this->datamanager_model->getIndicadores($idTipoEmpresa);
		$data['tipo_empresa'] = $this->datamanager_model->getTipoEmpresa($idTipoEmpresa);
		$data['idIndicador'] = $idIndicador;
		$this->load->view("invert", $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */