<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all()->where('user_type', 'admin');
        return view('admin.manageAdmins', compact('admins'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'admin_name' => 'required|min:4',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
            'admin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->admin_image)) {
            $imageName = time() . '.' . request()->admin_image->getClientOriginalExtension();
            request()->admin_image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png';
        }


        $var = new User;
        $var->user_name = $request->input('admin_name');
        $var->user_email = $request->input('admin_email');
        $var->user_password = Hash::make($request->input('admin_password'));
        $var->user_image = $imageName;
        $var->user_type = 'admin';

        $var->save();
        return back()->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin.editAdmin', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_name' => 'required|min:4',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
            'admin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->admin_image)) {
            $admin = User::find($id);
            $imageName = $admin->user_image;
            if ($imageName !== 'default.png') {
                File::delete(public_path('images/' . $imageName));
            }
            $imageName = time() . '.' . request()->admin_image->getClientOriginalExtension();
            request()->admin_image->move(public_path('images'), $imageName);
        } else {
            $admin = User::find($id);
            $imageName = $admin->user_image;
        }

        $admin = User::find($id);
        $admin->user_name = $request->get('admin_name');
        $admin->user_email = $request->get('admin_email');
        $admin->user_password = $request->get('admin_password');
        $admin->user_image = $imageName;
        $admin->save();

        return redirect('/adminside')->with('success', 'Admin updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        $imageName = $admin->user_image;
        if(!($imageName == 'default.png')) {
            File::delete(public_path('images/' . $imageName));
        }
        $admin->delete();

        return back()->with('success', 'Admin deleted successfully!');
    }
}
