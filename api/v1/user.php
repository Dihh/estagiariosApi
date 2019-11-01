<?php
header("Access-Control-Allow-Origin: *");

class users{
    public function login($con){
        
        $u = isset($_POST['user']) ? $_POST['user'] : '';
        $p = isset($_POST['password']) ? $_POST['password'] : '';
        
        
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

    public function cadastro($con){
        $u = isset($_POST['user']) ? $_POST['user'] : false;
        $p = isset($_POST['password']) ? $_POST['password'] : false;
        $n = isset($_POST['name']) ? $_POST['name'] : false;

        if(!$u || !$p || !$n){
            throw new Exception("Dados inválidos",1);
        }

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

    public function getSession($con){
        $t = isset($_POST['token']) ? $_POST['token'] : '';
        $sql =  "SELECT * FROM SESSION WHERE TOKEN = '$t'";
        $sql = $con->prepare($sql);
        $sql->execute();
        $num_rows = $sql->rowCount();
        if($num_rows > 0){

            $result = array();
            $result = getData($sql, $result);
            $USER = $result[0]['USER'];
            
            $sql =  "SELECT NOME FROM USERS WHERE ID = '$USER'";
            $sql = $con->prepare($sql);
            $sql->execute();
            $result = array();
            $result = getData($sql, $result);
            return $result;

        }else{
            throw new Exception("Erro de sessão",1);
        }

    }
}

?>