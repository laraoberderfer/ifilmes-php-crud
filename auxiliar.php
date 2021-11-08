<?php 
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/UsuarioControler.php");
include_once("controllers/FilmeControler.php");

$senha = "";
$email = "";

if(isset($_GET['login'])){
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];
    
    $user = new UsuarioControler($email, $senha);
    $user->validaAcesso();
} else if(isset($_GET['sair'])){
    if($_REQUEST['sair']==1){
        //finalizar sessão
        session_destroy();
        //Redireciona para a página de autenticação
        header('location:index.php');
    } else {
        header('location:sessao.php');
    }
}

if(isset($_REQUEST['codigo'])){
    $filme = new FilmeControler();
    $codigo	= $_REQUEST['codigo'];
    $filme->excluirFilme($codigo);
}

if(isset($_REQUEST['codigoAlt'])){
    $dados[] = $_REQUEST['titulofilme'];
    $dados[] = $_REQUEST['sinopse'];
    $dados[] = $_REQUEST['quantidade'];
    $dados[] = $_REQUEST['trailer'];
    $dados[] = $_REQUEST['codigoAlt'];

    $filme = new FilmeControler();
    $filme->alteraFilme($dados);
}

if(isset($_REQUEST['incluir'])){
    $dados[] = $_REQUEST['titulofilme'];
    $dados[] = $_REQUEST['sinopse'];
    $dados[] = $_REQUEST['quantidade'];
    $dados[] = $_REQUEST['trailer'];

    $filme = new FilmeControler();
    $filme->incluiFilme($dados);
}

if(isset($_REQUEST['opcao'])){
    $filme = new FilmeControler();
    if($_REQUEST['opcao']==1){
        $filme->imprimeTodos();
    } else if($_REQUEST['opcao']==2){
        $filme->imprimeById($_REQUEST['codigoImp']);
    }
}
?>