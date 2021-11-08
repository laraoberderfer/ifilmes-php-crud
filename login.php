<div class="container-sm">	
	<form action="auxiliar.php?login=1" method="POST" >
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id="email" name="email" required>
		</div>

		<div class="form-group">
			<label for="senha">Password</label>
			<input type="password" class="form-control" id="senha" name="senha" required>
		</div>

		<div class="form-group">
			<input name="enviar" id="enviar" type="submit" value="Enviar"  class="btn btn-primary " />
			<input name="limpar" id="limpar" type="reset"  value="Limpar"  class="btn btn-info " />
		</div>
	</form>
</div>