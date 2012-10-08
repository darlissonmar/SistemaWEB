<?

class Disciplina {

	private $id				= "";
	private $nome			= "";
	private $usuario		= "";
	private $areas			= array();
	private $id_area		= "";
	private $data			= "";
	
	public  $tmpId			= "";
	public  $tmpNome		= "";
	public  $tmpUsuario		= "";
	public 	$tmpAreas 		= array();
	public  $tmpIdArea		= "";
	public  $tmpData		= "";
	
function Disciplina(){
		}

	function getId(){
		return $this->id;
	}

	function setId($id){
		$this->id = $id;
	}

	function getUsuario(){
		return $this->usuario;
	}

	function setUsuario($usuario){
		$this->usuario= $usuario;
	}

	function getNome(){
		return $this->nome;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	
	function getData(){
		return $this->data;
	}
	
	function setData($data){
		$this->data = $data;
	}
	

	function getIdArea(){
		return $this->id_area;
	}
	
	function setIdArea($id_area){
		$this->id_area = $id_area;
	}
	
	
	function addArea($area){
		array_push($this->areas,$area);
	}

	function getQtdeArea(){
		return sizeof($this->areas);
	}

	function getArea($index){
		return $this->areas[$index];
	}
}
?>