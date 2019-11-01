<?php

class user{
    public function login(){
        
        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        $sql =  "SELECT * FROM USERS";
        $sql->execute();

        $result = array();
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }

        if(!$result){
            throw new Exception("Error processing request",1);
        }
        
        return $result;
    }
}

?>