<?php
/**
 * Created by PhpStorm.
 * User: surest
 * Date: 2019/3/10
 * Time: 18:16
 */

namespace Surest\Csql;


class Chelper
{
    protected $data;

    const instance = null;

    /**
     * 通过获取到底pdo实例获取相关的参数
     *
     * @param $result
     * @return Chelper
     */
    public static function toArray($result)
    {
        $data = [];

        if( !$result ) {
            throw new \Exception('请检查表或者数据库是否存在');
        }

        foreach ($result as $key => $val) {
            foreach ($val as $k => $v) {
                if( is_string($k) ) {
                    $data[$key][$k] = $v;
                }
            }
        }
        $helper = self::getInstance();
        $helper->data = $data;

        return $helper;
    }

    /**
     * 获取相关参数
     *
     * @param string $str
     * @return mixed
     */
    public function get(string  $str = null)
    {
        if( is_null($str) ) {
            return $this->data;
        }

        $data = [];

        foreach ($this->data as $value) {
            $data[] = $value[$str];
        }

        return $data;
    }

    /**
     * 获取当前类实例
     *
     * @return Chelper|null
     */
    public static function getInstance()
    {
        if( is_null(self::instance) ) {
            return new static();
        }
        return self::instance;
    }


    public static function display(array $data)
    {
        $instance = self::getInstance();
        $instance->data = $data;

        return $instance;
    }
}
