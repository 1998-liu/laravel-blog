<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function info($id)
    {
//        return 'memberInfo-id-' . $id;
//        return route('memberInfo');
        return view('member/info', [
            'name' => 'James',
            'age'  => 19,
        ]);
    }
}
