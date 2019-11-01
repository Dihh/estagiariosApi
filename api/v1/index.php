<?php
header("charset=utf-8");
// header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
require_once 'user.php';
require_once 'apontamento.php';

class Rest{
    public static function open($requisicao){
        $url = explode('/',$_REQUEST['url']);
        
        $classe = ucfirst($url[0]);
        array_shift($url);

        $metodo = $url[0];
        array_shift($url);

        $parametros = array();
        $parametros = $url;
        $con = new PDO('mysql: host=localhost; dbname=estagiarios','root','');
        
        try{
        if(class_exists($classe)){
            
            if(method_exists($classe, $metodo)){
                $ret = call_user_func_array(array(new $classe, $metodo),array('param'=>$con));
                return (array('status'=>'sucesso','dados'=>$ret));
            }else{
                return (array('status'=>'error','dados'=>'Método Inexistente'));    
            }
        }else{
            return (array('status'=>'error','dados'=>'Classe Inexistente'));
        }
        }catch(Exception $e){
            return (array('status'=>'error','dados'=>$e->getMessage()));
        }
    }
}

function unicodeDecode($value){
	$value = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
		return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
	}, $value);
	return $value;
}

function getData($sql, $arr){
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            
        foreach ($row as $key => &$value) {
            if(is_a($value, 'DateTime')){
                $value = date_format($value, 'Y-m-d');
            }
        }
        
        $arr[] = $row;
        
    }
    return $arr;
}


if(isset($_REQUEST)){
    echo(unicodeDecode(json_encode(Rest::open($_REQUEST), JSON_PRETTY_PRINT)));
}