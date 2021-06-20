<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = CategoryProduct::orderBy('id', 'desc')->get();

        $dataView = [
            'category' => $category,
        ];

        return view('admin.category.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');

        $messages = [
            'name.required' => 'Hãy nhập tên',
            'name.unique' => 'Trùng tên',
            'name.min' => 'Tên quá ngắn',
            'name.max' => 'Tên quá dài',
            'status.required' => 'Hãy chọn trạng thái',
        ];

        $validator = Validator::make($data, [
            'name' => 'required|min:5|max:100|unique:category_products,name',
            'status' => 'required',
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {

            $category = new CategoryProduct;
            $category->name = $request->name;
            $category->slug = \Str::slug($request->name);
            $category->status = $request->status;
            $category->save();

            return redirect()->back()->with('thongbao', 'Thêm mới thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
