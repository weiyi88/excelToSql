<?php


class FileStrem {

    public function ReadDir($dir, $fun){
        if ($handle = opendir($dir)){     // 获取一个目录流
            while (false !== ($file = readdir($handle))){   // 返回目录中下一个文件的文件名 ，成功返回文件名，否返回FALSE
                if ($file == '.' || $file == ".." || $file == '.DS_Store')continue;     //跳过这两个文件 , .DS_Store 是mac自动生成的
                $sub_dir = realpath($dir."/$file");   //返回该路径的绝对路径
                if (is_dir($sub_dir)) {
                    //是目录就递归调用
                    echo "这是目录，路径为".$dir.'\\'.$file.'<br/>';
                    $this->ReadDir($sub_dir,$fun);
                }else{
                    $fun($sub_dir);
                }
            }
        }
    }
}