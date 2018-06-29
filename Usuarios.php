<?php


 require_once'PDOConnect.class.php';
 
class Usuarios {
    public $id;
    public $nome;
    public $email;
    public $senha;
    
     public Function inserir($nome, $email, $senha){
        $sql="insert into usuario(login, senha, email)values(?,?,?)";
        $insere= new PDOConnect;
        $conn=$insere->conexao()->prepare($sql);
        $conn->bindValue(1,$nome);
        $conn->bindValue(2,$senha);
        $conn->bindValue(3,$email);
        $conn->execute();
    }
    
    public Function carregar($email, $senha){
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->prepare($sql);
        $conn->bindValue(1,$email);
        $conn->bindValue(2,$senha);
        $conn->execute();
        
        $result = $conn->fetchAll();

        return $result;
    }
    
    public Function recuperar($email){
        $sql = "SELECT * FROM usuario WHERE email = ? ";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->prepare($sql);
        $conn->bindValue(1,$email);
        $conn->execute();
        
        $result = $conn->fetchAll();

        return $result;
    }
    
    public Function updateSenha($senha,$email){
        $sql = "UPDATE usuario SET senha = ? WHERE email = ?";
        $insere= new PDOConnect;
        $conn=$insere->conexao()->prepare($sql);
        $conn->bindValue(1,$senha);
        $conn->bindValue(2,$email);
        $conn->execute();

    }
    public Function editar($nome, $id){
        $sql = "UPDATE usuario SET login = ? WHERE id_usuario = ?";
        $insere= new PDOConnect;
        $conn=$insere->conexao()->prepare($sql);
        $conn->bindValue(1,$nome);
        $conn->bindValue(2,$id);
        $conn->execute();

    }
    public Function redefinicao($nome,$senha, $id){
        $sql = "UPDATE usuario SET login = ?, senha = ? WHERE id_usuario = ?";
        $insere= new PDOConnect;
        $conn=$insere->conexao()->prepare($sql);
        $conn->bindValue(1,$nome);
        $conn->bindValue(2,$senha);
        $conn->bindValue(3,$id);
        $conn->execute();

    }
    public Function foto($id){
        $sql = "SELECT foto FROM usuario WHERE id_usuario = ? ";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->prepare($sql);
        $conn->bindValue(1,$id);
        $conn->execute();
        
        $result = $conn->fetchAll();

        return $result;
    }
    
    public Function updateFoto($id,$foto){
        $sql = "UPDATE usuario SET foto = ? WHERE id_usuario = ?";
        $insere= new PDOConnect;
        $conn=$insere->conexao()->prepare($sql);
        $conn->bindValue(1,$foto);
        $conn->bindValue(2,$id);
        $conn->execute();

    }
    
    public Function deletFoto($id){
        $sql = "UPDATE usuario SET foto = NUll WHERE id_usuario = {$id}";
        $insere= new PDOConnect;
        $conn=$insere->conexao()->prepare($sql);
        $conn->bindValue(1,$id);
        $conn->execute();

    }
    
    
    public Function user($id){
        $sql = "SELECT * FROM usuario WHERE id_usuario = {$id}";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        $result = $conn->fetchAll();
        foreach ($result as $linha){
            $this->nome = $linha['login'];
            $this->email = $linha['email'];   
        }
    }
}
