<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    // Add edit delete News

    public function visitor_dtl()
    {
        $employee = DB::select('select t1.*, t2.designation_name
                        from tbl_employee t1
                        left join tbl_designation t2 on t2.id = t1.designation_id
                        where t1.status=1');
        $employee = json_decode(json_encode($employee), true);
        return view('visitor_dtl', ['employee' => $employee]);
    }


    public function visitor_dtl_add(Request $request)
    {
        // dd($request->all());
        // dd(date('H:i:s'));

        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'gender' => 'required',
            'age' => 'nullable|numeric',
            'mobile_no' => 'required|numeric|digits:10',
            'aadhar_no' => 'required|numeric|digits:12|regex:/^[4-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/',
            'company_name' => 'required|string|min:5|max:255',
            'appointment_with' => 'required',
            'meeting_date' => 'required|date|after_or_equal:' . date('Y-m-d'),
            'time_from' => 'required|after_or_equal:' . date('H:i:s'),
            'time_to' => 'required|after:time_from',
            'purpose' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ], [
            'time_from.after_or_equal' => 'The time from must be after or equal to 09:34:57.',
            'time_to.after' => 'The time to must be after time from.'
        ]);

        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $age = $request->age;
        $mobile_no = $request->mobile_no;
        $aadhar_no = $request->aadhar_no;
        $company_name = $request->company_name;
        $appointment_with = $request->appointment_with;
        $meeting_date = $request->meeting_date;
        $time_from = $request->time_from;
        $time_to = $request->time_to;
        $meeting_time = $time_from . " - " . $time_to;
        $purpose = $request->purpose;
        $address = $request->address;

        $id = DB::table('tbl_visitor')->insertGetId(
            [
                'name' => $name, 'email' => $email, 'gender' => $gender, 'age' => $age, 'aadhar_no' => $aadhar_no, 'company_name' => $company_name,
                'address' => $address, 'mobile' => $mobile_no, 'meeting_date' => $meeting_date, 'meeting_time' => $meeting_time, 'purpose' => $purpose, 'appointment_with' => $appointment_with
            ]
        );
        $visitor_id = "vms" . time();
        if ($id != "") {
            DB::update("update tbl_visitor set visitor_id ='" . $visitor_id . "' where id=" . $id);
            return redirect('/visitor_pass/' . $id);
        } else {
            return back()->with('alert', 'We deduct some error, so please try again');
        }
    }


    public function visitor_pass($id)
    {
        $visitor_pass = DB::select('select t1.*, t2.name as emp_name,t3.designation_name
                        from tbl_visitor t1
                        left join tbl_employee t2 on t2.id = t1.appointment_with
                        left join tbl_designation t3 on t3.id = t2.designation_id
                        where t1.id=' . $id)[0];
        $visitor_pass = json_decode(json_encode($visitor_pass), true);
        return view('visitor_pass', ['visitor_pass' => $visitor_pass]);
    }


    public function visitor_status_form()
    {

        return view('visitor_status');
    }


    public function visitor_status_check(Request $request)
    {
        $visitor_id = $request->visitor_id;
        $visitor_pass = DB::select("select t1.*, t2.name as emp_name,t3.designation_name
                        from tbl_visitor t1
                        left join tbl_employee t2 on t2.id = t1.appointment_with
                        left join tbl_designation t3 on t3.id = t2.designation_id
                        where t1.visitor_id='" . $visitor_id . "'")[0];
        $visitor_pass = json_decode(json_encode($visitor_pass), true);
        //dd($visitor_pass);
        return view('visitor_pass', ['visitor_pass' => $visitor_pass]);
    }
}
