<?php

namespace App\Http\Controllers;

use App\Models\Attend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Exception;

class AttendController extends Controller
{
    public function index($id){
        try {
            $user = User::find($id);
            return view('check',compact('user'));
        }
        catch (Exception $e){
            return $e;
        }

    }

    public function check_in(Request $request)
    {
        date_default_timezone_set("Egypt");
        $current_time = date('Y-m-d h:i:s');
//        return $current_time;
        try {
        Attend::create([
            'Checked_in_at'=>$current_time,
            'user_id'=>$request->id,
        ]);
        return redirect('/dashboard')->with('msg','Checked in Successfully');
        }
        catch (Exception $e){
            return $e;
        }
    }

    public function check_out(Request $request)
    {
        try {
            date_default_timezone_set("Egypt");
            $current_time = date('Y-m-d h:i:s');
            Attend::where('user_id',$request->id)->orderByDesc('id')->limit(1)->update(['Checked_out_at'=>$current_time]);
            return redirect()->route('logout');
        }
        catch (Exception $e){
            return $e;
        }

    }
}
