<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stocks extends CI_Controller {

	public function index($idEmpresa = 0, $idIndicador = 0){
		$data['tasas'] = $this->datamanager_model->getTasasHistorico($idEmpresa, $idIndicador);
		$data['empresa'] = $this->datamanager_model->getEmpresaName($idEmpresa);
		$data['indicador'] = $this->datamanager_model->getIndicadorName($idIndicador);
		$data['titulo'] = $data['indicador'] . ' - ' . $data['empresa'];
		$this->load->view("stocks", $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */