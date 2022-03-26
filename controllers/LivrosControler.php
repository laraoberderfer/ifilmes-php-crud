<?php
include_once("models/Livros.class.php");
class LivrosControler{

    private $livros;

    function __construct(){
        $this->livros = new Livros();
    }
    public function incluirLivros($dados){
        $this->livros->incluirLivros($dados);
    }

    public function excluirLivros($cod){
        $this->livros->excluirLivros($cod);
    }

    public function alteraLivros($dados){
        $this->livros->alterarLivros($dados);
    }
    
     function getLegenda(){
        return $this->livros->getLegenda();
    }
    function getNome(){
        return $this->livros->getNome();
    }

    function getPaginas(){
        return $this->livros->getPaginas();
    }

     function getAutor(){
        return $this->livros->getAutor();
    }    

     function getGenero(){
        return $this->livros->getGenero();
    }

     function getDatadepublicacao(){
        return $this->livros->getDatadepublicacao();
    }
    
    function getAction(){
        return $this->livros->getAction();
    }
    public function imprimeLivros(){
        $this->livros->imprimeLivros();
    }
}
?>