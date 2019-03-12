<?php
/**
 * Created by PhpStorm.
 * User: surest
 * Date: 2019/3/10
 * Time: 17:36
 */

namespace Surest\Csql;

class Csql
{
    protected $link ;

    protected $database = null;

    protected $file_path = __DIR__ . DIRECTORY_SEPARATOR . 'back' . DIRECTORY_SEPARATOR;

    protected $file_name;

    public function __construct()
    {
        $pdo = new Cpdo();
        $this->link = $pdo->link;
        $this->link->query('set names utf8;');
        $this->database = $pdo->database;
    }

    /**
     * 查看下属服务器下的所有数据库
     *
     * @return array
     */
    public function showDatabase() :array
    {
        $result = $this->link->query("SHOW DATABASES");

        $result = Chelper::toArray($result)->get('Database');

        return $result;
    }

    /**
     * 查看对应数据库下的所有数据表
     *
     * @param string $name 数据库名称
     * @return array
     */
    public function showTable() :array
    {
        $result = $this->link->query("SHOW TABLES");

        $result = Chelper::toArray($result)->get('Tables_in_test');

        return $result;
    }

    /**
     * 查看对应数据列的详细信息
     *
     * @param string $name 数据表名称
     * @return array
     */
    public function showColumn(string $name): array
    {
        $result = $this->link->query("desc {$name}");

        $result = Chelper::toArray($result)->get();

        return $result;
    }


    /**
     * 查看创建数据表信息
     *
     * @param string $tableName
     * @return string
     */
    public function showCreateTable(string $tableName): string
    {
        $result = $this->link->query("show create table {$tableName}");

        $result = Chelper::toArray($result)->get('Create Table');

        return $result[0];
    }


    /**
     * 查看表的详细信息
     *
     * @param string|null $database 查看指定表
     * @return array
     */
    public function showTableByDatabase(string $database = null): array
    {
        if( !is_null($database) ) {
            $result = $this->link->query("show table status from {$database}");
        }elseif(!is_null($this->database)) {
            $result = $this->link->query("show table status from {$this->database}");
        }else{
            $result = $this->link->query("show table status");
        }

        $result = Chelper::toArray($result)->get();

        return $result;
    }

    /**
     * 查看表索引信息
     *
     * @param string|null $table
     * @return false|mixed|\PDOStatement
     * @throws \Exception
     */
    public function showTableIndex(string $tableName = null)
    {
        if(is_null($tableName)) throw new Exception('请输入表名称');

        $result = $this->link->query("show index from {$tableName}");

        $result = Chelper::toArray($result)->get();

        return $result;
    }


    /**
     * 导出表结构
     *
     * @param string $tableName 表名称
     */
    public function exportSql(string $tableName, bool $to = true)
    {
        $sqlStr = "\r\nSET FOREIGN_KEY_CHECKS = 0;\r\n\n";
        $sqlStr .= "-- Surest 导出;  导出时间：" . date('Y-m-d H:i:s', time()) . "\r\n\r\n";
        $sqlStr .= "DROP TABLE IF EXISTS `{$tableName}`;\r\n";
        $sqlStr .= $this->showCreateTable($tableName) . ";\r\n\r\n";
        $columns = Chelper::display($this->showColumn($tableName))->get('Field');
        $columns = join('`,`', $columns);
        $columns = "`" . $columns . "`";

        $data = $this->link->query("SELECT * FROM {$tableName}");

        $data = Chelper::toArray($data)->get();
        $insert_sql = '';
        foreach ($data as $value) {
            $value = join("','", $value);
            $value = "'" . $value . "'";
            $insert_sql .= "INSERT INTO `{$tableName}` ($columns) values($value); \r\n";
        }

        $sqlStr .= $insert_sql . "\r\n\n";

        $this->file_name = $tableName;

        if( $to ) {
            # 写入数据
            file_put_contents($this->getFile(), $sqlStr);
            echo "导入成功 - file: " . $this->file_name;
        }else{
            return $sqlStr;
        }
    }


    /**
     * 获得一个文件地址
     *
     * 设置文件储存地址
     */
    public function getFile()
    {
        if( !is_dir($this->file_path) ) {
            mkdir($this->file_path);
        }

        $file = $this->file_path . DIRECTORY_SEPARATOR . $this->file_name . '.sql';

        if( !is_file($file) ) {
            $handler = fopen($file, 'w');
            fclose($handler);
        }

        return $file;
    }


    /**
     * 导入sql文件
     *
     * @param string $sql
     */
    public function importSql(string $filePath)
    {
        if( !is_file($filePath) ) {
            throw new \Exception($filePath . "不是一个文件");
        }

        $ext = pathinfo($filePath, PATHINFO_EXTENSION);

        if( !in_array($ext, ['sql']) ) {
            throw new \Exception($filePath . "必须是一个sql文件");
        }

        $sqlStr = file_get_contents($filePath);
        $this->link->query($sqlStr);

        echo "导入成功\r\n";
    }

    /**
     * 导出数据表
     *
     * 只能导出当前连接服务器的数据库
     */
    public function exportDatabase()
    {
        $tables = $this->showTable();
        $sqlStr = '';

        foreach ($tables as $table) {
            $sqlStr .= $this->exportSql($table, false) . "\r\n";
        }

        $this->file_name = $this->database . '_database';

        file_put_contents($this->getFile(), $sqlStr);

        echo "导入成功 - file: " . $this->file_name . '.sql';
    }
}
