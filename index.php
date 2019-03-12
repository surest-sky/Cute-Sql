<?php
/**
 * Created by PhpStorm.
 * User: surest
 * Date: 2019/3/11
 * Time: 20:42
 */

require_once './vendor/autoload.php';

use Surest\Csql\Csql;

$z = new Csql();

//$z->showDatabase();
//$z->showTable();
//$z->showColumn('test2');

//$r = $z->showCreateTable('test');
//$r = $z->showTableStatus('test');
//$r = $z->importSql('2');
//$r = $z->exportSql('test2');
$r = $z->exportDatabase();

