<?php 
	
class Usuario {

	private $id			       	= "";
	private $id_2			    = "";
	private $tipo               = "";
	private $nome	          	= "";
	private $sobrenome			= "";
	private $email				= "";
	private $login				= "";
	private $senha				= "";
	private $sexo			    = "";
	private $dataDia			= "";
	private $dataGeral			= "";
	private $dataMes		    = "";
	private $dataAno			= "";
	private $rua			    = "";
	private $numero				= "";
	private $estado				= "";
	private $cidade				= "";
	private $cep			    = "";
	private $bairro		  	    = "";
    private $complemento		= "";
    private $telefone			= "";
    
    
	public $tmpId			    = "";
	public $tmpId2				= "";
	public $tmpTipo            	= "";
	public $tmpNome	        	= "";
	public $tmpSobrenome		= "";
	public $tmpEmail			= "";
	public $tmpLogin			= "";
	public $tmpSenha			= "";
	public $tmpSexo				= "";
	public $tmpDataGeral		= "";
	public $tmpDataDia			= "";
	public $tmpDataMes			= "";
	public $tmpDataAno			= "";
	public $tmpRua			    = "";
	public $tmpNumero			= "";
	public $tmpEstado			= "";
	public $tmpCidade			= "";
	public $tmpCep			    = "";
	public $tmpBairro		  	= "";
    public $tmpComplemento		= "";
    public $tmpTelefone			= "";
	

	function getId(){
		return $this->id;
	}

	function setId($id){
		$this->id = $id;
	}
	function getId2(){
		return $this->id_2;
	}

	function setId2($id2){
		$this->id_2 = $id2;
	}
    function getTipo(){
		return $this->tipo;
	}

	function setTipo($tipo){
		$this->tipo = $tipo;
	}

	function getNome(){
		return $this->nome;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	
	function getSobreNome(){
		return $this->sobrenome;
	}

	function setSobreNome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

 	function getEmail(){
		return $this->email;
	}

	function setEmail($email){
		$this->email = $email;
	}
	
	function getLogin(){
		return $this->login;
	}

	function setLogin($login){
		$this->login = $login;
	}
	
	function getSenha(){
		return $this->senha;
	}

	function setSenha($senha){
		$this->senha = $senha;
	}
	
	function getSexo(){
		return $this->sexo;
	}

	function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
	function getDataGeral(){
		return $this->dataGeral;
	}

	function setDataGeral($data){
		$this->dataGeral = $data;
	}
	
	function getData_dia(){
		return $this->dataDia;
	}

	function setData_dia($data_dia){
		$this->dataDia = $data_dia;
	}
	
	function getData_mes(){
		return $this->dataMes;
	}

	function setData_mes($data_mes){
		$this->dataMes = $data_mes;
	}
	
		function getData_ano(){
		return $this->dataAno;
	}

	function setData_ano($data_ano){
		$this->dataAno = $data_ano;
	}
	
	function getRua(){
		return $this->rua;
	}

	function setRua($rua){
		$this->rua = $rua;
	}

	function getNumero(){
		return $this->numero;
	}

	function setNumero($numero){
		$this->numero = $numero;
	}

	function getEstado(){
		return $this->estado;
	}

	function setEstado($estado){
		$this->estado = $estado;
	}
	
	function getCidade(){
		return $this->cidade;
	}
	function setCidade($cidade){
		$this->cidade = $cidade;
	}
	
	function getCep(){
		return $this->cep;
	}
	function setCep($cep){
		$this->cep = $cep;
	}
	
	function getBairro(){
		return $this->bairro;
	}
	function setBairro($bairro){
		$this->bairro = $bairro;
	}
	
	function getComplemento(){
		return $this->complemento;
	}

	function setComplemento($complemento){
		$this->complemento = $complemento;
	}

	function getTelefone(){
		return $this->telefone;
	}
	function setTelefone($telefone){
		$this->telefone = $telefone;
	}
	
	
	}

?>


