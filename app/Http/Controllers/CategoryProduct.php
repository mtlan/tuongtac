<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// thư viện use session
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect; // redirect giống như return trả về thành công hay thất bại
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else {
            return Redirect::to('admin')->send();
        }
    }
    public function Add_Category() {
        $this->AuthLogin();
        return view('admin.add_category');
    }
    public function All_Category() {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category')->with('all_cate',$all_category_product);  // all_pro biến, $all_category_product sẽ gán cho biến all_pro
        return view('admin_layout')->with('admin.add_category',$manager_category_product);  // admin_layout sẽ chứa admin.all_product và sẽ gán vào biến $manager_category_product
    }
    public function Save_Category_Product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return redirect('Add-category');
    }
    public function active_category_product($cate_id) {
        $this->AuthLogin();
        // update('category_status'=>1); ERROR, GT update('[category_status'=>1]); nó sẽ update 1 cái mảng 
        DB::table('tbl_category_product')->where('category_id',$cate_id)->update(['category_status'=>1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('All-category');
    }
    public function unactive_category_product($cate_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$cate_id)->update(['category_status'=>0]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('All-category');
    }
    public function Edit_Category_Product($cate_id) {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->where('category_id',$cate_id)->get();  // ->first() limit 1 lấy ra sp đầu tiên nếu first lỗi
        // Vì edit-category-product mặc định lấy ra nó so sánh id chỉ lấy chứa 1 id này vd id=3 sẽ ko cần first mặc định có 1 id thôi nó chỉ lấy ra cái dữ liệu thuộc id này thôi chứ ko lấy all mà ko phải dùng first
        $manager_category_product = view('admin.edit_category')->with('edit_cate',$all_category_product);  // all_pro biến, $all_category_product sẽ gán cho biến all_pro
        return view('admin_layout')->with('admin.edit_category',$manager_category_product);  // admin_layout sẽ chứa admin.all_product và sẽ gán vào biến $manager_category_product
    }
    public function Update_Category_Product(Request $request, $cate_id) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$cate_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('All-category');

    }
    public function Delete_Category_Product($cate_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$cate_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('All-category');
    }

    // End fuction Admin Page
    public function show_category_home($category_id) {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();
        $filter = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();
        return view('pages.shop_c')->with('category',$cate_product)->with('category_by_id',$category_by_id)->with('filter',$filter);
        
    }

    public function show_category_shop($gory_id) {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        $gory_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$gory_id)->get();
        $filter = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(2)->get();
        return view('pages.shop')->with('category',$cate_product)->with('gory_by_id',$gory_by_id)->with('filter',$filter);
        
    }

}
