<?php

class users{
    public function login(){
        
        if(!isset($_PSOT['user'])){
            throw new Exception("Usuário não foi encontrado",1);
        }

        if(!isset($_PSOT['password'])){
            throw new Exception("Senha incorreta",1);
        }

        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        $sql =  "SELECT * FROM USERS";
        $sql = $con->prepare($sql);
        $sql->execute();

        $result = array();
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            
            foreach ($row as $key => &$value) {
                if(is_a($value, 'DateTime')){
                    $value = date_format($value, 'Y-m-d');
                }
            }
            
            $result[] = $row;
            
        }

        if(!$result){
            throw new Exception("Error processing request",1);
        }
        
        return $result;
    }
}

?>