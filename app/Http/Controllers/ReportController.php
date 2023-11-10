<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\tbl_application;
use App\Models\District;
use App\Models\Block;

class ReportController extends Controller
{



    public function application_report()
    {
        $session = session();
        $logdata = $session->get("loginData");
        //dd($logdata);
        if($logdata['block']!=0){
            $where = "id=".$logdata['block'];
            $where_search = "t1.block_id=".$logdata['block'];
        }elseif($logdata['district']!=""){
            $where = "district_id=".$logdata['district'];
            $where_search = "t1.district_id=".$logdata['district'];
        }

        $scheme = DB::select("select *
                        from tbl_scheme where status=1");
        $scheme = json_decode(json_encode($scheme), true);

        $block = DB::select("select *
                    from tbl_block
                    where ".$where);
        $block = json_decode(json_encode($block), true);

        $applicationdetails = DB::select("select t1.*, t3.block_name_english,t3.block_name_hindi,t5.scheme_name,t6.sub_scheme_name
        from tbl_applications t1
        left join tbl_block t3 on t3.id = t1.block_id
        left join tbl_scheme t5 on t5.id = t1.scheme_name
        left join tbl_sub_scheme t6 on t6.id = t1.sub_scheme_name
        where ".$where_search);
        $applicationdetails = json_decode(json_encode($applicationdetails), true);

        return view('home/Report/application_list_report',['application'=>$applicationdetails,'scheme'=>$scheme,'block'=>$block]);
    }

    

    public function searchappreport(Request $request)
    {
        $session = session();
        $logdata = $session->get("loginData");

        if($logdata['block']!=0){
            $where_search = "id=".$logdata['block'];
        }elseif($logdata['district']!=""){
            $where_search = "district_id=".$logdata['district'];
        }

        $scheme = DB::select("select *
                        from tbl_scheme where status=1");
        $scheme = json_decode(json_encode($scheme), true);

        $block = DB::select("select *
                    from tbl_block
                    where ".$where_search);
        $block = json_decode(json_encode($block), true);

        $blockwise = $request->blockwise;$schemewise = $request->schemewise;
        $sub_schemewise = $request->sub_schemewise;$statuswise = $request->statuswise;


        if($blockwise!="" && $schemewise!="" && $sub_schemewise!="" && $statuswise!=""){
            $where = "t1.block_id=".$blockwise." and t1.scheme_name=".$schemewise." and t1.sub_scheme_name=".$sub_schemewise." and t1.application_status=".$statuswise;
        }elseif($blockwise!="" && $schemewise=="" && $sub_schemewise=="" && $statuswise==""){
            $where = "t1.block_id=".$blockwise;
        }elseif($blockwise!="" && $schemewise!="" && $sub_schemewise=="" && $statuswise==""){
            $where = "t1.block_id=".$blockwise." and t1.scheme_name=".$schemewise;
        }elseif($blockwise!="" && $schemewise!="" && $sub_schemewise!="" && $statuswise==""){
            $where = "t1.block_id=".$blockwise." and t1.scheme_name=".$schemewise." and t1.sub_scheme_name=".$sub_schemewise;
        }elseif($blockwise=="" && $schemewise!="" && $sub_schemewise=="" && $statuswise==""){
            $where = "t1.scheme_name=".$schemewise;
        }elseif($blockwise=="" && $schemewise!="" && $sub_schemewise!="" && $statuswise==""){
            $where = "t1.scheme_name=".$schemewise." and t1.sub_scheme_name=".$sub_schemewise;
        }elseif($blockwise=="" && $schemewise=="" && $sub_schemewise=="" && $statuswise!=""){
            $where = "t1.application_status=".$statuswise;
        }elseif($blockwise!="" && $schemewise=="" && $sub_schemewise=="" && $statuswise!=""){
            $where = "t1.block_id=".$blockwise." and t1.application_status=".$statuswise;
        }elseif($blockwise=="" && $schemewise!="" && $sub_schemewise=="" && $statuswise!=""){
            $where = "t1.scheme_name=".$schemewise." and t1.application_status=".$statuswise;
        }elseif($blockwise=="" && $schemewise!="" && $sub_schemewise!="" && $statuswise!=""){
            $where = "t1.scheme_name=".$schemewise." and t1.sub_scheme_name=".$sub_schemewise." and t1.application_status=".$statuswise;
        }elseif($blockwise!="" && $schemewise!="" && $sub_schemewise=="" && $statuswise!=""){
            $where = "t1.block_id=".$blockwise." and t1.scheme_name=".$schemewise." and t1.application_status=".$statuswise;
        }elseif($blockwise=="" && $schemewise=="" && $sub_schemewise=="" && $statuswise==""){
            if($logdata['block']!=0){
                $where = "t1.block_id=".$logdata['block'];
            }elseif($logdata['district']!=""){
                $where = "t1.district_id=".$logdata['district'];
            }
        }
        


        $applicationdetails = DB::select("select t1.*, t3.block_name_english,t3.block_name_hindi,t5.scheme_name,t6.sub_scheme_name
        from tbl_applications t1
        left join tbl_block t3 on t3.id = t1.block_id
        left join tbl_scheme t5 on t5.id = t1.scheme_name
        left join tbl_sub_scheme t6 on t6.id = t1.sub_scheme_name
        where ".$where);
        $applicationdetails = json_decode(json_encode($applicationdetails), true);
        //dd($applicationdetails);
        return view('home/Report/application_list_report',['scheme'=>$scheme,'block'=>$block,'application'=>$applicationdetails]);
    }

    

}
