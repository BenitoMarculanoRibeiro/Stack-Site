<?php

Class Usuario{

    private $pdo;

    //Construtor
    public function __construct($dnmae, $host, $usuario, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dnmae.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            echo "Erro no banco de dados: ".$e->getMessage();
        }
        catch(Exception $e){
            echo "Erro: ".$e->getMessage();
         }
    }

    //Cadastrar
    public function cadastrar($nome, $email, $senha)
    {
        //Antes de cadastrar, verificar se ja esta cadastrado
        $cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
        $cmd->bindValue(":e",$email);
        $cmd->execute();
        if($cmd->rowCount() > 0) //veio id
        {
            return false;
        }else //pode cadastrar
        {
            $cmd = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":s",md5($senha));
            $cmd->execute();
            return true;
        }

    }

    //Logar
    public function entrar($email, $senha)
    {
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios 
        WHERE email = :e AND senha = :s");
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":s",md5($senha));
        $cmd->execute();
        if($cmd->rowCount() > 0) // se achou a pessoa
        {
            $dados = $cmd->fetch();
            session_start();
            if($dados['id'] == 1)
            {   
                //usuario ADM
                $_SESSION['id_master'] = 1;
            }else
            {
                //usuario NORMAL
                $_SESSION['id_usuario'] = $dados['id'];
            }
            return true;
        }else
        {
            //se ninguem foi achado
            return false;
        }
    }


	public function buscarDadosUser($id)
	{
		$cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		$dados = $cmd->fetch();
		return $dados;
	}

	public function buscarTodosUsuarios()
    {
        $cmd = $this->pdo->prepare("select usuarios.id, usuarios.nome, usuarios.email, count(comentarios.id)
        as 'quantidade'
        from usuarios
        left join comentarios
        on usuarios.id = comentarios.fk_id_usuario
        group by usuarios.id");
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }



}
