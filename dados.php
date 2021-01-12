<?php
session_start();
if(!isset($_SESSION['id_master']))
{
	header("Location: index.php");
}
require_once 'Classes/Usuario.php';
$us = new Usuario("projeto_comentarios","localhost","root","senha");
$dados = $us->buscarTodosUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios</title>
    <link rel="stylesheet" href="css/dados.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="discussao.php">Discussão</a></li>
            <li><a href="sair.php">Sair</a></li>
        </ul>
    </nav>
    <table>
        <tr id="titulo">
            <td>ID</td>
            <td>NOME</td>
            <td>EMAIL</td>
            <td>COMENTARIOS</td>
        </tr>
	<?php

	if(count($dados) > 0)
	{
		foreach($dados as $v)
		{
		?>
			<tr>
				<td><?php echo $v['id'];?></td>
				<td><?php echo $v['nome'];?></td>
				<td><?php echo $v['email'];?></td>
				<td><?php echo $v['quantidade'];?></td>
			</tr>
		<?php
		}
	}
	else{
		echo "Nao ha pessoas cadastradas";
	}

	?>
    </table>
</body>
</html>
