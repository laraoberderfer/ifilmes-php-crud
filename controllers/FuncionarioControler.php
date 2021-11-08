<?php
include_once("models/Funcionario.class.php");
include_once("models/Impressao.class.php");
class FuncionarioControler{

    private $funcionario;

    function __construct(){
        $this->funcionario = new Funcionario();
    }

    public function getFuncionarios(){
        $this->funcionario->listafuncionarios();
    }
    
    public function incluirFuncionario($dados){
        $this->funcionario->incluirfuncionario($dados);
    }

    public function excluirFuncionario($cod){
        $this->funcionario->excluirfuncionario($cod);
    }

    public function alterarFuncionario($dados){
        $this->funcionario->alterarfuncionario($dados);
    }

    public function imprimeTodos(){
        $impressao = new Impressao();
        $impressao->imprimeTodos();
    }

    function getLegenda(){
        return $this->funcionario->getLegenda();
    }

    function getNome(){
        return $this->funcionario->getNome();
    }

    function getAction(){
        return $this->funcionario->getAction();
    }

    function getEmail(){
        return $this->funcionario->getEmail();
    }

    public function getSenha(){
        return $this->funcionario->getSenha();
    }

    public function getEstado(){
        return $this->funcionario->getEstado();
    }

    public function getSalario(){
        return $this->funcionario->getSalario();
    }
    
}
?>