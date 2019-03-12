## 这是一个 `PHP + MWysql` 的导入导出的扩展包


- composer 安装

    composer require surest/cut-sql
    
- git 安装

    git clone git@github.com:surest-sky/Cute-Sql.git


### 使用方法

    require_once './vendor/autoload.php';
    
    use Surest\Csql\Csql;
    
    $csql = new Csql();
    
    
> 基于 PDO ， 实现的功能如下 


- 查看当前服务器下的所有数据库

    $csql->showDatabase();
    
- 查看对应数据库下的所有数据表

    $csql->showTable();
    
- 查看对应数据列的详细信息

    $csql->showColumn($table);

- 查看数据表结构信息

    $csql->showCreateTable($tableName);
    
- 查看指定数据库的所有表

    # 当 $database 不存在时间， 默认为 Cdpo.php 中设置的参数值
    $csql->showTableByDatabase($database);
    
- 查看表的索引信息

    $csql->showTableIndex($tableName);
    
- 导出表

    |字段|类型|说明|
    |-------|-------|-------|
    | $tableName | string | 表名称 |
    | $bol | bool | 是否获取字符串还是直接导出表结构至文件中 |
    
    $csql->exportSql($tableName);
    
- 导入表

    $csql->importSql($filePath);
    
- 导出当前数据库至文件中

    $csql->exportDatabase();
    
    
配置文件暂时保存在 `Cpdo.php` 后续会增加功能迭代，使用前请阅读 `Cpdo.php`


### 即将迭代的版本如下

- 增添 `thinkphp` 、 `laravel` 命令行下的输入输出， 类似thinker

- 耦合 `laravel` 的配置， Fade、Provider

- 以配置文件的形式读取配置，不需要进行手动输入配置信息

- 将针对到处的文件进行命令行输入决定 


## License
    
MIT
