<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\products;
use Database\Seeders\categories as SeedersCategories;

class AdminCategoriesController extends Controller
{
    public function slugify($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    public function index()
    {
        $categories = Categories::orderBy('created_at', 'asc')->paginate(12);
        return view('admin.pages.Categories.List', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.Categories.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);
        $data = [];
        $data['category_name'] = $request->category_name;
        $slug = $request->slug;
        $data['rank'] = (int) $request->rank;
        $data['hidden'] = (int) $request->hidden;
        $data['created_at'] = now();
        $data['slug'] = empty($slug) ? $this->slugify($data['category_name']) : $slug;
        Categories::insert($data);
        toastr()->success('Thêm' .$data['category_name']. 'thành công!');
        return redirect('/admin/category/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::where('id', $id)->first();
        if( $id==null ){
            toastr()->error($id. 'không tồn tại!');
            return redirect('category.edit');
        }
        return view('admin.pages.Categories.Edit', ['category' =>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [];
        $data['category_name'] = $request->category_name;
        $slug = $request->slug;
        $data['rank'] = $request->rank;
        $data['hidden'] = $request->hidden;
        $data['slug'] = empty($slug) ? $this->slugify($data['category_name']) : $slug;
        $data['updated_at'] = now();
        Categories::where('id', $id)->update($data);
        toastr()->success('Sửa '.$data['category_name']. ' thành công!');
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request, string $id)
    {
        Categories::where('id', $id)->delete();
        return response(['status' => 'success', 'message'=> 'Xóa Category ' . $id. ' thành công!']);
    }
}
