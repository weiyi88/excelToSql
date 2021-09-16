<?php

require "./Sql/DB.php";
require "./Util/FileStrem.php";
require "./PHPExcel-1.8/Classes/PHPExcel.php";
require "./Util/Helper.php";

const dir = "./ExcelFile";
$file_dir = new FileStrem();





//读取文件流 获取文件绝对路径
$file_dir->ReadDir(dir,function ($file_paht){
    // 闭包 函数处理

    try {
        $objPHPExcel = PHPExcel_IOFactory::load($file_paht);

        $db = DB::getIntance();

        /*//部分加载
        $file_type=PHPExcel_IOFactory::identify($filename);//自动获取文件类型，提供给phpexcel用
        $objRread=PHPExcel_IOFactory::createReader($file_type);//获取文件读取操作对象
        //选择加载哪个sheet
        $sheetName='2年级';
        $objRread->canRead($sheetName);//只加载指定的sheet
        $objPHPExcel=$objRread->load($filename);//加载文件*/

        //全部读取
        $sheetCount = $objPHPExcel->getSheetCount();    //获取excel有多少个sheet
        for ($i = 0 ; $i<$sheetCount; $i++){
            $data = $objPHPExcel->getSheet($i)->toArray();
            //读取每个 sheet 数据，放入数组


        }

        //逐行读取
        /* foreach ($objPHPExcel->getWorksheetIterator() as $sheet){
             //逐行读取sheet
             foreach ($sheet->getRowIterator()as $row){
                 //逐行处理
                 if ($row->getRowIndex()<2){
                     //跳过题目
                     continue;
                 }
                 foreach ($row->getCellIterator()as $cell){
                     //逐列读取
                     $data=$cell->getValue();//获取单元格数据
                     echo $data."";
                     echo PHP_EOL;
                 }
                 echo "<br>";
             }
             echo "<br>";
         }*/


    }catch (\ErrorException $e){
        echo   $e->getMessage();
        exit;
    }
});

