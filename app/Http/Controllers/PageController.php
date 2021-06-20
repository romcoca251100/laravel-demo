<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function index() {
        $products = Product::all();
        $category = CategoryProduct::all();
        $viewData = [
            'products' => $products,
            'category' => $category,
        ];
        return view('pages.index', $viewData);
    }

    public function getCategory($slug, $id) {
        $categorys = CategoryProduct::find($id);
        $viewData = [
            'categorys' => $categorys,
        ];

        return view('pages.category', $viewData);
    }

    public function getProduct($slug, $id) {
        $product = Product::find($id);
        $viewData = [
            'product' => $product,
        ];

        return view('pages.product_detail', $viewData);
    }

    public function login() {
        return view('admin.login.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required'=>'Bạn chưa nhập Usernane',
            'password.required'=>'Bạn chưa nhập Password'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.category.index');
        } else {
            return redirect()->back()->with('thongbao', 'Đăng nhập thất bại!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
