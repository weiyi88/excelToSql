<?php

require "./Sql/DB.php";
require "./Util/FileStrem.php";
require "./PHPExcel-1.8/Classes/PHPExcel.php";

const dir = "./ExcelFile";
$file_dir = new FileStrem();


//读取文件流 获取文件绝对路径
$file_dir->ReadDir(dir,function ($file_paht){
    // 闭包 函数处理
    $path_parts = pathinfo($file_paht);
    $tableName = $path_parts['filename'];   //获取表名

    try {
        $objPHPExcel = PHPExcel_IOFactory::load($file_paht);
        $db = DB::getIntance();

        //全部读取
        $sheetCount = $objPHPExcel->getSheetCount();    //获取excel有多少个sheet
        $name = $objPHPExcel->getSheetNames();          // 获取sheet名
        $db->beTransaction();
        for ($i = 0 ; $i<$sheetCount; $i++){
            $data = $objPHPExcel->getSheet($i)->toArray();
            //读取每个 sheet 数据，放入数组
           $title =$data[0];
           unset($data[0]);


           //建表
            $db=$db->createTable($tableName);
           foreach ($title as $k => $v){
                   $db->switchCreateSql($data[1][$k],$v,'',$v);
           }
           $db->endCreateTable();

           //导入数据
            foreach ($data as $k =>$v){
                $interData=array_combine($title,$v);
                $db->insert($tableName,$interData);
                if (!$db->affected_rows()){
                    // 回滚
                    $db->rollback();
                }
            }
            $db->commit();
        }

    }catch (\ErrorException $e){
        echo   $e->getMessage();
        exit;
    }
});

