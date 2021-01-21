<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
    }

    /**
     * 获取学生信息列表.
     */
    public function getStudentList()
    {
//        $list = DB::select('select * from student');  //list类型为数组

        //查询多条数据用get，单条数据用first
//        $list = DB::table('student')
//            ->where('name', '黎明')
//            ->select('name', 'age', 'sex', 'create_time')
//            ->get()
//            ->map(function ($value) {
//                return (array) $value;
//            })
//            ->toArray();
//
//        foreach ($list as $key => $item) {
//            $list[$key]['sex'] = $this->turnSex($item['sex']);
//            $list[$key]['create_time'] = $this->turnTime($item['create_time']);
//        }
//        dump($list);

        //获取单列数据集合
//        $list = DB::table('student')->pluck('name');
        //获取键名为id，键值为name的数据集合
//        $list = DB::table('student')->pluck('name', 'id');
//        dump($list);

        //使用chunk方法必须搭配上orderBy
        DB::table('student')->orderBy('id', 'desc')->chunk(2, function ($students) {
            dump($students);
        });
    }

    /**
     * 新增学生
     */
    public function addStudent()
    {
        $id = DB::table('student')->insertGetId([
            'name'        => '张学友',
            'age'         => '24',
            'sex'         => '0',
            'create_time' => time(),
            'update_time' => time(),
        ]);
        dump($id);
    }

    /**
     * 更新学生数据.
     */
    public function updateStudent()
    {
        $count = DB::table('student')->where('id', '1')->update(['age' => 20]);
        dump($count);

        //年龄自增2
        $count1 = DB::table('student')->increment('age', 2);
        dump($count1);

        //年龄自减3
        $count2 = DB::table('student')->decrement('age', 3);
        dump($count2);

        //年龄自减3,同时修改姓名
        $count3 = DB::table('student')->where('id', 2)
            ->decrement('age', 3, ['name' => '李冰冰']);
        dump($count3);
    }

    /**
     * 转换时间.
     * @param $timestamp
     * @return false|string
     */
    private function turnTime($timestamp)
    {
        return date('Y-m-d H:i:s', $timestamp);
    }

    /**
     * 转换性别.
     * @param $sex_code
     * @return string
     */
    private function turnSex($sex_code)
    {
        $sex = '';
        switch ($sex_code) {
            case 0:
                $sex = '男';
                break;
            case 1:
                $sex = '女';
                break;
        }

        return $sex;
    }
}
