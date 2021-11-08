<?php $funcionario = new FuncionarioControler();  ?>

<form class="form-horizontal" action="<?php echo $funcionario->getAction();?>" method="post"> 
        <fieldset>
          <!-- Form Name -->
          <legend><?php echo $funcionario->getLegenda();?> !</legend>

          <!-- Text input-->
          <div class="form-group">
            <label for="titulofilme">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $funcionario->getNome(); ?>" >
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label for="sinopse">Estado</label>
            <textarea id="estado" name="estado"> <?php echo $funcionario->getEstado(); ?>  </textarea>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="quantidade">Salário</label>
            <input type="text" class="form-control" id="salario" name="salario" value="<?php echo $funcionario->getSalario();; ?>"  class="input-xxlarge">
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $funcionario->getEmail(); ?>"  class="input-xxlarge">
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="trailer">Senha</label>
            <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $funcionario->getSenha(); ?>"  class="input-xxlarge">
          </div> 
          <!-- Button -->
          <div class="form-group">
            <input name="enviar" id="enviar" type="submit" value="Enviar"  class="btn btn-primary " />
          </div>
        </fieldset>
      </form>