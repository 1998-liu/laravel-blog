<?php

namespace app\Http\Controllers\Member;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function info($id)
    {
        return 'memberInfo-id-' . $id;
//        return route('memberInfo');
    }
}