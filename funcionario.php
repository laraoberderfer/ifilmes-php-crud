<?php
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/FuncionarioControler.php");
$funcionario = new funcionarioControler();
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <style>
    form {
      margin-top: 80px;
      width: 400px;
     }
  </style>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>IFilmes</title>
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
  <?php  include_once("views/formFunc.php");?>
    <div class="column col-sm-7">
        <div class="container-fluid">  
            <div class="page-header text-muted divider">
            funcionarios Cadastrados
            </div>
        </div>    


        <table class="table table-striped" id="tablefuncionario" >
            <thead>
                <tr>
                <th scope="col" class="col-sm-3">Nome</th>
                <th scope="col" class="col-sm-3">Estado</th>
                <th scope="col" class="col-sm-3">Salario</th>
                <th scope="col" class="col-sm-3">Email</th>
                <th scope="col" class="col-sm-3" colspan="3">Senha</th>
                </tr>
                </thead>
                <tbody>
                    <?php                       
                        $funcionario->getfuncionarios();  //Lista filmes no banco    
                    ?>   
                </tbody>                     	
        </table>


        <hr>
          <a class="btn btn-info" href="<?php echo "ViewFunc.php?opcao=1"; ?>" target="_blank" role="button">Imprimir funcionarios</a>  
        <hr>

    <?php include "rodape.php"; ?>
    </div> <!-- /col-7 --> 
  </div>  <!-- /row --> 
 </div>  <!-- /container-fluid -->    
  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>