<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// thư viện use session
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect; // redirect giống như return trả về thành công hay thất bại
session_start();

class AdminController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else {
            return Redirect::to('admin')->send();
        }
    }
    public function index() {
        return view('admin_login');
    }

    public function show_dashboard() {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request) {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        // so sánh tbl_admin
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // return view('admin.dashboard');
        // if(isset($result)) {
        //     return view('admin.dashboard');
        // }
        if($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Sai mật khẩu và tài khoản');  // xuất ra
            return Redirect::to('/admin');
        }
    }

    public function logout() {
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return redirect('/admin');
    }
}
