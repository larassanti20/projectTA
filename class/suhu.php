
<?php
error_reporting(E_ALL ^ E_DEPRECATED);

class  Nodemcu_log{
    //connection
    private $conn;

    //table
    private $tbl_suhu ="sensor_suhu";
    private $tbl_getar ="sensor_getar";


    //Db connection
    public function __construct($db){
                $this->conn = $db;

    }
    //CREATE
    public function createLogData(){
        $sqlQuery = "INSERT INTO
                    ". $this->tbl_suhu ."
                        SET
                            nilai_suhu = :suhu,
                            kondisi_mesin = :kondisiSuhu";
        $stmt = $this->conn->prepare($sqlQuery);
            
                // sanitize
        $this->suhu=htmlspecialchars(strip_tags($this->suhu));
        $this->kondisiSuhu=htmlspecialchars(strip_tags($this->kondisiSuhu));
                
            
                // bind data
        $stmt->bindParam(":suhu", $this->suhu);
        $stmt->bindParam(":kondisiSuhu", $this->kondisiSuhu);
                
        if($stmt->execute()){
            return true;
        }
        return false;
    }

     public function createLogData2(){
        $sqlQuery = "INSERT INTO
                    ". $this->tbl_getar ."
                        SET
                            nilai_getar = :getar,
                            kondisi_mesin = :kondisiGetar";
        $stmt = $this->conn->prepare($sqlQuery);
            
                // sanitize
        $this->getar=htmlspecialchars(strip_tags($this->getar));
        $this->kondisiGetar=htmlspecialchars(strip_tags($this->kondisiGetar));
                
            
                // bind data
        $stmt->bindParam(":getar", $this->getar);
        $stmt->bindParam(":kondisiGetar", $this->kondisiGetar);
                
        if($stmt->execute()){
            return true;
        }
        return false;
    }



}


?>
