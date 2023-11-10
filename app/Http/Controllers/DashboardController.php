<?php

namespace App\Http\Controllers;

use App\Traits\UserUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    use UserUtility;
    public function index(Request $request)
    {
        $session = session();
        $logdata = $session->get("loginData");

        $designation = DB::select("select count(id) as desig_no from tbl_designation ")[0];
        $designation = json_decode(json_encode($designation), true);

        $user = DB::select('select count(id) as emp_no from tbl_employee ')[0];
        $user = json_decode(json_encode($user), true);

        $visitor = DB::select('select count(id) as visitor_no from tbl_visitor ')[0];
        $visitor = json_decode(json_encode($visitor), true);

        $visitor_list = DB::select('select t1.*,t2.name as emp_name
                    from tbl_visitor t1
                    left join tbl_employee t2 on t2.id = t1.appointment_with');
        $visitor_list = json_decode(json_encode($visitor_list), true);
        return view('dashboard',['designation'=>$designation,'user'=>$user,'visitor'=>$visitor,'visitor_list'=>$visitor_list]);
    }

}
