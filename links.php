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
		$search_result = filtraTabela($query);
		
	}
	elseif (isset($_POST['busca_cat'])) {
		$busca_cat = $_POST['valor_cat'];
		$query = "SELECT * FROM `guardalink` WHERE `categoria` LIKE '%".$busca_cat."%'";
		$search_result = filtraTabela($query);
	}
	else {
		$query = "SELECT * FROM `guardalink`";
		$search_result = filtraTabela($query);
	}
	

	if (isset($_POST['id']) && is_numeric($_POST['id'])) {		
    	mysqli_query($conecta, "DELETE FROM guardalink WHERE ID = " . $_POST['id']) or die('Erro ao deletar');
    	header("Refresh:0");
	}

?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
	<form action="links.php" method="post">
		<input type="text" name="valor_titulo" placeholder="Título">
		<input type="submit" name="busca_titulo" value="filter">
	</form>
	<form action="links.php" method="post">
		<input type="text" name="valor_cat" placeholder="Categoria">
		<input type="submit" name="busca_cat" value="filter">
	</form>
	<table id="tabela" border='1'>
		<tr>
			<th>Link</th>
			<th>Título</th>
			<th>Categoria</th>
		</tr>
		<?php while($row = mysqli_fetch_array($search_result))	{
				echo "<tr>";
				echo "<td>" . $row['link'] . "</td>";
				echo "<td>" . $row['titulo'] . "</td>";
				echo "<td>" . $row['categoria'] . "</td>";
				echo "<td>";
				echo "<form action='links.php' method='post'>";
				echo "<input type='hidden' name='id' value=" . $row['id'] . " ></input>";
				echo "<input type='submit' name='deletar' id='deletar' value='deletar'>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";

			
		?>

</body>
</html>