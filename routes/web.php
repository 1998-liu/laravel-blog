<?php


use Illuminate\Foundation\Application;

Route::get('/', function () {
    return view('welcome');
});

//基本路由
Route::get('laravel-version', function () {
    $laravel = new Application();
    dump('Your Laravel version is ' . $laravel::VERSION);
});

//路由参数(id必填，name选填)
Route::get('user/{id}/{name?}', function ($id, $name = 'Jame') {
    return 'user-id-' . $id . '-name-' . $name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//路由别名
//Route::get('master/member-center', ['as' => 'center', function () {
//    return route('center');
//}]);

//路由群组
Route::group(['prefix' => 'member'], function () {
    Route::get('master/member-center', ['as' => 'center', function () {
        return route('center');
    }]);

    Route::any('test', function () {
        return 'member-test';
    });
});

//路由绑定控制器
//Route::get('member/info', 'Member\MemberController@info');

//Route::get('member/info', ['uses' => 'Member\MemberController@info']);

//Route::get('member/info', [
//    'uses' => 'Member\MemberController@info',
//    'as'   => 'memberInfo',
//]);

//查询构造器
Route::any('student/studentList', ['uses' => 'Student\StudentController@getStudentList']);
Route::any('student/addStudent', ['uses' => 'Student\StudentController@addStudent']);
Route::any('student/updateStudent', ['uses' => 'Student\StudentController@updateStudent']);

Route::any('member/{id}', [
    'uses' => 'Member\MemberController@info',
])->where(['id' => '[0-9]+']);
