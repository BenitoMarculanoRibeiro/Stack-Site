<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios - Entrar</title>
    <link rel="stylesheet" href="css/entrar.css">
</head>

<body>
    <form action="" method="POST">
        <h1>Acesse sua conta</h1>
        <img src="imagens/envelope.png" alt="">
        <input type="email" name="email" maxlength="40" autocomplete="off" placeholder="E-mail:">
        <img src="imagens/cadeado.png" alt="">
        <input type="password" name="senha" placeholder="Senha:">
        <input type="submit" value="entrar">
        <a href="cadastrar.php">Registre-se agora!</a>
    </form>
</body>
</html>

<?php

if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	if(!empty($email) && !empty($senha))
	{
		require_once 'Classes/Usuario.php';
		$us = new Usuario("projeto_comentarios" ,"localhost" ,"root" , "senha");
		if($us->entrar($email, $senha))
		{
			header("Location: index.php");
		}else
		{
			?>
				<p class="mensagem">Email e/ou senha invalidos</p>
			<?php
		}
	}else
	{
		?>
			<p class="mensagem">Preencha todos os campos!</p>
		<?php
	}
}
?>
