<?php

class conexao extends mysqli
{
    protected $prefixo='BB_';
    public function connect(){
        parent::__construct('localhost','root','root','escola');
        if(mysqli_connect_error()){
            die("Erro ao se conectar com o banco. ".mysqli_connect_error());
        }
        if(!$this->set_charset('utf8')){
            die("Erro ao utilizar UTF-8");
        }
    }
    public function query($sql){
        $res=parent::query($sql);
        if($res){
            return $res;
        }
        else{
            die("Erro na query $sql.<br>Erro: ".$this->error);
        }
    }
    public function fetch_all($res,$type){
        $row=null;
        if($type=='assoc'){
            for($i=0;$i<mysqli_num_rows($res);$i++){
                $row[]=mysqli_fetch_assoc($res);
            }
            return $row;
        }
        else{
            for($i=0;$i<mysqli_num_rows($res);$i++){
                $row[]=mysqli_fetch_row($res);
            }
            return $row;
        }
    }
}
