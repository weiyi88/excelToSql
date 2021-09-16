<?php

//判断是否时间格式
 function isDataTime($dataTime){
    $ret = strtotime($dataTime);
    return $ret !== false && $ret != -1;
}





?>