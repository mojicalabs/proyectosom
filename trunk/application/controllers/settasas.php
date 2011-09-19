<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settasas extends CI_Controller {

	public function index(){
		$data = $this->input->post('data');
		$this->addRecord($data);
	}
	
	function addProcess(){
		$idProceso = $this->datamanager_model->saveProceso();
		echo $idProceso;
	}
	
	function addRecord($data){
		$counter = 0;
		$idProceso = $data['idProceso'];
		$idEmpresa = $data['id'];
		
		foreach($data['indicadores'] as $key => $value){
			$counter = $counter + 1;
			//$idIndicador = $counter;
			$valorIndicador = $value;
			$keySplit = explode("XXX", $key);
			$idIndicador = $keySplit[1];
			$record = array(
					'idProceso' => $idProceso,
					'idEmpresa' => $idEmpresa,
					'idIndicador' => $idIndicador,
					'valorIndicador' => $valorIndicador
				);

			if (floatval($valorIndicador) > 0){
				$this->datamanager_model->delIndicador($idEmpresa, $idIndicador);
				$this->datamanager_model->saveIndicador($record);
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */