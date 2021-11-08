<?php 
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("Conexao.php");


class Usuario{
    private $login;
    private $senha;

    function __construct($em, $sen){
        $this->login = $em;
        $this->senha = $sen;
    }

    public function acessa(){
        $con = (new Conexao())->get_conexao();

        $resultado = $con->prepare("SELECT * FROM funcionario As func WHERE email=?  AND senha=?");
        $resultado->bindParam(1, $this->login);
        $resultado->bindParam(2, $this->senha);

        if($resultado->execute()){
            if($resultado->rowCount()>0){
                // session_start inicia a sessão
                session_start();     
                //$linha = $resultado->fetch(PDO::FETCH_OBJ);
                $_SESSION['login'] = $this->login;
                $_SESSION['senha'] = $this->senha;
                header('location:adm.php');
            } else {
                session_unset();
                session_destroy();
                header('location:index.php');
            }
        }
    }
}

?>