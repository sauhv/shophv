<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Models;
use App\Models\Categories;
use App\Http\Requests\RuleProductsForm;
use App\Http\Requests\RuleProductEdit;

class AdminProductController extends Controller
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

    public function __construct()
    {
        $category_list = Categories::where('hidden', 1)->orderBy('id', 'asc')->get();
        View()->share('category_list', $category_list);
        $model_list = Models::orderBy('id', 'asc')->get();
        View()->share('model_list', $model_list);
    }
    
    public function index()
    {
        $products = Products::select('products.*', 'categories.category_name', 'models.model_name')
                            ->join('categories', 'categories.id', '=', 'products.category_id')
                            ->join('models', 'models.id', '=', 'products.model_id')
                            ->orderBy('products.created_at', 'desc')->paginate(12);
        return view('admin.pages.Products.List', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.pages.Products.Create');
    }


    public function store(RuleProductsForm $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['amount'] = $request->amount;
        $data['price'] = $request->price;
        $data['description'] = $request->description;
        $data['hot'] = $request->hot;
        $data['hidden'] = $request->hidden;
        $data['category_id'] = $request->category_id;
        $data['model_id'] = $request->model_id;
        $data['shortDes'] = 'abc';
        $data['created_at'] = now();
        $slug = $request->slug;
        $data['slug'] = empty($slug) ? $this->slugify($data['name']) : $slug;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = 'media_'.uniqid(). '.'. $image->getClientOriginalExtension();
            $image->move(public_path('images/product'),  $file_name);
            $data['image'] =  $file_name;
        }

        if($request->hasFile('thumbnails')) {
            $thumbnail = $request->file('thumbnails');
            $thumbs = [];
            foreach($thumbnail as $thumb) {
                $get_name_thumb = $thumb->getClientOriginalName(); //lấy tên file ảnh
                $name_thumb = current(explode('.', $get_name_thumb)); //lấy tên ảnh
                $new_thumb = $name_thumb.rand(0,999).'.'.$thumb->getClientOriginalExtension(); //lấy đuôi file
                $thumb->move(public_path('images/gallery'),$new_thumb); //chuyển ảnh đến folder ảnh
                $thumbs[] = $new_thumb;
            }
        }
        
        $data['thumbnails'] = json_encode($thumbs);
        Products::insert($data);
        toastr()->success('Thêm sản phẩm ' .$data['name']. ' thành công');
        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $product = Products::where('id', $id)->first();
        $thumb = json_decode($product['thumbnails']);
        if($product==null) {
            toastr()->error('ID sản phẩm ' .$id . ' không tồn tại');
            return redirect()->back();
        }
        return view('admin.pages.Products.Edit', ['product' => $product, 'thumb' =>$thumb]);
    }


    public function update(RuleProductEdit $request, string $id)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['amount'] = $request->amount;
        $data['price'] = $request->price;
        $data['shortDes'] = 'abc';
        $data['hot'] = $request->hot;
        $data['hidden'] = $request->hidden;
        $data['hot'] = $request->hot;
        $data['category_id'] = $request->category_id;
        $data['model_id'] = $request->model_id;
        $data['description'] = $request->description;
        $data['updated_at'] = now();
        $data['slug'] = $request->slug==null ? $this->slugify($data['name']) : $request->slug;
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $new_name = 'media_' . uniqid() . '.' .$ext;
            $image->move(public_path('images/product/'), $new_name);
            $data['image'] = $new_name; 
        }else {
            $data['image'] = $request->old_image;
        }

        if($request->hasFile('thumbnails')) {
            $thumbs = $request->file('thumbnails');
            $thum = [];
            foreach($thumbs as $thumb) {
                $ext = $thumb->getClientOriginalExtension();
                $new_name_thumb = 'media_'. uniqid() . '.'.$ext;
                $thumb->move(public_path('images/gallery/'), $new_name_thumb);
                $thum[] = $new_name_thumb;
            }
            $data['thumbnails'] = json_encode($thum);
            
        }else {
            $data['thumbnails'] = $request->old_thumbnails;
        }

        Products::where('id', $id)->update($data);
        toastr()->success('Sửa sản phẩm ' . $data['name'] . ' thành công!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Products::where('id', $id)->count() > 0){
            Products::where('id', $id)->delete();
            return response(['status' => 'success', 'message'=> 'Xóa sản phẩm id ' .$id. ' thành công!']);
        }
        
    }
}
