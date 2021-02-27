<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManageShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type != 'vendor') {
            return redirect('home');
        }
        $user_id = Auth::user()->user_id;
        $category = Category::all()->where('user_id', $user_id);
        $verified = false;
        if (count($category) != 0) {
            $verified = true;
        }
//        dd($category);
//        return count($category) == 0 ?  view('public.manage_shop')->with('verified', $verified) :
        return view('public.manage_shop', compact('category'))->with('verified', $verified);

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
            'shop_name' => 'required|min:4',
            'shop_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->shop_image)) {
            $imageName = time() . '.' . request()->shop_image->getClientOriginalExtension();
            request()->shop_image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'no-image.png';
        }


        $var = new Category();
        $var->category_name = $request->input('shop_name');
        $var->category_image = $imageName;
        $var->user_id = Auth::user()->user_id;

        $var->save();
//        return back()->with('success', 'Vendor created successfully.');
        return redirect('manage_shop');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->user_id;
        $category = Category::all()->where('user_id', $user_id);

        return view('public.editCategory', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'shop_name' => 'required|min:4',
            'shop_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->shop_image)) {
            $category = Category::find($id);
            $imageName = $category->category_image;
            if ($imageName !== 'no-image.png') {
                File::delete(public_path('images/' . $imageName));
            }
            $imageName = time() . '.' . request()->shop_image->getClientOriginalExtension();
            request()->shop_image->move(public_path('images'), $imageName);
        } else {
            $category = Category::find($id);
            $imageName = $category->category_image;
        }

        $category = Category::find($id);
        $category->category_name = $request->get('shop_name');
        $category->category_image = $imageName;
        $category->save();

        return redirect('/manage_shop');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
