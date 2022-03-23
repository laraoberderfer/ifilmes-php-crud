<?php include_once("Conexao.php");
class Filme{
    private $legenda = "";
    private $titulofilme = "";
    private $sinopse = "";
    private $quantidade = "";
    private $trailer = "";

    function __construct(){
        //inicia sessão  
        session_start();
        $this->con = new Conexao();
        
        //Caso o usuário não esteja autenticado, limpa os dados e redireciona
        if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {    
        session_destroy(); //Destrói a sessão

        //Limpa
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);

        //Redireciona para a página de autenticação
        header('location:index.php');	
        } else {
            $this->retornaFilmes();
        }
    }

    private function retornaFilmes(){
        //acesso ao banco e tabelas do sistema
        if(!isset($_REQUEST['codigo'])){
            $this->action = "auxiliar.php?incluir=1";
            $this->legenda = "Incluir Livro";
            $this->titulofilme = "";
            $this->sinopse     = "";
            $this->quantidade  = "";
            $this->trailer     = "";
        } else {     
            $this->action = "auxiliar.php?codigoAlt=".$_REQUEST['codigo'];
            $this->legenda = "Alterar";
            $query = "SELECT * FROM filme WHERE codigo = ".$_REQUEST['codigo'];
            $con = (new Conexao())->get_conexao(); 
            $result = $con->query($query);
            $linha = $result->fetch(PDO::FETCH_OBJ);
            $this->titulofilme = $linha->titulo;
            $this->sinopse     = $linha->sinopse;
            $this->quantidade  = $linha->quantidade;
            $this->trailer     = $linha->trailer; 
        }
    }

    public function imprimeFilmes(){
        $con = (new Conexao())->get_conexao();

        $resultado = $con->prepare("SELECT * FROM filme");
        $resultado->execute();
        while($linha = $resultado->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> 
            <td scope="row">'.$linha->titulo.'</td>
            <td><a class="btn btn-warning" href="adm.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-success" href="auxiliar.php?opcao=2&codigoImp='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
            <td><a class="btn btn-danger" href="auxiliar.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }

    function excluirFilme($codigo){
        //$codigo	= $_REQUEST['codigo'];	
        $con = (new Conexao())->get_conexao();
        //query
        $query = "DELETE FROM filme WHERE codigo=".$codigo;
        $con->query($query);
        //$this->con->exclui($query);
        header('Location:adm.php');		
    }

    public function alterarFilme($dados){
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("UPDATE filme SET titulo=?, sinopse=?,quantidade=?,trailer=? where codigo=?");
        $resultado->bindParam(1, $dados[0]);
        $resultado->bindParam(2, $dados[1]);
        $resultado->bindParam(3, $dados[2]);
        $resultado->bindParam(4, $dados[3]);
        $resultado->bindParam(5, $dados[4]);
        try {
            $resultado->execute();
            header('Location:adm.php');
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }
    }

    public function incluirFilme($dados){
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("INSERT INTO filme(titulo, sinopse, quantidade,trailer) VALUES(?,?,?,?)");
        $resultado->bindParam(1, $dados[0]);
        $resultado->bindParam(2, $dados[1]);
        $resultado->bindParam(3, $dados[2]);
        $resultado->bindParam(4, $dados[3]);

        try {
            $resultado->execute();
            header('Location:adm.php');
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }
    }

    public function getLegenda(){
        return $this->legenda;
    }

    public function getTitulo(){
        return $this->titulofilme;
    }

    public function getAction(){
        return $this->action;
    }

    public function getSinopse(){
        return $this->sinopse;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getTrailer(){
        return $this->trailer;
    }
}
?>