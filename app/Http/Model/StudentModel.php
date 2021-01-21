<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'student';

    protected $primaryKey = 'id';

    /**
     * 自动转换创建时间.
     * @param $value
     * @return false|string
     */
    protected function getCreateTimeAttribute($value)
    {
        return date('Y-m-d H:i:s', $value);
    }

    /**
     * 自动转换修改时间.
     * @param $value
     * @return false|string
     */
    protected function getUpdateTimeAttribute($value)
    {
        return date('Y-m-d H:i:s', $value);
    }
}
