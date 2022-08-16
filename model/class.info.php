<?php

//password_hash - criptografa
require_once('class.dao.php');
Class Info extends Dao{
    
    private $camp1;
    private $camp2;
    private $camp3;



    public function setCamp1($camp1){
        $this->camp1 = $camp1;
    }
    public function getCamp1(){
        return $this->camp1;
    }
    public function setCamp2($camp2){
        $this->camp2 = $camp2;
    }
    public function getCamp2(){
        return $this->camp2;
    }
    public function setCamp3($camp3){
        $this->camp3 = $camp3;
    }
    public function getCamp3(){
        return $this->camp3;
    }
}
?>