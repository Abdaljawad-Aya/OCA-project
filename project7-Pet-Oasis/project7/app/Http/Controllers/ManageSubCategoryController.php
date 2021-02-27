<?php

namespace App\Http\Controllers;

use App\Category;
use App\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManageSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->user_id;
        $category = Category::all()->where('user_id', $user_id);
        foreach ($category as $value){
            $category_id = $value->category_id;
        }

        $sub_categories = Sub_Category::all()->where('category_id', $category_id);

        return view('public.manage_sub_categories', compact('sub_categories'));
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
            'category_name'  => 'required|min:4',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->category_image)) {
            $imageName = time() . '.' . request()->category_image->getClientOriginalExtension();
            request()->category_image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'no-image.png';
        }

        $user_id = Auth::user()->user_id;
        $category = Category::all()->where('user_id', $user_id);
        foreach ($category as $value){
            $category_id = $value->category_id;
        }


        $var = new Sub_Category();
        $var->sub_category_name = $request->input('category_name');
        $var->sub_category_image = $imageName;
        $var->category_id = $category_id;

        $var->save();
        return back()->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = Sub_Category::all()->where('sub_category_id', $id);


        return view('public.editSub_categories', compact('sub_category'));
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
            'shop_name' => 'required|min:4',
            'shop_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->shop_image)) {
            $category = Sub_Category::find($id);
            $imageName = $category->sub_category_image;
            if ($imageName !== 'no-image.png') {
                File::delete(public_path('images/' . $imageName));
            }
            $imageName = time() . '.' . request()->shop_image->getClientOriginalExtension();
            request()->shop_image->move(public_path('images'), $imageName);
        } else {
            $category = Sub_Category::find($id);
            $imageName = $category->sub_category_image;
        }

        $category = Sub_Category::find($id);
        $category->sub_category_name = $request->get('shop_name');
        $category->sub_category_image = $imageName;
        $category->save();

        return redirect('/manage_sub_categories')->with('success', 'Sub-Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_cat = Sub_Category::find($id);
        $imageName = $sub_cat->sub_category_image;
        if ($imageName !== 'no-image.png') {
            File::delete(public_path('images/' . $imageName));
        }
        $sub_cat->delete();

        return back()->with('success', 'Sub-Category deleted successfully!');
    }
}
