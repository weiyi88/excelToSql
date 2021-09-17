<?php
require "./Sql/DB.php";
require './Util/helper.php';

$db = DB::getIntance();

/*
$db->createTable('AringTest','test_')
    ->switchCreateSql(DB::STRING,'name',50,'姓名')
    ->switchCreateSql(DB::INT,'age',5,'年龄')
    ->switchCreateSql(DB::DATATIME,'create_at','','创建于')
    ->endCreateTable();*/


$db ->insert('test_AringTest','');