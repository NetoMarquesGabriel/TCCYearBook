<?php
namespace Db;

use Config\Cflogin;

//require_once 'Config/Cflogin.class.php';

/**
 * Description of DbConnection
 *
 * @author ACAD_ROGERIO_000590
 */
class DbConnection extends Cflogin {
    private $conn;
    private $user     = 'root';
    private $pass     = '';
    private $host     = 'localhost';
    private $port     = '3306';
    private $database = 'TCC13C2';
    private $ultimoCod;


    private function connect(){
        try {
            $this->conn = new \PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database", $this->user,  $this->pass);
            if(isset($this->conn)){
               // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;
            }
        } catch (PDOException $exc) {
            throw new Exception($exc->getCode());
        }
     }
     
     // Método responsável em ações como: inserir, atualizar e excluir
     public function runQuery($sql) {
         
         $this->conn = $this->connect();
         $this->conn->beginTransaction();
         $stm = $this->conn->prepare($sql);
         $stm->execute();
         if($stm){
              $this->ultimoCod =   $this->conn->lastInsertId();// ok retornando o último id Cadastrado
              $this->conn->commit(); 
         }else{
             $this->conn->rollBack();
         }
        return $stm;
     }
     
     // Método responsável em consultas
     public function runSelect($sql) {
        $this->conn = $this->connect(); 
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
        
     }
     // Método responsável em encerrar a conexão com o banco
     public function closeConnection() {
         $this->conn = null;
     }
     
     public function getUltimoCod(){
         return $this->ultimoCod;
     }
    
}
