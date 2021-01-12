<?php 
        require_once 'Classes/Usuario.php';
        session_start();
        if(isset($_SESSION['id_usuario']))
        {
                $us = new Usuario("projeto_comentarios","localhost","root","senha");
                $informacoes = $us->buscarDadosUser($_SESSION['id_usuario']);
        }elseif(isset($_SESSION['id_master']))
        {
                $us = new Usuario("projeto_comentarios","localhost","root","Tec14@81draw");
                $informacoes = $us->buscarDadosUser($_SESSION['id_master']);
        }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack de Programadores</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<script>
	//darkmode-script
	var trocardcor = 0;
	function trocarcor(){
		if(trocardcor === 0){
		document.getElementById("cabecalho").style.backgroundColor = "#1d1e20";
		document.querySelector("body").style.backgroundColor = "white";
		document.getElementById("button").value = "LightMode(teste)";
		trocardcor = 1;
		}else if(trocardcor === 1){
			document.getElementById("cabecalho").style.backgroundColor = " #2393ff";
			document.querySelector("body").style.backgroundColor = "white";
			document.getElementById("button").value = "DarkMode(teste)";
			trocardcor = 0;
		}
	}
</script>
<body>
	<!-- Area de Navegação do site -->
	<section class="cabecalho" id="cabecalho">
		<div class="stackLogo">
			<img src="logostack.png" width="50px" height="50px">
			<a id="stacktitulo">Stack de Programadores</a>
		</div>
		<div>
  	<nav class="menu">
    	<ul>
				<?php
				if(isset($_SESSION['id_master']))
				{ ?>
				<li><a href="dados.php">Dados</a></li>
				<?php }
				 ?>
				<li><a href="discussao.php">Discussão</a></li>
				<?php
			if(isset($informacoes)) // tem uma sessao
			{
			?>
				<li><a href="sair.php">Sair</a></li>
				<?php
			}
			else {
			?>
				<li><a href="entrar.php">Entrar</a></li>
				<!-- <li><a href="entrar.php"><img src="user.png" width="17px" height="17px">Entrar</a></li> -->
				<?php
			}
			?>
				<li><input id="button" type="button" value="darkmode(teste)" onclick="trocarcor()"></li>
    	</ul>
		</nav>
	</div>
</section>
	<div class="chat">
		<p>Chat</p>
	</div>
<?php
	if(isset($_SESSION['id_master']) || isset($_SESSION['id_usuario']))
	{
		?>
		<h2> <?php
			echo "Olá! ";
			echo $informacoes['nome'];
			echo ", seja bem vindo(a)!";
		      ?>
		</h2>
		<?php
	}
	?>
<!-- area afins
	    <h3>Conteudo Qualquer</h3>
		<p>Este é um projeto de <a href="https://www.youtube.com/watch?v=vinsTXSwrNE&list=PLYGFJHWj9BYr6O83uNfGbuskbQJk9ASs_">Miriam TECHCOD</a></p>
 -->
	</body>
<script>
	//typewriter titulo stack
	function typewriter(titulo){
		const arrayTitulo = titulo.innerHTML.split('');
		titulo.innerHTML = "";
		arrayTitulo.forEach((letras, i) => {
			setTimeout(function(){
				titulo.innerHTML += letras;
			}, 85 * i)
		});
	}
	const stackTitulo = document.getElementById('stacktitulo');
	typewriter(stackTitulo);
</script>
</html>
