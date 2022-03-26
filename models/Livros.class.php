<?php include_once("Conexao.php");
class Livros{
    private $nome = "";
    private $paginas = "";
    private $autor = "";
    private $genero = "";
    private $datadepublicacao = "";

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
            $this->retornaLivros();
        }
    }

    private function retornaLivros(){

        //acesso ao banco e tabelas do sistema
        if(!isset($_REQUEST['codigo'])){
            $this->action = "auxiliarLivros.php?incluir=1";
            $this->nome = "";
            $this->paginas = "";
            $this->autor = "";
            $this->genero = "";
            $this->datadepublicacao = "";


        } else {     
            $this->action = "auxiliarLivros.php?codigoAlt=".$_REQUEST['codigo'];
            $this->legenda = "Alterar";
            $query = "SELECT * FROM livros WHERE codigo = ".$_REQUEST['codigo'];
            $con = (new Conexao())->get_conexao(); 
            $result = $con->query($query);
            $linha = $result->fetch(PDO::FETCH_OBJ);
            $this->nome = $linha->nome;
            $this->paginas     = $linha->paginas;
            $this->autor  = $linha->autor;
            $this->genero     = $linha->genero; 
            $this->datadepublicacao   = $linha->datadepublicacao;
        }
    }

    function excluirLivros($codigo){
        //$codigo	= $_REQUEST['codigo'];	
        $con = (new Conexao())->get_conexao();
        //query
        $query = "DELETE FROM livros WHERE codigo=".$codigo;
        $con->query($query);
        //$this->con->exclui($query);
        header('Location:adm.php');		
    }

    public function alterarLivros($dados){
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("UPDATE livros SET nome=?, paginas=?,autor=?,genero=?,datadepublicacao=? where codigo=?");
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
    public function imprimeLivros(){
        $con = (new Conexao())->get_conexao();

        $resultado = $con->prepare("SELECT * FROM livros");
        $resultado->execute();
        while($linha = $resultado->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> 
            <td scope="row">'.$linha->nome.'</td>
            <td><a class="btn btn-warning" href="livros.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-success" href="auxiliarLivros.php?opcao=2&codigoImp='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
            <td><a class="btn btn-danger" href="auxiliarLivros.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';  
        }
    }

    public function incluirLivros($dados){
        print($dados[0]);
        $con = (new Conexao())->get_conexao();
        $resultado = $con->prepare("INSERT INTO livros(nome, paginas, autor, genero, datadepublicacao) VALUES(?,?,?,?,?)");
        $resultado->bindParam(1, $dados[0]);
        $resultado->bindParam(2, $dados[1]);
        $resultado->bindParam(3, $dados[2]);
        $resultado->bindParam(4, $dados[3]);
        $resultado->bindParam(5, $dados[4]);

        try {
            $resultado->execute();
            header('Location:livros.php');
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }
    }
   // public function getLegenda(){
     //   return $this->legenda;
    //}

    public function getAction(){
        return $this->action;
    }
    public function getNome(){
        return $this->nome;
    }

    public function getPaginas(){
        return $this->paginas;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getDatadepublicacao(){
        return $this->datadepublicacao;
    }
}
?>