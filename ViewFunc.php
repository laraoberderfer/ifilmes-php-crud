<?php
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/FuncionarioControler.php");
include_once("models/Funcionario.class.php");
include_once("models/Impressao.class.php");
$funcionario = new funcionarioControler();


if(isset($_REQUEST['codigo'])){
    $codigo	= $_REQUEST['codigo'];
    $funcionario->excluirfuncionario($codigo);
}

if(isset($_REQUEST['codigoAlt'])){
    $dados[] = $_REQUEST['nome'];
    $dados[] = $_REQUEST['estado'];
    $dados[] = $_REQUEST['salario'];
    $dados[] = $_REQUEST['email'];
    $dados[] = $_REQUEST['senha'];
    $dados[] = $_REQUEST['codigoAlt'];

    $funcionario->alterarfuncionario($dados);
}

if(isset($_REQUEST['incluir'])){
    $dados[] = $_REQUEST['nome'];
    $dados[] = $_REQUEST['estado'];
    $dados[] = $_REQUEST['salario'];
    $dados[] = $_REQUEST['email'];
    $dados[] = $_REQUEST['senha'];
    $dados[] = $_REQUEST['codigoAlt'];

    $funcionario->incluirfuncionario($dados);
}

if(isset($_REQUEST['opcao'])){
    if($_REQUEST['opcao']==1){
        $impressao = new Impressao();
        $impressao->imprimeTodosFuncionarios();
    }
}
?>