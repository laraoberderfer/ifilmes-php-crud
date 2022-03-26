<?php 
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/UsuarioControler.php");
include_once("controllers/LivrosControler.php");

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
    $livros = new LivrosControler();
    $codigo	= $_REQUEST['codigo'];
    $livros->excluirLivros($codigo);
}

if(isset($_REQUEST['codigoAlt'])){
    $dados[] = $_REQUEST['nome'];
    $dados[] = $_REQUEST['paginas'];
    $dados[] = $_REQUEST['autor'];
    $dados[] = $_REQUEST['genero'];
    $dados[] = $_REQUEST['datadepublicacao'];
   

    $livros = new LivrosControler();
    $livros->alteraLivros($dados);
}

if(isset($_REQUEST['incluir'])){
    $dados[] = $_REQUEST['nome'];
    $dados[] = $_REQUEST['paginas'];
    $dados[] = $_REQUEST['autor'];
    $dados[] = $_REQUEST['genero'];
    $dados[] = $_REQUEST['datadepublicacao'];

    $livros = new LivrosControler();
    $livros->incluirLivros($dados);
}

if(isset($_REQUEST['opcao'])){
    $livros = new LivrosControler();
    if($_REQUEST['opcao']==1){
        $livros->imprimeTodos();
    } else if($_REQUEST['opcao']==2){
        $livros->imprimeById($_REQUEST['codigoImp']);
    }
}
?>