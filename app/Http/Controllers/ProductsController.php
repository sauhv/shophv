<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Categories;
use Cart;

class ProductsController extends Controller
{


    public function __construct()
    {
        $categoryList = Categories::where('hidden', 1)->orderBy('rank', 'asc')->limit(6)->get();
        View()->share('categoryList', $categoryList);
    }

    public function index()
    {
        $categoryList = Categories::getCategory();
        $productListing = [];
        foreach ($categoryList as $cate) {
        $getProducts = [
            $cate->category_name => Products::select('products.*', 'categories.rank')
                                            ->join('categories', 'categories.id' ,'=', 'products.category_id')
                                            ->where('products.category_id', $cate->id)->where('products.hidden', 1)
                                            ->orderBy('products.created_at', 'desc')
                                            ->orderBy('categories.rank' , 'asc')
                                            ->limit(4)
                                            ->get(),
        ];
        $productListing[] = $getProducts;
    }
        $titlePage = "Trang chủ";
        return view('/pages/wrapper_home_page',compact('productListing', 'categoryList', 'titlePage'));
    }


    public function products($id)
    {
        $titlePage = "Model Product";
        $models = DB::table('models')->where('category_id', $id)->orderBy('created_at', 'asc')->get();
        $product_cate = Products::where('category_id', $id)->where('hidden', 1)->orderBy('created_at', 'desc')->paginate(12);
        return view('/pages/category_product', ['titlePage' => $titlePage, 'models' => $models, 'product_cate' => $product_cate]);
    }

    public function productsSeries($id)
    {
        $titlePage = "Products Category";
        $product_models = Products::where('model_id', $id)->where('hidden', 1)->orderBy('created_at', 'desc')->paginate(12);
        $product_model = Products::where('model_id', $id)->where('hidden', 1)->orderBy('created_at', 'desc')->first();
        $models = DB::table('models')->where('category_id', $product_model['category_id'])->orderBy('created_at', 'asc')->get();
        return view('/pages/model_product', ['titlePage' => $titlePage, 'models' => $models, 'product_models' => $product_models]);
    }

    public function getProductSearch(Request $request)
    {
        $titlePage = "Tìm kiếm " . Request()->get('keyword');
        if (!empty(Request()->get('keyword'))) {
            $products = Products::where('name', 'like', '%' . Request()->get('keyword') . '%')->orderBy('name', 'desc')->paginate(12);
        }
        return view('pages.wrapper_search_page', compact('products', 'titlePage'));
    }

    public function detail($id)
    {
        $titlePage = "Product Detail";
        $product_detail = Products::where('id', $id)->where('hidden', 1)->first();
        $gallerys = Products::where('id', $id)->where('hidden', 1)->value('thumbnails');
        $gallery = json_decode($gallerys);
        $views = $product_detail['views'] + 1;
        Products::where('id', $id)->update(['views' => $views]); //tăng view lên 1
        return view('/pages/wrapper_detail_page', compact('titlePage', 'product_detail', 'gallery'));
    }


    public function news()
    {
        $titlePage = "News";
        return view('/pages/wrapper_news_page', ['titlePage' => $titlePage]);
    }

}
