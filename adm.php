<?php
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/FilmeControler.php");
$filme = new FilmeControler();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>BibliotecaChiquim</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid"> <!-- Bootstrap, usado para o container fluir com o tamanho da janela e/ou com mobile -->
<div class="row">

  <!-- nav -->    	
  <div class="column-sm-4"> 
   <?php include "sidebar.php"; ?> <!-- Barra lateral-->
  </div>
  <!-- formulario -->
  <div class="column col-sm-7">
    <div class="page-header text-muted">Livros </div>
      <form class="form-horizontal" action="<?php echo $filme->getAction(); ?>" method="post"> 
        <fieldset>
          <!-- Form Name -->
          <legend><?php echo $filme->getLegenda();?> !</legend>
          <!-- Text input-->
          <div class="form-group">
            <label for="titulofilme">Livros</label>
            <input type="text" class="form-control" id="titulofilme" name="titulofilme" value="<?php echo $filme->getTitulo(); ?>" >
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label for="sinopse">Sinopse</label>
            <textarea id="sinopse" name="sinopse"> <?php echo $filme->getSinopse(); ?>  </textarea>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo $filme->getQuantidade(); ?>"  class="input-xxlarge">
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="trailer">Spoiler</label>
            <input type="text" class="form-control" id="trailer" name="trailer" value="<?php echo $filme->getTrailer(); ?>"  class="input-xxlarge">
          </div> 
          <!-- Button -->
          <div class="form-group">
            <input name="enviar" id="enviar" type="submit" value="Enviar"  class="btn btn-primary " />
          </div>
        </fieldset>
      </form>  
  <!-- /formulario -->

  <!-- lista -->
  <div class="container-fluid">  
    <div class="page-header text-muted divider">
      Livros Cadastrados
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
        $filme->imprimeFilmes();  //Lista filmes no banco    
      ?>   
    </tbody>                     	
  </table>                      
  <hr>
    <a class="btn btn-info" href="<?php echo "auxiliar.php?opcao=1"; ?>" target="_blank" role="button">Imprimir Listagem de Livros</a>  
  <hr>
  <!-- /lista -->
  <hr />
  <!-- rodape -->    	
  <?php include "rodape.php"; ?>
  </div> <!-- /col-7 --> 
  </div>  <!-- /row --> 
 </div>  <!-- /container-fluid -->    
  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>