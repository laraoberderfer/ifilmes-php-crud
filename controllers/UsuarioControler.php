<?php 
require_once("models/Usuario.class.php");

/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

class UsuarioControler{
    private $email;
    private $senha;


    function __construct($em, $sen){
        $this->email = $em;
        $this->senha = $sen;
    }

    public function validaAcesso(){
        $user = new Usuario($this->email, $this->senha);
        $user->acessa();
    }
}
?>