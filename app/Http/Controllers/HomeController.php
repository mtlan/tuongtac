<?php

namespace App\Http\Controllers;

use DB;

// thư viện use session
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect; // redirect giống như return trả về thành công hay thất bại
session_start();
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get();

        $week_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get();

        $month_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(12)->get();

        return view('pages.homeone')->with('category',$cate_product)->with('all_product',$all_product)->with('week_product',$week_product)->with('month_product',$month_product);
    }

    public function index() {

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get();

        $week_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get();

        $month_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(12)->get();


        return view('pages.home')->with('category',$cate_product)->with('all_product',$all_product)->with('week_product',$week_product)->with('month_product',$month_product);
    }

    public function shop_detail() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
       
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(9)->get();

        $filter = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();

        return view('pages.shop_detail')->with('category',$cate_product)->with('all_product',$all_product)->with('filter',$filter);
    }
    
    public function cart() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get();

        return view('pages.cart')->with('category',$cate_product)->with('all_product',$all_product);
    }


    // public function shop() {
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

    //     return view('pages.shop')->with('category',$cate_product)->with('brand',$brand_product);
    // }

    

    public function not() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
       
        return view('pages.404')->with('category',$cate_product);
    }

    public function about() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        return view('pages.about')->with('category',$cate_product);
    }

    public function contact() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        return view('pages.contact')->with('category',$cate_product);
    }

    public function checkout() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        return view('pages.checkout')->with('category',$cate_product);
    }

    public function account() {

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        return view('pages.login_register')->with('category',$cate_product);
    }

    // public function acc() {
    //     $email = $request->email;
    //     $password = md5($request->password);

    //     $result = DB::table('tbl_user')->where('email',$email)->where('password',$password)->first();

    //     echo '<pre>';
    //         print_r($result);
    //     echo '</pre>';
    //     // if($result) {
    //     //     Session::put('name',$result->name);
    //     //     Session::put('id',$result->id);
    //     //     return Redirect::to('/home');
    //     // }else{
    //     //     Session::put('message','Sai mật khẩu và tài khoản');  // xuất ra
    //     //     return Redirect::to('/login-register');
    //     // }
    // }

    public function myaccount() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();

        // $manager_order = view('pages.my_account')->with('all_order',$all_order);
        return view('pages.my_account')->with('category',$cate_product)->with('all_order',$all_order);
    }

    
}
