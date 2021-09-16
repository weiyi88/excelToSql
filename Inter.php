<?php

require "./Sql/DB.php";
require "./Util/FileStrem.php";


const dir = "./ExcelFile";
$file_dir = new FileStrem();


//读取文件流 获取文件绝对路径
$file_dir->ReadDir(dir,function ($dir_paht){
    // 闭包 函数处理

});

//数据库操作
//$db = DB::getIntance();
