<h1>Cadastrar Atendente</h1>
<form action="?page=salvar-atendente" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Biblioteca</label>
		<select name="biblioteca_id_biblioteca" class="form-control">
			<option>-= Selecione a Biblioteca =-</option>
		<?php
			$sql = "SELECT * FROM biblioteca";

			$res = $conn->query($sql) or die($conn->error);

			if($res->num_rows > 0){
				while ($row = $res->fetch_object()) {
					print "<option value='".$row->id_biblioteca."'>";
					print $row->nome_biblioteca."</option>";
				}
			}else{
				print "<option>Não tem biblioteca cadastrada</option>";
			}
		?>
		</select>
	</div>
	<div class="mb-3">
		<label>Nome do Atendente</label>
		<input type="text" name="nome_atendente" class="form-control">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>