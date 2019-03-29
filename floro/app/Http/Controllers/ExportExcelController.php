<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Excel;

class ExportExcelController extends Controller
{
    function excel(){
        $data= User::join('user_activities', 'users.id', '=', 'user_activities.user_id')
       ->join('authentication_logs', 'users.id', '=', 'user_activities.user_id')
       ->get();
        $users_array[]=array('user_name','email','first_name','last_name','address','city','postal_code','created_at',
                            'last_sign_in_at','user_id','field_name','old_value','new_value','modified_by',
                            'login_time','logout_time','browser_agent','ip_address',);
        foreach($data as $users)
        {   
             $users_array[]=array(
                 'user_name'=>$users['user_name'],
                 'email'=>$users['email'],
                 'first_name'=>$users['first_name'],
                 'last_name'=>$users['last_name'],
                 'address'=>$users['address'],
                 'city'=>$users['city'],
                 'postal_code'=>$users['postal_code'],
                  'created_at'=>$users['created_at'],
                 'last_sign_in_at'=>$users['last_sign_in_at'],
                 'user_id'=>$users['user_id'],
                 'field_name'=>$users['field_name'],
                 'old_value'=>$users['old_value'],
                 'new_value'=>$users['new_value'],
                 'modified_by'=>$users['modified_by'],
                 'login_time'=>$users['login_time'],
                 'logout_time'=>$users['logout_time'],
                 'browser_agent'=>$users['browser_agent'],
                 'ip_address'=>$users['ip_address'],
            );
        }
             Excel::create('MyExcel',function($excel) use($users_array) 
             {
                // dd('dsdh');
                 $excel->setTitle('MyExcel');
                 $excel->sheet('MyExcel',function($sheet) use($users_array)
                 {
                    $sheet->fromArray($users_array);
                 });
             })->download('xlsx');
           
    }
}
