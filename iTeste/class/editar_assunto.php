<?
class DAO { 

	public $banco; 
	
	
	public function setBancoDados(BancodeDados $banco) { 
		$this->banco = $banco;
			
	}

	public function getBancoDados() { 
		return $this->banco;
	}
}
?>