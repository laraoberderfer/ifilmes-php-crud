<?php
include_once("Conexao.php");
//include_once("Filme.class.php");
class funcionario{
    private $con;
    private $nome;
    private $estado = "";
    private $salario = "";
    private $senha = "";
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
            $this->action    = "ViewFunc.php?incluir=1";
            $this->legenda   = "Incluir Funcionário";
            $this->nome      = "";
            $this->estado    = "";
            $this->salario   = "";
            $this->senha     = "";
            $this->email     = "";
        } else {     
            $this->action = "ViewFunc.php?codigoAlt=".$_REQUEST['codigo'];
            $this->legenda = "Alterar";
            $query = "SELECT * FROM funcionario WHERE codigo = ".$_REQUEST['codigo'];
            $con = (new Conexao())->get_conexao(); 
            $result = $con->query($query);
            $linha = $result->fetch(PDO::FETCH_OBJ);
            $this->nome      = $linha->nome;
            $this->estado  = $linha->estado;
            $this->salario     = $linha->salario;
            $this->senha       = $linha->senha;  
            $this->email  = $linha->email;  
        }
    }

    public function listafuncionarios(){
        $resultado = $this->con->get_conexao()->prepare("SELECT * FROM funcionario");
        $resultado->execute();
        while($linha = $resultado->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> <td scope="row">'.$linha->nome.'</td> <td scope="row">'.$linha->estado.'</td> <td scope="row">'.$linha->salario.'</td> <td scope="row">'.$linha->email.'</td> <td scope="row">'.$linha->senha.'</td><td><a class="btn btn-warning" href="funcionario.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-danger" href="ViewFunc.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }

    function excluirfuncionario($codigo){
        //$codigo	= $_REQUEST['codigo'];	
        $con = (new Conexao())->get_conexao();
        //query
        $query = "DELETE FROM funcionario WHERE codigo=".$codigo;
        $con->query($query);
        header('Location:funcionario.php');		
    }

    public function alterarfuncionario($dados){
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("UPDATE funcionario SET nome=?, estado=?,salario=?,email=?,senha=? where codigo=?");
        $resultado->bindParam(1, $dados[0]);
        $resultado->bindParam(2, $dados[1]);
        $resultado->bindParam(3, $dados[2]);
        $resultado->bindParam(4, $dados[3]);
        $resultado->bindParam(5, $dados[4]);
        $resultado->bindParam(6, $dados[5]);
        try {
            $resultado->execute();
            header('Location:funcionario.php');
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }
    }

    public function incluirfuncionario($dados){
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("INSERT INTO funcionario(nome, estado, salario,email, senha) VALUES(?,?,?,?,?)");
        $resultado->bindParam(1, $dados[0]);
        $resultado->bindParam(2, $dados[1]);
        $resultado->bindParam(3, $dados[2]);
        $resultado->bindParam(4, $dados[3]);
        $resultado->bindParam(5, $dados[4]);

        try {
            $resultado->execute();
            header('Location:funcionario.php');
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

    public function getSenha(){
        return $this->senha;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSalario(){
        return $this->salario;
    }
}
?>