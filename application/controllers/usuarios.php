<?php

class Usuarios extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/usuarios/manage/';
        $config['total_rows'] = $this->codegen_model->count('usuarios');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->codegen_model->get('usuarios','id,nombreCompletoUsuario,nombreUsuario,claveUsuario,nivelUsuario,fechaRegistro,estado','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('usuarios_list', $this->data); 
       //$this->template->load('content', 'usuarios_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('usuarios') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombreCompletoUsuario' => set_value('nombreCompletoUsuario'),
					'nombreUsuario' => set_value('nombreUsuario'),
					'claveUsuario' => set_value('claveUsuario'),
					'nivelUsuario' => set_value('nivelUsuario'),
					'fechaRegistro' => set_value('fechaRegistro'),
					'estado' => set_value('estado')
            );
           
			if ($this->codegen_model->add('usuarios',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/usuarios/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('usuarios_add', $this->data);   
        //$this->template->load('content', 'usuarios_add', $this->data);
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('usuarios') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombreCompletoUsuario' => $this->input->post('nombreCompletoUsuario'),
					'nombreUsuario' => $this->input->post('nombreUsuario'),
					'claveUsuario' => $this->input->post('claveUsuario'),
					'nivelUsuario' => $this->input->post('nivelUsuario'),
					'fechaRegistro' => $this->input->post('fechaRegistro'),
					'estado' => $this->input->post('estado')
            );
           
			if ($this->codegen_model->edit('usuarios',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/usuarios/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('usuarios','id,nombreCompletoUsuario,nombreUsuario,claveUsuario,nivelUsuario,fechaRegistro,estado','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('usuarios_edit', $this->data);		
        //$this->template->load('content', 'usuarios_edit', $this->data);
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('usuarios','id',$ID);             
            redirect(base_url().'index.php/usuarios/manage/');
    }
}

/* End of file usuarios.php */
/* Location: ./system/application/controllers/usuarios.php */