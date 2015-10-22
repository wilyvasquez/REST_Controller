<?php if ( ! defined('BASEPATH')) exit('no se permite acceso directo al scrip');

/**
* 
*/
class Codigomodelo extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function crearCurso($data){
		$this->db->insert('cursos',array(
			'nombrecurso'=>$data['nombre'],
			'videoscurso'=>$data['obs'])
		);
	}

	function obtenerCursos(){
		$query = $this->db->get('cursos');
		if($query->num_rows()>0) return $query->result_array();
		else  echo "error1"; return false;
	}

	function obtenerCurso($id){
		$this->db->where('idcurso',$id);
		$query = $this->db->get('cursos');
		if($query->num_rows() > 0) return $query->result_array();
		else  echo "error"; return false;
	}

	function actualizarCurso($id,$data){
		$this->db->where('idcurso',$id);
		$query = $this->db->update('cursos',$data);
	}

	function eliminarCurso($id){
		$this->db->delete('cursos',array('idcurso'=>$id));
	}
}

?>