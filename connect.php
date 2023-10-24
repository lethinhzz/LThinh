<?php
class connect{
    public $server;
    public $dbname;
    public $username;
    public $password;

    public function __construct()
    {
        $this->server ="localhost";
        $this->username ="root";
        $this->password ="";
        $this->dbname ="shop_210202";

    }
    // option 1 mysqli
    function connectToMySQL():mysqli{
        $conn = new mysqli($this->server,
        $this->username,$this->password,$this->dbname);

        if($conn->connect_error){
            die("Failed".$conn->connect_error);
        }else{
            // echo"connect!";
        }
        return $conn;
    }
    // option 2 PDO
    function connectToPDO():PDO{
        try{
            $conn=new PDO("mysql:host=$this->server;
            dbname=$this->dbname",$this->username,
            $this->password);
            // echo"Connect! PDO";
        }catch(PDOException $e){
            die("Failded".$e);
        }
        return $conn;

    }
}
$c = new Connect();
$c->connectToPDO();
//$c->connectToMySQL();
?>