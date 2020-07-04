<?php
/**
 * Created by PhpStorm.
 * User: leilay
 * Date: 2018/1/3
 * Time: 16:51
 */
namespace Base\Traits;
trait BaseModelTraits
{
    use ArrayObjectAccess;
    protected static $table = '';
    protected static $self = null;
    protected static $pdo;
    protected static $config;
    protected $select = '*';
    protected $where = null;
    protected $where_key = [];
    protected $where_join_key = [];
    protected $group = null;
    protected $orderBy = null;
    protected $offSet = null;
    protected $limit  = 1;
    protected $count   = null;
    protected $exec_sql = null;
    protected $primaryKey = 'id';


    /**
     * 设置查询属性
     * @param $name
     * @param $value
     * @return $this
     */
    public function setAttributes($name,$value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * 获取查询数据
     * @return null
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * 访问不存在的静态和无权限的方法时候调用
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name,$arguments)
    {
        $ob = self::query();
        return $ob->$name(...$arguments);
    }

    /**
     * 访问不存在的无权限的方法时候调用
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->$name(...$arguments);
    }


}