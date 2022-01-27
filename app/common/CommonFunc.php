<?php

namespace App\common;

class CommonFunc{

    public function apiNullValidate(Array $array): bool
    {
        foreach($array as $check){
            if($check === ''){
                return false;
            }
        }
        return true;
    }

    public function apiIntegerChecker($int): bool
    {
        if(!is_numeric($int)){
            return false;
        }
        return true;
    }
}
