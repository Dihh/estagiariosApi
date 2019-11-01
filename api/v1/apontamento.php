<?php
header("Access-Control-Allow-Origin: *");
class apontamentos{
    public function setApontamento(){
        $c = isset($_POST['chegada']) ? $_POST['chegada'] : NULL;
        $a = isset($_POST['almoco']) ? $_POST['almoco'] : NULL;
        $s = isset($_POST['saida']) ? $_POST['saida'] : NULL;
        $t = isset($_POST['token']) ? $_POST['token'] : '';
        $d = isset($_POST['data']) ? $_POST['data'] : false;

        if(!$d){
            throw new Exception("Data inválida",1);
        }

        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        $sql =  "SELECT * FROM SESSION WHERE TOKEN = '$t'";
        $sql = $con->prepare($sql);
        $sql->execute();
        $num_rows = $sql->rowCount();
        if($num_rows > 0){
            
            $result = array();
            $result = getData($sql, $result);
            $USER = $result[0]['USER'];
            

            $sql =  "SELECT * FROM APONTAMENTOS WHERE USER = '$USER' AND DATA = '$d'";
            $sql = $con->prepare($sql);
            $sql->execute();
            $num_rows = $sql->rowCount();
            if($num_rows > 0){
                $sql =  "UPDATE apontamentos SET ALMOCO = '$a', CHEGADA = '$c', SAIDA = '$s' WHERE USER = '$USER' AND DATA = '$d'";
                $sql = $con->prepare($sql);
                $sql->execute();
            }else{
                $sql =  "INSERT INTO apontamentos (USER, DATA, CHEGADA, ALMOCO, SAIDA) VALUES ('$USER', '$d', '$c', '$a', '$s')";
                $sql = $con->prepare($sql);
                $sql->execute();
            }

            $sql =  "SELECT * FROM APONTAMENTOS WHERE USER = '$USER' AND DATA = '$d'";
            
            $sql = $con->prepare($sql);
            $sql->execute();
            $result = array();
            $result = getData($sql, $result);
            return $result;
        }else{
            throw new Exception("Erro de sessão",1);
        }
    }

    public function getApontamento(){
        $t = isset($_POST['token']) ? $_POST['token'] : '';
        $d = isset($_POST['data']) ? $_POST['data'] : false;
        if(!$d){
            throw new Exception("Data inválida",1);
        }
        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        $sql =  "SELECT * FROM SESSION WHERE TOKEN = '$t'";
        $sql = $con->prepare($sql);
        $sql->execute();
        $num_rows = $sql->rowCount();
        if($num_rows > 0){
            $result = array();
            $result = getData($sql, $result);
            $USER = $result[0]['USER'];
            $sql =  "SELECT * FROM APONTAMENTOS WHERE USER = '$USER' AND DATA = '$d'";
            
            $sql = $con->prepare($sql);
            $sql->execute();
            $result = array();
            $result = getData($sql, $result);
            return $result;
        }else{
            throw new Exception("Erro de sessão",1);
        }
    }

    public function historicoApontamento(){
        $t = isset($_POST['token']) ? $_POST['token'] : '';
        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        $sql =  "SELECT * FROM SESSION WHERE TOKEN = '$t'";
        $sql = $con->prepare($sql);
        $sql->execute();
        $num_rows = $sql->rowCount();
        if($num_rows > 0){
            $result = array();
            $result = getData($sql, $result);
            $USER = $result[0]['USER'];
            $sql =  "SELECT * FROM APONTAMENTOS WHERE USER = '$USER'";
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

//INSERT INTO `apontamentos` (USER, DATA, CHEGADA, ALMOCO, SAIDA) VALUES ('1', '2019-11-01', '09:00:00', '19:00:00', '21:00:00');
//UPDATE `apontamentos` SET `ALMOCO` = '19:12:00' WHERE `apontamentos`.`ID` = 1;