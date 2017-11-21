<?php
	
	$usuario = 'root';
   	$senha= 'vertrigo';
	$conecta = mysqli_connect('localhost', $usuario, $senha, 'guardalink');

	function filtraTabela ($query) {
		$usuario = 'root';
    	$senha= 'vertrigo';
		$conecta = mysqli_connect('localhost', $usuario, $senha, 'guardalink');
		$filter_Result = mysqli_query($conecta, $query);
		return $filter_Result;
	}

	if(isset($_POST['busca_titulo'])){
		$busca_titulo = $_POST['valor_titulo'];
		$query = "SELECT * FROM `guardalink` WHERE `titulo` LIKE '%".$busca_titulo."%'";
		$resultado = filtraTabela($query);
		
	}
	elseif (isset($_POST['busca_cat'])) {
		$busca_cat = $_POST['valor_cat'];
		$query = "SELECT * FROM `guardalink` WHERE `categoria` LIKE '%".$busca_cat."%'";
		$resultado = filtraTabela($query);
	}
	else {
		$query = "SELECT * FROM `guardalink`";
		$resultado = filtraTabela($query);
	}
	

	if (isset($_POST['id']) && is_numeric($_POST['id'])) {		
    	mysqli_query($conecta, "DELETE FROM guardalink WHERE ID = " . $_POST['id']) or die('Erro ao deletar');
    	header("Refresh:0");
	}

?> 
<!DOCTYPE html>
<html>
<head>
	<title>Repositório de links para estudo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">	
</head>
<body>
	<form action="links.php" method="post">
		
			<div class="col-sm-12" style="margin-top: 3%">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="valor_titulo" placeholder="Título">
				</div>
				<input type="submit" class="btn btn-primary" name="busca_titulo" value="Filtrar">
			</div>
		
	</form>
	<form action="links.php" method="post">
		
		<div class="col-sm-12" style="margin-top: 3%">
			<div class="col-sm-4">
				<input type="text" class="form-control" name="valor_cat" placeholder="Categoria">
			</div>
			<input type="submit" class="btn btn-primary" name="busca_cat" value="Filtrar">
		</div>
		
	</form>
	<div class="col-sm-12" style="margin-top: 3%">
		<div class="col-sm-8">
			<div class="col-sm-12">
				<div class="col-sm-5">
					<span style="font-weight: bold;padding: 3%">Link</span>
				</div>
				<div class="col-sm-3">
					<span style="font-weight: bold;padding: 3%">Título</span>
				</div>
				<div class="col-sm-3">
					<span style="font-weight: bold;padding: 3%">Categoria</span>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<?php while($row = mysqli_fetch_array($resultado))	{
				echo "<div class='col-sm-12'>";
				echo "<div class='col-sm-5'>";
				echo "<span style='padding: 3%'>" . $row['link'] . "</span>";
				echo "</div>";
				echo "<div class='col-sm-3'>";
				echo "<span style='padding: 3%'>" . $row['titulo'] . "</span>";
				echo "</div>";
				echo "<div class='col-sm-3'>";
				echo "<span style='padding: 3%'>" . $row['categoria'] . "</span>";
				echo "</div>";
				echo "<div class='col-sm-1'><form action='links.php' method='post'>";
				echo "<input type='hidden' name='id' value=" . $row['id'] . " ></input>";
				echo "<input type='submit' class='btn btn-primary'  name='deletar' id='deletar' value='deletar'>";
				echo "</form></div>";
				echo "<hr>";
				echo "</div>";
			}	?>
		</div>
	</div>
</body>
</html>