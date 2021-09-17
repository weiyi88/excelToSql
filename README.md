# excelToSql
本脚本是用php和PHPEcel-1.8插件编写的，数据库连接是用mysqli，本脚本的功能是，将excel文件，自动入库


使用方法：
 
 一、链接数据库
  SQL\DB.php   中
  有个 $php_config 变量
  其中填写数据库连接信息
  
 二、Excel文件存放
  将Excel文件 存放到ExcelFile\目录下， 多重文件夹亦可存放
  
 三、执行脚本
  PHP版本应在 >= 7.1 版本
  然后执行命令 php Inter.php 
  
  
  Ps：
    重名的表，会在后面添加时间戳区分
    可以区分，int，string，datetime格式

