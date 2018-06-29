<?php


 require_once'PDOConnect.class.php';
 
class Page {
    public Function numPage($pagina, $itens_por_pagina){
        $sql = "SELECT * FROM veiculos DESC LIMIT ?,?";
        $lista = new PDOConnect;
        $conn = $lista->conexao()->prepare($sql);
        $conn->bindValue(1,$pagina);
        $conn->bindValue(2,$itens_por_pagina);
        $conn->execute();
        
        $result = $conn->fetch_assoc();

        return $result;
    }
}
?>