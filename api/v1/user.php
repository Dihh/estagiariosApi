<?php

class users{
    public function login(){
        
        $u = isset($_POST['user']) ? $_POST['user'] : '';
        $p = isset($_POST['password']) ? $_POST['password'] : '';
        
        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        $sql =  "SELECT * FROM USERS WHERE USER = '$u' AND PASSWORD = '$p'";
        $sql = $con->prepare($sql);
        $sql->execute();
        $num_rows = $sql->rowCount();
        if($num_rows <= 0){
            throw new Exception("Usuário ou senha inválida",1);
        }

        $result = array();
        $result = getData($sql, $result);
        $USER = $result[0]['ID'];

        print_r($USER);

        $sql =  "SELECT * FROM SESSION WHERE USER = '$u'";
        $sql = $con->prepare($sql);
        $sql->execute();
        $num_rows = $sql->rowCount();

        $result = array();
        if($num_rows > 0){
            $result = getData($sql, $result);
            
        }else{
            $sql =  "INSERT INTO session (TOKEN,USER) VALUES ( MD5(NOW()), '$USER')";
            $sql = $con->prepare($sql);
            $sql->execute();

            $sql =  "SELECT * FROM SESSION WHERE USER = '$USER'";
            $sql = $con->prepare($sql);
            $sql->execute();
            $result = getData($sql, $result);
        }

        return $result;
    }

    public function cadastro(){
        $u = isset($_POST['user']) ? $_POST['user'] : false;
        $p = isset($_POST['password']) ? $_POST['password'] : false;
        $n = isset($_POST['name']) ? $_POST['name'] : false;

        if(!$u || !$p || !$n){
            throw new Exception("Dados inválidos",1);
        }

        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        $sql =  "SELECT * FROM USERS WHERE USER = '$u'";
        $sql = $con->prepare($sql);
        $sql->execute();
        $num_rows = $sql->rowCount();

        if($num_rows > 0){
            throw new Exception("Usuário já cadastrado",1);
        }

        $sql =  "INSERT INTO USERS (NOME,USER,PASSWORD) VALUES ('$n','$u','$p')";
        $sql = $con->prepare($sql);
        $sql->execute();

        $result = array();
        return $result;
        
    }
}

?>