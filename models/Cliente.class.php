<?php
include_once("Conexao.php");
include_once("Filme.class.php");
class Cliente{
    private $con;
    private $nome = "";
    private $cpf = "";
    private $telefone = "";
    private $endereco = "";
    private $email = "";
    private $action = "";
    private $legenda = "";

    function __construct(){

        $this->con = new Conexao();
        $this->retornaFilmes();
    }

    private function retornaFilmes(){
        //acesso ao banco e tabelas do sistema
        if(!isset($_REQUEST['codigo'])){
            $this->action    = "ViewCliente.php?incluir=1";
            $this->legenda   = "Incluir Cliente";
            $this->nome      = "";
            $this->cpf       = "";
            $this->telefone  = "";
            $this->endereco  = "";
            $this->email     = "";
        } else {     
            $this->action = "ViewCliente.php?codigoAlt=".$_REQUEST['codigo'];
            $this->legenda = "Alterar";
            $query = "SELECT * FROM cliente WHERE codigo = ".$_REQUEST['codigo'];
            $con = (new Conexao())->get_conexao(); 
            $result = $con->query($query);
            $linha = $result->fetch(PDO::FETCH_OBJ);
            $this->nome      = $linha->nome;
            $this->endereco  = $linha->endereco;
            $this->email     = $linha->email;
            $this->cpf       = $linha->cpf;  
            $this->telefone  = $linha->telefone;  
        }
    }

    public function listaClientes(){
        $resultado = $this->con->get_conexao()->prepare("SELECT * FROM cliente");
        $resultado->execute();
        while($linha = $resultado->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> <td scope="row">'.$linha->nome.'</td> <td scope="row">'.$linha->cpf.'</td> <td scope="row">'.$linha->telefone.'</td> <td scope="row">'.$linha->endereco.'</td> <td scope="row">'.$linha->email.'</td><td><a class="btn btn-warning" href="clientes.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-danger" href="ViewCliente.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }

    function excluirCliente($codigo){
        //$codigo	= $_REQUEST['codigo'];	
        $con = (new Conexao())->get_conexao();
        //query
        $query = "DELETE FROM cliente WHERE codigo=".$codigo;
        $con->query($query);
        header('Location:clientes.php');		
    }

    public function alterarCliente($dados){
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("UPDATE cliente SET nome=?, cpf=?,telefone=?,endereco=?,email=? where codigo=?");
        $resultado->bindParam(1, $dados[0]);
        $resultado->bindParam(2, $dados[1]);
        $resultado->bindParam(3, $dados[2]);
        $resultado->bindParam(4, $dados[3]);
        $resultado->bindParam(5, $dados[4]);
        $resultado->bindParam(6, $dados[5]);
        try {
            $resultado->execute();
            header('Location:clientes.php');
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }
    }

    public function incluirCliente($dados){
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("INSERT INTO cliente(nome, cpf, telefone,endereco, email) VALUES(?,?,?,?,?)");
        $resultado->bindParam(1, $dados[0]);
        $resultado->bindParam(2, $dados[1]);
        $resultado->bindParam(3, $dados[2]);
        $resultado->bindParam(4, $dados[3]);
        $resultado->bindParam(5, $dados[4]);

        try {
            $resultado->execute();
            header('Location:clientes.php');
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }
    }

    public function getLegenda(){
        return $this->legenda;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getAction(){
        return $this->action;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function getcpf(){
        return $this->cpf;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTelefone(){
        return $this->telefone;
    }
}
?>