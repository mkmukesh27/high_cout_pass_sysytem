<?php

namespace App\Http\Controllers;

use App\Services\Repo\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*private $userRepo;
    function __construct(UserRepo $userRepo){
        $this->userRepo = $userRepo;
    }
*/
    public function login()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = array();
        $username = $request->username;
        $password = $request->password;
        //print_r($password);die();
        $user_id = DB::table('tbl_users')
                ->select('tbl_users.*')
                ->where('email',$username)
                ->where('password', $password)
                ->first();
        $result = json_decode(json_encode($user_id), true);
        //print_r($result);die();
        if (!$result) {
            return redirect("login")->withErrors('Login details are not valid');
        }else{
            $loginData = $result; 
            $session = session();
            $session->put("loginData", $loginData);
            //$logdata = $session->get("loginData");
            //dd($session->get("loginData"));
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }
    }


    public function logout()
    {
        
        Session::flush();  
        return Redirect('login');
    }



    // Add edit delete Designation

    public function designation_list() {
        $designation = DB::select("select * from tbl_designation ");
        $designation = json_decode(json_encode($designation), true);
        return view('home/Master/designation_list', ['designation' => $designation]);
    }

    public function designationForm($id=null) {
        if ($id!=""){
            $designation = DB::table('tbl_designation')
                        ->select('*')
                        ->where('id',$id)
                        ->get()[0];
            //$department = DB::select("select * from tbl_department where id='".$id."'")[0];
            $editdesignationdata = json_decode(json_encode($designation), true);
            return view('home/Master/designation', ['editdesignationdata' => $editdesignationdata]);
        }else{
            
            return view('home/Master/designation', ['editdesignationdata' => ""]);
        }
        
    }

    public function add_update_designation(Request $request) {
        
        $designation_name = $request->designation_name;
        $designation_id = $request->designation_id;
        $designation_status = $request->designation_status;
        if($designation_id!=""){
            DB::table('tbl_designation')
            ->where('id',$designation_id)
            ->update(['designation_name'=>$designation_name,'status'=>$designation_status]);
            
            return redirect('/home/designation_list');
        }else{
            DB::insert("INSERT INTO tbl_designation(designation_name,status) VALUES (?,?)", [$designation_name,$designation_status]);
            return redirect('/home/designation_list');
        }
    }




    // Add edit delete Category

    public function category_list() {
        $category = DB::select('select * from tbl_category where status=1');
        $category = json_decode(json_encode($category), true);
        return view('home/Master/category_list', ['category' => $category]);
    }

    public function categoryForm($id=null) {
        if ($id!=""){
            $category = DB::table('tbl_category')
                        ->select('*')
                        ->where('id',$id)
                        ->get()[0];
            $editcategorydata = json_decode(json_encode($category), true);
            return view('home/Master/category', ['editcategorydata' => $editcategorydata]);
        }else{
            return view('home/Master/category', ['editcategorydata' => ""]);
        }
    }

    public function add_update_category(Request $request) {
        
        $category_name = $request->category_name;
        $category_id = $request->category_id;
        if($category_id!=""){
            DB::table('tbl_category')
            ->where('id',$category_id)
            ->update(['category_name'=>$category_name]);
            
            return redirect('/home/category_list');
        }else{
            DB::insert("INSERT INTO tbl_category(category_name) VALUES (?)", [$category_name]);
            return redirect('home/category_list');
        }
       
    }


    public function categoryDelete($id) {
        DB::table('tbl_category')
        ->where('id',$id)
        ->update(['status'=>0]);
        return redirect('/home/category_list');
    }



    

     // Add edit delete User

    public function user_list() {
        $user = DB::select('select t1.*,t5.designation_name
                    from tbl_employee t1
                    left join tbl_designation t5 on t5.id = t1.designation_id');
        $user = json_decode(json_encode($user), true);
        //dd($user);
        return view('home/User/user_list', ['user' => $user]);
    }

    public function add_edit_userform($id=null) {
        $designation = DB::select("select * from tbl_designation");
        $designation = json_decode(json_encode($designation), true);
        if ($id!=""){
            $user = DB::table('tbl_employee')
                        ->select('*')
                        ->where('id',$id)
                        ->get()[0];
            $edituserdata = json_decode(json_encode($user), true);
            return view('home/User/add_edit_user', ['edituserdata' => $edituserdata,'designation'=>$designation]);
        }else{
            return view('home/User/add_edit_user', ['edituserdata' => "",'designation'=>$designation]);
        }
        
    }

    public function add_update_user(Request $request) {
        
        $session = session();
        $logdata = $session->get("loginData");
        
        $name = $request->name;
        $email = $request->email;
        $mobile_no = $request->mobile;
        $password = $request->password;
        $gender = $request->gender;
        $designation = $request->designation_id;
        $age = $request->age;
        $address = $request->address;
        $image = $request->image;
        $user_id = $request->user_id;
        
        if($user_id!=""){
            DB::update("update tbl_employee set name='".$name."',email='".$email."',mobile='".$mobile_no."',password='".$password."',gender='".$gender."',designation_id='".$designation."',age='".$age."',address='".$address."',created_by='".$logdata['id']."' 
            where id=".$user_id);

            if($image!=""){
                $input['image'] = time().'.'.$request->image->extension();
                if($request->image->move(public_path('assets/profile_pic'), $input['image'])){
                    DB::update("update tbl_employee set photo ='".$input['image']."' where id=".$user_id);
                    
                }
            }
            return redirect('/home/user_list');
        }else{
           
            $id = DB::table('tbl_employee')->insertGetId(
                ['name' => $name,'email' => $email,'mobile' => $mobile_no,'password' => $password,
                'designation_id' => $designation,'gender' => $gender,'age' => $age,'address' => $address,'created_by' => $logdata['id']]
            );
            if($id!=""){
                if($image!=""){
                    $input['image'] = time().'.'.$request->image->extension();
                    if($request->image->move(public_path('assets/profile_pic'), $input['image'])){
                        DB::update("update tbl_employee set photo ='".$input['image']."' where id=".$id);
                        
                    }
                }
                return redirect('/home/user_list');
            }else{
                return back()->with('alert','We deduct some error ');
                //return back()->withErrors()->withInput();
            }
        }
    }


    public function userdtl_view($id) {
        $user = DB::select('select t1.*,t5.designation_name
                    from tbl_employee t1
                    left join tbl_designation t5 on t5.id = t1.designation_id
                    where t1.id='.$id)[0];
        $user = json_decode(json_encode($user), true);

        $visitor = DB::select('select * from tbl_visitor where appointment_with='.$id);
        $visitor = json_decode(json_encode($visitor), true);
        //dd($id);
        return view('home/User/user_detail_view',['user' => $user,'visitor'=>$visitor]);
    }



    public function visitor_list() {
        $visitor = DB::select('select t1.*,t2.name as emp_name
                    from tbl_visitor t1
                    left join tbl_employee t2 on t2.id = t1.appointment_with');
        $visitor = json_decode(json_encode($visitor), true);
        return view('home/Visitor/visitor_list',['visitor'=>$visitor]);
    }


    public function visitordtl_view($id) {
        $visitor = DB::select('select t1.*,t2.name as emp_name
                    from tbl_visitor t1
                    left join tbl_employee t2 on t2.id = t1.appointment_with
                    where t1.id='.$id)[0];
        $visitor = json_decode(json_encode($visitor), true);
        //dd($visitor);
        return view('home/Visitor/visitor_detail_view',['visitor'=>$visitor]);
    }


    public function visitor_accept($id) {
        if(DB::update("update tbl_visitor set status =2 where id=".$id)){
            $visitor = DB::select('select t1.*,t2.name as emp_name
                        from tbl_visitor t1
                        left join tbl_employee t2 on t2.id = t1.appointment_with');
            $visitor = json_decode(json_encode($visitor), true);
            
            return view('home/Visitor/visitor_list',['visitor'=>$visitor]);
        }else{
            return back()->with('alert','We deduct some error ');
        }
        //dd($visitor);
        
    }

    public function visitor_reject($id) {
        if(DB::update("update tbl_visitor set status =0 where id=".$id)){
            $visitor = DB::select('select t1.*,t2.name as emp_name
                        from tbl_visitor t1
                        left join tbl_employee t2 on t2.id = t1.appointment_with');
            $visitor = json_decode(json_encode($visitor), true);

            return view('home/Visitor/visitor_list',['visitor'=>$visitor]);
        }else{
            return back()->with('alert','We deduct some error ');
        }
    }
    


}
