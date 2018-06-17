<?php
class DBConnection {
    
    private static $conn;
    
    public function connect(){
        try{
            self::$conn = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function prepare($sql){
        return $this->connect()->prepare($sql);
    }
}
?>
