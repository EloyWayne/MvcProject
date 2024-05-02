<?php
class User { 
    private $username; 
    private $password; 

    public function __construct($username, $password) { 
        $this->username = $username; 
        $this->password = $password; 
    } 

    public function isValid() { 
        return $this->username === 'Admin' && $this->password === '123456'; 
    } 

} 

?>
