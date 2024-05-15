<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function UploadFile($request, $inputName, $path) {
        if($request->hasFile($inputName)){
            $file = $request->file($inputName);
            $fileName = 'media_' . uniqid() . '.' .$file->extension();
            $file->move(public_path('images/'.$path), $fileName);
            return $fileName;
        }
        return 'user.png';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->paginate(12);
        return view('admin.pages.Users.List', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.Users.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|min:6',
                'email' => 'email|ends_with:@gmail.com|required|unique:users,email',
                'password' => 'required|min:6',
                'passRepeat' => 'required|same:password',
                'image' => 'file|mimes:jpeg,png,jpg,webp',
                'phone_number' => 'required',
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');
            $user->password = Hash::make($request->input('password'));
            $user->role = $request->role;
            $user->image = $this->UploadFile($request, 'image', 'avatar/');
            $user->save();
            toastr()->success('Thêm thành công!');
            return redirect()->back();
        }catch(ValidationException $e) {
            toastr()->error('Lỗi: '.$e);
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
        $user = User::findOrFail($id);
        return view('admin.pages.Users.Edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'name' => 'required|min:6',
                'email' => 'email|ends_with:@gmail.com|required|unique:users,email',
                'password' => 'required|min:6',
                'passRepeat' => 'required|same:password',
                'image' => 'file|mimes:jpeg,png,jpg,webp',
                'phone_number' => 'required',
            ]);
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');
            $user->password = $request->input('password');
            $user->role = $request->role;
            $request->hasFile('image')==true ? $user->image = $this->UploadFile($request, 'image', 'avatar/') : $user->image = $request->input('image_old');
            
            $user->save();
            toastr()->success('Update '.$request->input('name').' thành công!');
            return redirect()->back();
        }catch(ValidationException $e) {
            toastr()->error('Lỗi: '.$e);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response(['status' => 'success','message' => 'Xóa user ' . $id . ' thành công!']);
        }
    }
}
