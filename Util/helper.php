<?php


class helper
{

    public static function isDataTime($dataTime){
        $ret = strtotime($dataTime);
        return $ret !== false && $ret != -1;
    }
}