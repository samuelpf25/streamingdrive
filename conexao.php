<?php
class Conexao
{
    private $servername = "localhost";
    private $database = "u892138677_seriesflix";
    private $username = "u892138677_seriesflix";
    private $password = "#Sa747400";
    private $conn;

    public function conectar()
    {
        // Create connection
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        echo "Connected successfully";

    }

    public function executar_sql($sql){
        if (mysqli_query($this->conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
        mysqli_close($this->conn);
    }
    public function insert($banco,$dados){

        $sql = "INSERT INTO ".$banco." VALUES ".$dados;
        $this->executar_sql($sql);    
        
    }

    public function select($colunas, $banco, $dados){

        if ($result = mysqli_query($this->conn, "SELECT ".$colunas." FROM ".$banco." WHERE ".$dados)) {
            
            return $result->fetch_object();
            /*while($obj = $result->fetch_object()){
    
              
                echo $obj->login;
                echo $obj->senha;
                    
            }*/
    
        }
        
        mysqli_close($this->conn);
        
    }
    


}
?>