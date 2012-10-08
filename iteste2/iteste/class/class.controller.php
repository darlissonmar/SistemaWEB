<?
require_once("class.questao.php");
require_once("class.questao.DAO.php");
require_once("class.usuario.php");
require_once("class.usuario.DAO.php");
require_once("class.area.php");
require_once("class.area.DAO.php");
require_once("class.assunto.php");
require_once("class.assunto.DAO.php");
require_once("class.disciplina.php");
require_once("class.disciplina.DAO.php");

class Controller{

	public $banco; 
		
	public function Controller(BancodeDados $banco) { 
		$this->banco = $banco; 
		ini_set('default_charset','UTF-8');				
		ini_set("display_errors",0);	
	}

//========================= AREA ========================================
	function gravarArea(Area $area){

		if (strlen($area->getNome()) == 0){
			throw new Exception('Informe o nome da área!');
		}else{
			$area->tmpNome = "'".$area->getNome()."'";
		}
		
		if (strlen($area->getUsuario()) == 0){
			throw new Exception('Informe o usuário que está cadastrando a área!');
		}else{
			$area->tmpUsuario = "'".$area->getUsuario()."'";
		}

		$areaDAO = new AreaDAO(); 
		$areaDAO->setBancoDados($this->banco); 
		$areaDAO->gravaDadosArea($area); 
	}

	public function recuperarArea($id_area){
		if (strlen($id_area)>0){
			$areaDAO = new AreaDAO();
			$areaDAO->setBancoDados($this->banco); 
			return $areaDAO->recuperarArea($id_area); 
		}else{
			return null;
		}
	}
	
	public function recuperarAreaDisciplina($id_disciplina){
		if (strlen($id_disciplina)>0){
			$areaDAO = new AreaDAO();
			$areaDAO->setBancoDados($this->banco); 
			return $areaDAO->recuperarAreaDisciplina($id_disciplina); 
		}else{
			return null;
		}
	}
	
	
	public function recuperarAreaTodosDAO(){
		$areaDAO = new AreaDAO();
		$areaDAO->setBancoDados($this->banco); 
		return $areaDAO->recuperarTodos();
	}
	
	public function recuperarQtdeAreaDAO(){
		$areaDAO = new AreaDAO();
		$areaDAO->setBancoDados($this->banco); 
		return $areaDAO->recuperarQtde();
	}
	
	public function excluirArea($id_area){
		$areaDAO = new AreaDAO();
		$areaDAO->setBancoDados($this->banco); 
		$areaDAO->excluirAreaDAO($id_area);
	}

//========================= DISCIPLINA  ================================

	function gravarDisciplina(Disciplina $disciplina, $id_area){

		if (strlen($id_area) == 0){
			throw new Exception('Informe a área da disciplina!');
		}else{
			$disciplina->tmpIdArea = $id_area;
		}
		
		if (strlen($disciplina->getUsuario()) == 0){
			throw new Exception('Informe o usuário que está cadastrando a disciplina!');
		}else{
			$disciplina->tmpUsuario = "'".$disciplina->getUsuario()."'";
		}
				
		if (strlen($disciplina->getNome())== 0){
			throw new Exception('Informe o nome da disciplina!');
		}else{
			$disciplina->tmpNome = "'".$disciplina->getNome()."'";
		}

		$disciplinaDAO = new DisciplinaDAO(); 
		$disciplinaDAO->setBancoDados($this->banco); 
		$disciplinaDAO->gravaDadosDisciplina($disciplina); 
		
	}


	public function recuperarDisciplina($id_disciplina){
		if ($id_disciplina > 0){
			$disciplinaDAO = new DisciplinaDAO();
			$disciplinaDAO->setBancoDados($this->banco); 
			return $disciplinaDAO->recuperarDisciplina($id_disciplina); 
		}else{
			return null;
		}
	}

	public function recuperarDisciplinaTodosDAO(){
		$disciplinaDAO = new DisciplinaDAO();
		$disciplinaDAO->setBancoDados($this->banco); 
		return $disciplinaDAO->recuperarTodos();
	}

	public function recuperarDisciplinaAssunto($id_assunto){
		if (strlen($id_assunto)>0){
			$disciplina = new DisciplinaDAO();
			$disciplina->setBancoDados($this->banco); 
			return $disciplina->recuperarDisciplinaAssunto($id_assunto); 
		}else{
			return null;
		}
	}

	public function recuperarQtdeDisciplinaTodosDAO(){
		$disciplinaDAO = new DisciplinaDAO();
		$disciplinaDAO->setBancoDados($this->banco); 
		return $disciplinaDAO->recuperarQtde();
	}

	public function excluirDisciplina($id_disciplina){
		$disciplinaDAO = new DisciplinaDAO();
		$disciplinaDAO->setBancoDados($this->banco); 
		$disciplinaDAO->excluirDisciplinaDAO($id_disciplina);
	}
	
//======================== ASSUNTO ===========================


	function gravarAssunto(Assunto $assunto, $id_disciplina){

		if ($id_disciplina == 0){
			throw new Exception('Informe a disciplina do Assunto!');
		}else{
			$assunto->tmpIdDisciplina = $id_disciplina;
		}
				
		if (strlen($assunto->getNome())== 0){
			throw new Exception('Informe o nome do assunto!');
		}else{
			$assunto->tmpNome = "'".$assunto->getNome()."'";
		}
		
	if (strlen($assunto->getUsuario()) == 0){
			throw new Exception('Informe o usuário que está cadastrando o assunto!');
		}else{
			$assunto->tmpUsuario = "'".$assunto->getUsuario()."'";
		}

		$assuntoDAO = new AssuntoDAO(); 
		$assuntoDAO->setBancoDados($this->banco); 
		$assuntoDAO->gravaDadosAssunto($assunto); 
		
	}


	public function recuperarAssunto($id_assunto){
		if ($id_assunto > 0){
			$assuntoDAO = new AssuntoDAO();
			$assuntoDAO->setBancoDados($this->banco); 
			return $assuntoDAO->recuperarAssunto($id_assunto); 
		}else{
			return null;
		}
	}

	public function recuperarAssuntoTodosDAO(){
		$assuntoDAO = new AssuntoDAO();
		$assuntoDAO->setBancoDados($this->banco); 
		return $assuntoDAO->recuperarTodos();
	}

	public function recuperarQtdeAssuntoTodosDAO(){
		$assuntoDAO = new AssuntoDAO();
		$assuntoDAO->setBancoDados($this->banco); 
		return $assuntoDAO->recuperarQtde();
	}

	public function excluirAssunto($id_assunto){
		$assuntoDAO = new AssuntoDAO();
		$assuntoDAO->setBancoDados($this->banco); 
		$assuntoDAO->excluirAssuntoDAO($id_assunto);
	}
	
//========================= USUARIO  ================================

	function gravarUsuario(Usuario $usuario){
		
		if (strlen($usuario->getId2())== 0){
			throw new Exception('Informe o usuário que está cadastrando!');
		}else{
			$usuario->tmpId2= "'".$usuario->getId2()."'";
		}
		if (strlen($usuario->getTipo())== 0){
			throw new Exception('Informe o tipo do usuário!');
		}else{
			$usuario->tmpTipo= "'".$usuario->getTipo()."'";
		}
		
		if (strlen($usuario->getLogin())== 0){
			throw new Exception('Informe o login do usuário!');
		}else{
			$usuario->tmpLogin = "'".$usuario->getLogin()."'";
		}
		
		if (strlen($usuario->getNome())== 0){
			throw new Exception('Informe o nome do usuário!');
		}else{
			$usuario->tmpNome = "'".$usuario->getNome()."'";
		}
		
		if (strlen($usuario->getSobreNome())== 0){
			throw new Exception('Informe o sobrenome do usuário!');
		}else{
			$usuario->tmpSobrenome= "'".$usuario->getSobreNome()."'";
		}

		if (strlen($usuario->getEmail())==0 ||
		 (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
		  $usuario->getEmail()))){
		 		throw new Exception('Informe um email válido para o usuário!');
		}else{
			$usuario->tmpEmail = "'".$usuario->getEmail()."'";
		}

		if (strlen($usuario->getSenha())== 0){
			throw new Exception('Informe a senha do usuário!');
		}else{
			$usuario->tmpSenha = "'".$usuario->getSenha()."'";
		}
		
		if (strlen($usuario->getSexo())== 0){
			throw new Exception('Informe o sexo do usuário!');
		}else{
			$usuario->tmpSexo = "'".$usuario->getSexo()."'";
		}
		
		if (strlen($usuario->getRua())==0){
			throw new Exception('Informe a rua do endereço do usuário!');
		}else{
			$usuario->tmpRua = "'".$usuario->getRua()."'";
		}

		if (strlen($usuario->getNumero())==0){
			throw new Exception('Informe o número do endereço do usuário!');
		}else{
			$usuario->tmpNumero = "'".$usuario->getNumero()."'";
		}

		if (strlen($usuario->getComplemento())==0){
			$usuario->tmpComplemento = " NULL ";
		}else{
			$usuario->tmpComplemento = "'".$usuario->getComplemento()."'";
		}

		if (strlen($usuario->getBairro())==0){
			throw new Exception('Informe o bairro do endereço do usuário!');
		}else{
			$usuario->tmpBairro = "'".$usuario->getBairro()."'";
		}

		if (strlen($usuario->getCidade())==0){
			throw new Exception('Informe a cidade do usuário!');
		}else{
			$usuario->tmpCidade = "'".$usuario->getCidade()."'";
		}

		if (strlen($usuario->getEstado())==0){
			throw new Exception('Informe o estado do usuário!');
		}else{
			$usuario->tmpEstado = "'".$usuario->getEstado()."'";
		}

		if (strlen($usuario->getCep())==0 ||
		!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $usuario->getCep())
		){
			throw new Exception('Informe um cep válido para o usuário!');
		}else{
			$usuario->tmpCep = "'".$usuario->getCep()."'";
		}

		if (strlen($usuario->getTelefone())==0){
			$usuario->tmpTelefone = " NULL ";
		}else{
			$usuario->tmpTelefone = "'".$usuario->getTelefone()."'";
		}
		// data
		if (strlen($usuario->getDataGeral())==0){
			throw new Exception('Informe a data de nascimento do usuário!');
		}else{
			$usuario->tmpDataGeral = "'".$usuario->getDataGeral()."'";
		}
		
		$usuarioDAO = new UsuarioDAO(); 
		$usuarioDAO->setBancoDados($this->banco); 
		$usuarioDAO->gravaDadosusuario($usuario); 
	}

	function gravarNovaSenhaUsuario(Usuario $usuario, $senha_atual, $nova_senha){

		if (strlen($nova_senha)== 0) {
			throw new Exception('Digite a senha.');
		}

		if (strlen($nova_senha) < 4 ) {
			throw new Exception('A senha deve ter no mínimo 4 caracteres.');
		}

		if ($usuario->getSenha() <> $senha_atual) {
			throw new Exception('Senha atual não confere!');
		}

		$usuario->setSenha($nova_senha);
		$usuario->tmpSenha = "'".$usuario->getSenha()."'";

		$usuarioDAO = new UsuarioDAO(); 
		$usuarioDAO->setBancoDados($this->banco); 
		$usuarioDAO->gravarNovaSenhaUsuario($usuario); 
	}

	public function recuperarUsuario($usuario_login){//nome de usuario
		if (strlen($usuario_login)>0){
			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO->setBancoDados($this->banco); 
			return $usuarioDAO->recuperarUsuario($usuario_login); 
		}else{
			return null;
		}
	}
	
	public function recuperarUsuarioNome($usuario_nome){//nome de usuario
		if (strlen($usuario_nome)>0){
			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO->setBancoDados($this->banco); 
			return $usuarioDAO->recuperarUsuarioNome($usuario_nome); 
		}else{
			return null;
		}
	}
	
	
	
	

	public function recuperarTodosUsuario(){
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->setBancoDados($this->banco); 
		return $usuarioDAO->recuperarTodos();
	}

	public function recuperarQtdeUsuarioDAO(){
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->setBancoDados($this->banco); 
		return $usuarioDAO->recuperarQtde();
	}
	
	public function recuperarQtdeTipoUsuarioDAO($tipo){
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->setBancoDados($this->banco); 
		return $usuarioDAO->recuperarQtdeTipo($tipo);
	}
	
	public function excluirUsuario($id_usuario){
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->setBancoDados($this->banco); 
		$usuarioDAO->excluirUsuarioDAO($id_usuario);
	}
	
	
//========================= QUESTAO ================================

	function gravarQuestao(Questao $questao){
		
		if (strlen($questao->getIdUsuario()== 0)){
			throw new Exception('Informe o usuario que está cadastrando a questão!');
		}else{
			$questao->tmpIdUsuario = $questao->getIdUsuario();
		}
		
		if (strlen($questao->getEnunciado())==0){
			throw new Exception('Informe o enunciado da questão!');
		}else{
			$questao->tmpEnunciado = "'".$questao->getEnunciado()."'";
		}
	
		if (strlen($questao->getDificuldade())== 0){
			throw new Exception('Selecione a dificuldade da questão!');
		}else{
			$questao->tmpDificuldade = $questao->getDificuldade();
		}
		
		if (strlen($questao->getIdArea())== 0){
			throw new Exception('Selecione a área da questão!');
		}else{
			$questao->tmpIdArea = $questao->getIdArea();
		}
		
		if (strlen($questao->getIdDisciplina())== 0){
			throw new Exception('Selecione a discliplina da questão!');
		}else{
			$questao->tmpIdDisciplina = $questao->getIdDisciplina();
		}
		
		if (strlen($questao->getIdAssunto())== 0){
			throw new Exception('Selecione o assunto da questão!');
		}else{
			$questao->tmpIdAssunto = $questao->getIdAssunto();
		}
		
		if (strlen($questao->getOpCorreta())== 0){
			throw new Exception('Selecione a opção correta da questão!');
		}else{
			$questao->tmpOpcaocorreta = $questao->getOpCorreta();
		}
		
		if (strlen($questao->getOp1())== 0 
			|| strlen($questao->getOp2())== 0
			|| strlen($questao->getOp3())== 0
			|| strlen($questao->getOp4())== 0
			|| strlen($questao->getOp5())== 0 
			){
			throw new Exception(' Informe todas as alternativas da questão!');
		}else{
			
			$questao->tmpOpcao1 = "'".$questao->getOp1()."'";
			$questao->tmpOpcao2 = "'".$questao->getOp2()."'";
			$questao->tmpOpcao3 = "'".$questao->getOp3()."'";
			$questao->tmpOpcao4 = "'".$questao->getOp4()."'";
			$questao->tmpOpcao5 = "'".$questao->getOp5()."'";
						
		}
				
		$questaoDAO = new QuestaoDAO(); 
		$questaoDAO->setBancoDados($this->banco); 
		$questaoDAO->gravaDadosQuestao($questao); 
				
	}

	public function recuperarQuestao($id_questao){
		if ($id_questao > 0 ){
			$questaoDAO = new QuestaoDAO();
			$questaoDAO->setBancoDados($this->banco); 
			return $questaoDAO->recuperarQuestao($id_questao);
		}else{
			return null;
		}
	}

	public function recuperarQuestaoTodosDAO(){
		$questaoDAO = new QuestaoDAO();
		$questaoDAO->setBancoDados($this->banco); 
		return $questaoDAO->recuperarTodos();
	}
	
	public function recuperarQtdeQuestaoTodosDAO(){
		$questaoDAO = new QuestaoDAO();
		$questaoDAO->setBancoDados($this->banco); 
		return $questaoDAO->recuperarQtde();
	}
	
	// recuperar questao a partir de disciplina, assunto area, dificuldade, 
/*
	public function recuperarQuestaoDisciplinaTodosDAO($id_disciplina){
		$questaoDAO = new QuestaoDAO();
		$questaoDAO->setBancoDados($this->banco); 
		return $questaoDAO->recuperarTodosDisciplina($id_disciplina);
	}
*/

	public function excluirQuestao($id_questao){
		$questaoDAO = new QuestaoDAO();
		$questaoDAO->setBancoDados($this->banco); 
		$questaoDAO->excluirQuestaoDAO($id_questao);
	}

}
?>