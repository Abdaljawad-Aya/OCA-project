<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->where('user_type', 'vendor')
            ->join('categories', 'users.user_id', '=', 'categories.user_id')
            ->get();
        return view('admin.manageVendors', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'user_name' => 'required|min:4',
            'user_email' => 'required|email',
            'user_password' => 'required|min:6',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->user_image)) {
            $imageName = time() . '.' . request()->user_image->getClientOriginalExtension();
            request()->user_image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png';
        }


        $var = new User;
        $var->user_name = $request->input('user_name');
        $var->user_email = $request->input('user_email');
        $var->user_password = $request->input('user_password');
        $var->user_image = $imageName;
        $var->user_type = 'vendor';

        $var->save();
        return back()->with('success', 'Vendor created successfully.');
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
        $user = User::find($id);
        return view('admin.editVendor', compact('user'));
    }

    public function approve($id){
        $category = Category::find($id);
        $category->category_approved = true;
        $category->save();
        return back()->with('success', 'Category Approved!');
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
        $request->validate([
            'user_name' => 'required|min:4',
            'user_email' => 'required|email',
            'user_password' => 'required|min:6',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->user_image)) {
            $user = User::find($id);
            $imageName = $user->user_image;
            if ($imageName !== 'default.png') {
                File::delete(public_path('images/' . $imageName));
            }
            $imageName = time() . '.' . request()->user_image->getClientOriginalExtension();
            request()->user_image->move(public_path('images'), $imageName);
        } else {
            $user = User::find($id);
            $imageName = $user->user_image;
        }

        $user = User::find($id);
        $user->user_name = $request->get('user_name');
        $user->user_email = $request->get('user_email');
        $user->user_password = $request->get('user_password');
        $user->user_image = $imageName;
        $user->save();

        return redirect('/vendor')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $imageName = $user->user_image;
        if ($imageName !== 'default.png') {
        File::delete(public_path('images/' . $imageName));
        }
        $user->delete();

        return back()->with('success', 'User deleted successfully!');
    }
}
