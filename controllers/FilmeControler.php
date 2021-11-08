<?php
include_once("models/Filme.class.php");
include_once("models/Impressao.class.php");
class FilmeControler{

    private $filme;

    function __construct(){
        $this->filme = new Filme();
    }

    public function imprimeFilmes(){
        $this->filme->imprimeFilmes();
    }

    public function incluiFilme($dados){
        $this->filme->incluirFilme($dados);
    }

    public function excluirFilme($cod){
        $this->filme->excluirFilme($cod);
    }

    public function alteraFilme($dados){
        $this->filme->alterarFilme($dados);
    }

    public function imprimeTodos(){
        $impressao = new Impressao();
        $impressao->imprimeTodos();
    }

    public function imprimeById($id){
        $impressao = new Impressao();
        $impressao->imprimeById($id);
    }

    function getLegenda(){
        return $this->filme->getLegenda();
    }

    function getTitulo(){
        return $this->filme->getTitulo();
    }

    function getAction(){
        return $this->filme->getAction();
    }

    function getSinopse(){
        return $this->filme->getSinopse();
    }

    function getQuantidade(){
        return $this->filme->getQuantidade();
    }

    function getTrailer(){
        return $this->filme->getTrailer();
    }
}
?>