<?php

class PDOConnect{
    private $conn = null;
    public function conexao(){
        try{
            if ($this->conn == null) 
                $this->conn = new PDO(DSN.':host='.HOST.';dbname='.DB,USER,PASSWORD);
                return $this->conn;
        } catch (PDOException $ex) {
                echo"Falha ao conectar com o banco{$ex->getMessage()}";

        }
        
    }
}


