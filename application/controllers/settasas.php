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
		$idProceso = 0;
		
		foreach($data['indicadores'] as $key => $value){
			$counter = $counter + 1;
			$id = null;
			$record = array(
					'idProceso' => $data['idProceso'],
					'idEmpresa' => $data['id'],
					'idIndicador' => $counter,
					'valorIndicador' => $value
				);

			$id = $this->datamanager_model->save($record);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */