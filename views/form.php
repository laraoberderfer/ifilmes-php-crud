<?php $cliente = new ClienteControler();  ?>

<form class="form-horizontal" action="<?php echo $cliente->getAction();?>" method="post"> 
        <fieldset>
          <!-- Form Name -->
          <legend><?php echo $cliente->getLegenda();?> !</legend>

          <!-- Text input-->
          <div class="form-group">
            <label for="titulofilme">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cliente->getNome(); ?>" >
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label for="sinopse">Endereco</label>
            <textarea id=endereco" name="endereco"> <?php echo $cliente->getEndereco(); ?>  </textarea>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="quantidade">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $cliente->getTelefone(); ?>"  class="input-xxlarge">
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $cliente->getEmail(); ?>"  class="input-xxlarge">
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="trailer">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cliente->getcpf(); ?>"  class="input-xxlarge">
          </div> 
          <!-- Button -->
          <div class="form-group">
            <input name="enviar" id="enviar" type="submit" value="Enviar"  class="btn btn-primary " />
          </div>
        </fieldset>
      </form>