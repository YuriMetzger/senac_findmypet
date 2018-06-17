<?php
require_once("IDAO.php");
class UserDAO extends IDAO {
    
    protected $table = 'user';
    
    private $user;
    private $email;
    private $password;
    private $phone;

    public function setUser($user){
        $this->user = $user;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function insert(){
        $sql  = "INSERT INTO ".$this->table." (username, password, phone, email) VALUES (:userName, :password, :phone, :email)";
        $stmt = DBConnection::prepare($sql);    
        $stmt->bindParam(':userName', $this->user);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        return $stmt->execute();
    }

}

?>
