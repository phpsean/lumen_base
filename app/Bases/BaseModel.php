<?php
/**
 * @method onWriteConnection
 * User: Sean
 * Date: 2020/10/29
 * Time: 16:45
 */

namespace App\Bases;


use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * 防止查询出来的created_at、updated_at格式为UTC格式
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->getDateFormat());
    }

    /**
     * 强制使用主库连接
     * @return mixed
     */
    static public function write()
    {
        $class = get_called_class();
        $model = new $class;
        return $model::onWriteConnection();
    }
}
