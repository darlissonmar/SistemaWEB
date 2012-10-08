<?

class Area {

	private $id					= "";
	private $nome				= "";
	private $userId				= "";
	private $data				= "";
	
	public  $tmpId				= "";
	public  $tmpNome			= "";
	public  $tmpUsuario			= "";
	public  $tmpData			= "";
	
function Area(){
		}

	function getId(){
		return $this->id;
	}

	function setId($id){
		$this->id = $id;
	}

	function getUsuario(){
		return $this->userId;
	}

	function setUsuario($usuario){
		$this->userId = $usuario;
	}

	function getNome(){
		return $this->nome;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setData($data){
		$this->data = $data;
	}
	
	function getData(){
		return $this->data;
	}
}
?>