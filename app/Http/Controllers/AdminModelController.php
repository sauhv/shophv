<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Categories;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Str;

class AdminModelController extends Controller
{
    public function __construct()
    {
        $models = Models::select('models.*', 'categories.category_name')
                        ->join('categories', 'categories.id', '=', 'models.category_id')
                        ->orderBy('categories.created_at', 'desc')
                        ->get();
        View()->share('models', $models);
        $category_list = Categories::where('hidden', 1)->orderBy('id', 'asc')->get();
        View()->share('category_list', $category_list);
    }
    public function index()
    {
        return view('admin.pages.Models.List');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.Models.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $model = new Models;
            $model->model_name = $request->input('name');
            $model->slug = $request->input('slug') == null ? Str::slug($request->input('name'), '-') : $request->input('slug');
            $model->category_id = $request->input('category_id');
            $model->save();
            toastr()->success('Thêm model ' .$request->name . ' thành công!');
            return redirect()->back();
        }catch(ValidationException $e){
            toastr()->error('Lỗi: ' .$e);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Models::findOrFail($id);
        return view('admin.pages.Models.Edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $model = Models::findOrFail($id);
            $model->model_name = $request->input('name');
            $model->slug = $request->input('slug') == null ? Str::slug($request->input('name'), '-') : $request->input('slug');
            $model->category_id = $request->input('category_id');
            $model->updated_at = now();
            $model->save();
            toastr()->success('Update model ' .$request->name . ' thành công!');
            return redirect()->back();
        }catch(ValidationException $e){
            toastr()->error('Lỗi: ' .$e);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $desTroy = Models::findOrFail($id)->delete();
        if($desTroy){
            return response(['status' => 'success', 'message'=> 'Xóa model ' .$id. ' thành công!']);
        }
    }
}
