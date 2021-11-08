<?php
include_once("models/Cliente.class.php");
include_once("models/Impressao.class.php");
class ClienteControler{

    private $cliente;

    function __construct(){
        $this->cliente = new Cliente();
    }

    public function getClientes(){
        $this->cliente->listaClientes();
    }
    
    public function incluirCliente($dados){
        $this->cliente->incluirCliente($dados);
    }

    public function excluirCliente($cod){
        $this->cliente->excluirCliente($cod);
    }

    public function alterarCliente($dados){
        $this->cliente->alterarCliente($dados);
    }

    function getLegenda(){
        return $this->cliente->getLegenda();
    }

    function getNome(){
        return $this->cliente->getNome();
    }

    function getAction(){
        return $this->cliente->getAction();
    }

    function getEndereco(){
        return $this->cliente->getEndereco();
    }

    function getcpf(){
        return $this->cliente->getcpf();
    }

    function getEmail(){
        return $this->cliente->getEmail();
    }

    function getTelefone(){
        return $this->cliente->getTelefone();
    }

    public function imprimeTodos(){
        $impressao = new Impressao();
        $impressao->imprimeTodos();
    }
    
}
?>