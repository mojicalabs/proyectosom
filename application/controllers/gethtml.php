<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gethtml extends CI_Controller {

	public function index($param){
		$this->loadtasas($param);
	}
	
	public function loadtasas($param){
		// Set your return content type
		//header('Content-type: application/xml');
		
		$daurl = $this->input->post('url');
		
		echo(" ");  //ESTE ESPACIO ES PARA CAMBIAR A TEXTO LOS TIPOS DE ARCHIVOS XML
		
		// Get that website's content
		$handle = fopen($daurl, "r");
		
		// If there is something, read and return
		if ($handle) {
			while (!feof($handle)) {
				$buffer = fgets($handle, 4096);
				echo $buffer;
			}
			fclose($handle);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */