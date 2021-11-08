<?php
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/ClienteControler.php");
include_once("models/Cliente.class.php");
include_once("models/Impressao.class.php");
$cliente = new ClienteControler();


if(isset($_REQUEST['codigo'])){
    $codigo	= $_REQUEST['codigo'];
    $cliente->excluirCliente($codigo);
}

if(isset($_REQUEST['codigoAlt'])){
    $dados[] = $_REQUEST['nome'];
    $dados[] = $_REQUEST['cpf'];
    $dados[] = $_REQUEST['telefone'];
    $dados[] = $_REQUEST['endereco'];
    $dados[] = $_REQUEST['email'];
    $dados[] = $_REQUEST['codigoAlt'];

    $cliente->alterarCliente($dados);
}

if(isset($_REQUEST['incluir'])){
    $dados[] = $_REQUEST['nome'];
    $dados[] = $_REQUEST['cpf'];
    $dados[] = $_REQUEST['telefone'];
    $dados[] = $_REQUEST['endereco'];
    $dados[] = $_REQUEST['email'];
    $dados[] = $_REQUEST['codigoAlt'];

    $cliente->incluirCliente($dados);
}

if(isset($_REQUEST['opcao'])){
    if($_REQUEST['opcao']==1){
        $impressao = new Impressao();
        $impressao->imprimeTodosClientes();
    }
}
?>