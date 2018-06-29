<?php


 require_once'PDOConnect.class.php';
 
class Anuncios {
    public $id;
    public $marca;
    public $modelo;
    public $combustivel;
    public $cor;
    public $tipo;
    public $km;
    public $ano;
    public $valor;
    public $adicionais;
    public $usuario;
    public $img;    
    
    
     public Function inserir($marca, $modelo, $combustivel, $cor, $tipo, $km, $ano, $valor, $adicionais, $usuario, $img, $situacao){
        $sql="insert into veiculos(marca, modelo, combustivel, cor, ano, km, tipo, valor, opcional, id_usuario, foto, situacao)values(?,?,?,?,?,?,?,?,?,?,?,?)";
        $insere= new PDOConnect;
        $conn=$insere->conexao()->prepare($sql);
        $conn->bindValue(1,$marca);
        $conn->bindValue(2,$modelo);
        $conn->bindValue(3,$combustivel);
        $conn->bindValue(4,$cor);
        $conn->bindValue(5,$ano);
        $conn->bindValue(6,$km);
        $conn->bindValue(7,$tipo);
        $conn->bindValue(8,$valor);
        $conn->bindValue(9,$adicionais);
        $conn->bindValue(10,$usuario);
        $conn->bindValue(11,$img);
        $conn->bindValue(12,$situacao);
        $conn->execute();
        
    }
    
    public Function listar($id){
        $sql = "SELECT * FROM veiculos WHERE id_usuario = ?";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->prepare($sql);
        $conn->bindValue(1,$id);
        $conn->execute();
        
        $result = $conn->fetchAll();

        return $result;
    }
    
    public Function updateVendido($id){
        $sql = "UPDATE veiculos SET situacao = 0 WHERE id_veiculos = ?";
        $update= new PDOConnect;
        $conn=$update->conexao()->prepare($sql);
        $conn->bindValue(1,$id);
        $conn->execute();
    }
    
     public Function excluirAnuncio($id){
        $sql = "DELETE FROM veiculos WHERE id_veiculos = ?";
        $delete= new PDOConnect;
        $conn=$delete->conexao()->prepare($sql);
        $conn->bindValue(1,$id);
        $conn->execute();
    }
    
    public Function ediAnuncios($id){
        $sql = "SELECT * FROM veiculos WHERE id_veiculos = {$id}";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        $result = $conn->fetchAll();
        foreach ($result as $linha){
            $this->id = $linha['id_veiculos'];
            $this->marca = $linha['marca'];
            $this->modelo = $linha['modelo'];
            $this->combustivel = $linha['combustivel'];
            $this->cor = $linha['cor'];
            $this->tipo = $linha['tipo'];
            $this->km = $linha['km'];
            $this->ano = $linha['ano'];
            $this->valor = $linha['valor'];
            $this->adicionais = $linha['opcional'];
            $this->usuario = $linha['id_usuario'];
            $this->img = $linha['foto'];  
        }
    }
    
    public Function updateAnuncioFoto($marca, $modelo, $combustivel, $cor, $tipo, $km, $ano, $valor, $adicionais, $img, $id){
        $sql = "UPDATE veiculos SET marca =?, modelo =?, combustivel =?, cor =?, ano =?, km =?, tipo =?, valor =?, opcional =?, foto =? WHERE id_veiculos = ?";
        $update= new PDOConnect;
        $conn=$update->conexao()->prepare($sql);
        $conn->bindValue(1,$marca);
        $conn->bindValue(2,$modelo);
        $conn->bindValue(3,$combustivel);
        $conn->bindValue(4,$cor);
        $conn->bindValue(5,$ano);
        $conn->bindValue(6,$km);
        $conn->bindValue(7,$tipo);
        $conn->bindValue(8,$valor);
        $conn->bindValue(9,$adicionais);
        $conn->bindValue(10,$img);
        $conn->bindValue(11,$id);
        $conn->execute();
    }
    
    public Function updateAnuncio($marca, $modelo, $combustivel, $cor, $tipo, $km, $ano, $valor, $adicionais, $id){
        $sql = "UPDATE veiculos SET marca =?, modelo =?, combustivel =?, cor =?, ano =?, km =?, tipo =?, valor =?, opcional =? WHERE id_veiculos = ?";
        $update= new PDOConnect;
        $conn=$update->conexao()->prepare($sql);
        $conn->bindValue(1,$marca);
        $conn->bindValue(2,$modelo);
        $conn->bindValue(3,$combustivel);
        $conn->bindValue(4,$cor);
        $conn->bindValue(5,$ano);
        $conn->bindValue(6,$km);
        $conn->bindValue(7,$tipo);
        $conn->bindValue(8,$valor);
        $conn->bindValue(9,$adicionais);
        $conn->bindValue(10,$id);
        $conn->execute();
    }
    
    public Function pesquisarMarca(){
        $sql = "SELECT DISTINCT marca FROM veiculos ";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        $result = $conn->fetchAll();
        return $result;
    }
    
    public Function pesquisarModelo(){
        $sql = "SELECT DISTINCT modelo FROM veiculos ";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        $result = $conn->fetchAll();
        return $result;
    }
    
    public Function pesquisarAno(){
        $sql = "SELECT DISTINCT ano FROM veiculos ";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        $result = $conn->fetchAll();
        return $result;
    }
    
    public Function pesquisarTipo(){
        $sql = "SELECT DISTINCT tipo FROM veiculos ";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        $result = $conn->fetchAll();
        return $result;
    }
    
    public Function numPage($marca, $modelo, $ano, $tipo, $val, $pagina, $itens_por_pagina){
        $sql = "SELECT * FROM veiculos WHERE marca LIKE '%$marca%' AND modelo LIKE '%$modelo%' AND ano LIKE '%$ano%' AND tipo LIKE '%$tipo%' AND valor >{$val} AND situacao = 1 order by id_veiculos LIMIT {$pagina},{$itens_por_pagina}";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        
        $result = $conn->fetchAll();

        return $result;
    }
    
     public Function numPage2($marca, $modelo, $ano, $tipo, $val, $val2, $pagina, $itens_por_pagina){
        $sql = "SELECT * FROM veiculos WHERE marca LIKE '%$marca%' AND modelo LIKE '%$modelo%' AND ano LIKE '%$ano%' AND tipo LIKE '%$tipo%' AND valor >{$val} AND valor <{$val2} AND situacao = 1 order by id_veiculos LIMIT {$pagina},{$itens_por_pagina}";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->query($sql);
        
        $result = $conn->fetchAll();

        return $result;
    }
    public Function listarVeiculos(){
        $sql = "SELECT * FROM veiculos";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->prepare($sql);
        $conn->execute();
        
        $result = $conn->fetchAll();

        return $result;
    }
    
    public Function veiwAnuncios($id){
        $sql = "SELECT * FROM veiculos WHERE id_veiculos = ?";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->prepare($sql);
        $conn->bindValue(1,$id);
        $conn->execute();
        $result = $conn->fetchAll();
        return $result;
    }
    
}