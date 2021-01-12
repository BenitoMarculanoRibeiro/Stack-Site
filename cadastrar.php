<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios - Entrar</title>
    <link rel="stylesheet" href="css/cadastrar.css">
</head>

<body>
    <form method="POST">
        <h1>Cadastre-se</h1>
        <label for="">Nome</label>
        <input type="text" name="nome" maxlength="40">
        <label for="">Email</label>
        <input type="email" name="email" maxlength="40" autocomplete="off">
        <label for="">Senha</label>
        <input type="password" name="senha">
        <label for="">Confirmar Senha</label>
        <input type="password" name="confSenha">
        <input type="submit" value="cadastrar">
    </form>
</body>
<!--======================== PHP ==========================-->
</html>




<?php

// 1 verificar se ela apertou o botao cadastrar
// 2 guardar dados dentro de variaveis
// 3 enviar dados recebidos para a classe
// 4 verificar o retorno false ou true

if(isset($_POST['nome']))
{
    $nome = htmlentities(addslashes($_POST['nome']));
    $email = htmlentities(addslashes($_POST['email']));
    $senha = htmlentities(addslashes($_POST['senha']));
    $confSenha = htmlentities(addslashes($_POST['confSenha']));

if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confSenha))
    {
        if($senha == $confSenha)
        {
            require_once 'Classes/Usuario.php';
            $us = new Usuario("projeto_comentarios", "localhost", "root", "senha");
            if($us->cadastrar($nome, $email, $senha))
                {
                    ?>
                        <p class="mensagem">Cadastrado com sucesso<a href="entrar.php">Acesse ja</a></p>
                    <?php
                }
                else{ //
                    ?>
                        <p class="mensagem">Email ja esta cadastrado</p>
                    <?php
                    }
        }else //
            {
                ?>
                    <p class="mensagem">Senhas nao correspondem</p>
                <?php
            }
    }else //
        {
            ?>
                <p class="mensagem">Preencha todos os campos</p>
            <?php
        }
}


?>
