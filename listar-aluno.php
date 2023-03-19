<h1><i class="fas fa-users"></i> Listar Aluno</h1>
<div class="row">
	<div class="col-lg-12">
		<form class="row g-2 float-end" action="?page=listar-aluno" method="POST">
			<div class="col-auto">
				<input type="text" name="pesquisa" placeholder="Pesquisar..." class="
				form-control">
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</form>
	</div>
</div>
<?php
	if(empty($_REQUEST["pesquisa"])){
		$sql = "SELECT * FROM aluno";
	}else{
		$sql = "SELECT * FROM aluno WHERE nome_aluno LIKE '%".$_REQUEST["pesquisa"]."%' ";
	}	

	$res = $conn->query($sql) or die($conn->error);

	$qtd = $res->num_rows;

	print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

	if($qtd > 0){
		print "<table class='table table-striped table-hover table-bordered'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>E-mail</th>";
		print "<th>Data de Nascimento</th>";
		print "<th>Telefone</th>";
		print "<th>Endereço</th>";
		print "<th>Ações</th>";
		print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id_aluno."</td>";
			print "<td>".$row->nome_aluno."</td>";
			print "<td>".$row->email_aluno."</td>";
			print "<td>".$row->dt_nasc_aluno."</td>";
			print "<td>".$row->fone_aluno."</td>";
			print "<td>".$row->end_aluno."</td>";
			print "<td>
					<button class='btn btn-primary' onclick=\"location.href='?page=editar-aluno&id_aluno=".$row->id_aluno."';\">
						<i class=\"fas fa-edit\"></i>
					</button>

					<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-aluno&acao=excluir&id_aluno=".$row->id_aluno."';}else{false;}\">
						<i class=\"fas fa-trash-alt\"></i>
					</button>
				   </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "<div class='alert alert-danger'>Não encontrou resultado.</div>";
	}
?>