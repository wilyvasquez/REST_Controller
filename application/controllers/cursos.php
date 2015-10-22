<?php if ( ! defined('BASEPATH')) exit('no se permite acceso directo al scrip');

require APPPATH . '/libraries/REST_Controller.php';

class Cursos extends REST_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('codigomodelo');
	}
///////////////////////////////////////////////////////////
	function index_get(){
		$data['var'] = $this->get('id');
		if(!$data['var']){
			$data['cursos'] = $this->codigomodelo->obtenerCursos();		
		}
		else{
			$data['cursos'] = $this->codigomodelo->obtenerCurso($data['var']);
		}
			 header('Content-Type: application/json');
        	echo json_encode($data['cursos']);
	}
////////////////////////////////////////////////////////////////////
	function index_post(){
		 $data = array(
            'nombre' => $this ->input->post('nombre') ,
            'obs' => $this ->input->post('obs') 
        );
        $exito = $this->codigomodelo->crearCurso($data);
        header('Content-Type: application/json');
        if(!$exito){             
            echo json_encode(array('mensaje'=> "Insertado"));
        }else{
            echo json_encode(array('mensaje'=> "error"));
        } 
	}
///////////////////////////////////////////////////////////////
	function index_put(){
		$id= $this->put('id');
		$nombreCurso= $this->put('nombre');
		$videosCurso= $this->put('obs');
		$data =array(
			'nombrecurso'=> $nombreCurso,
			'videoscurso'=> $videosCurso
			);
		$exito = $this->codigomodelo->actualizarCurso($id,$data);
		header('Content-Type: application/json');
        if(!$exito){             
            echo json_encode(array('mensaje'=> "Actualizado"));
        }else{
            echo json_encode(array('mensaje'=> "error"));
        } 
	}
/////////////////////////////////////////////////////////////////////////
	function borrar(){
		$id= $this->uri->segment(3);
		$this->codigomodelo->eliminarCurso($id);
	}
}
?>