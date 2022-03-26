<?php
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/LivrosControler.php");
$livros = new LivrosControler();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Livros </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
      <!-- nav -->    	
  <div class="column-sm-4"> 
   <?php include "sidebar.php"; ?> <!-- Barra lateral-->
  </div>
  <div class="column col-sm-7">
    <h1> Cadastro de livros</h1>    
    <form class="form-horizontal" action="<?php echo $livros->getAction(); ?>" method="post"> 
        <div class="mb-3 row">
            <label for="inputNome" class="col-sm-2 col-form-label">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $livros->getNome(); ?>"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPaginas" class="col-sm-2 col-form-label">Paginas:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputPaginas" name="paginas" value="<?php echo $livros->getPaginas(); ?>"/>
            </div>
        </div>
               
        <div class="mb-3 row">
            <label for="inputGenero" class="col-sm-2 col-form-label">Genero:</label>
            <div class="col-sm-10">
                <select class="form-select" id="inputGenero" name="genero" value="<?php echo $livros->getGenero(); ?>">

                <option value="Ação">Ação</option>
                <option value="Aventura">Aventura</option>
                <option value="Romance">Romance</option>
                <option value="Comedia">Comedia</option>
                <option value="Drama">Drama</option>
                <option value="Ficção Cientifica">Ficção Cientifica</option>
            </select>
        </div>

        <div class="mb-3 row">
            <label for="inputDatadepublicacao" class="col-sm-2 col-form-label">Data de Publicação:</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="inputDatadepublicacao" name="datadepublicacao" value="<?php echo $livros->getDatadepublicacao(); ?>"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputAutor" class="col-sm-2 col-form-label">Autor:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputAutor" name="autor" value="<?php echo $livros->getAutor(); ?>"/>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" href="<?php echo "auxiliarLivros.php?opcao=1";?>" type="submit">Submit form</button>
        </div>
    
    </form>
</div>
<div class="container-fluid">  
    <div class="page-header text-muted divider">
      <h2> Livros Cadastrados</h2>
    </div>
  </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" class="col-sm-3">livros</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
      <?php                       
        $livros->imprimeLivros();  //Lista filmes no banco    
      ?>   
    </tbody>                     	
  </table>
  </body>
</html>