<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManageProductController extends Controller
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
        foreach ($category as $value) {
            $cat_id = $value->category_id;
        }

        $sub_categories = Sub_Category::all()
            ->where('category_id', $cat_id);

        if (count($sub_categories) != 0) {
            $products = [];
            foreach ($sub_categories as $sub) {
                $temp = Product::all()->where('sub_category_id', $sub->sub_category_id);
                foreach ($temp as $value) {
                    array_push($products, $value);
                }
            }
        }

        return view('public.manage_products', compact('products'))->with('sub_cat', $sub_categories);

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
            'product_name'  => 'required|min:4',
            'product_price'  => 'required|numeric|min:1',
            'product_desc'  => 'required|min:10|max:300',
            'product_sub_cat'  => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->product_image)) {
            $imageName = time() . '.' . request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'no-image.png';
        }


        $var = new Product();
        $var->product_name = $request->input('product_name');
        $var->product_price = $request->input('product_price');
        $var->product_description = $request->input('product_desc');
        $var->sub_category_id = $request->input('product_sub_cat');
        $var->product_image = $imageName;

        $var->save();
        return back()->with('success', 'Product created successfully.');
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
        $user_id = Auth::user()->user_id;
        $category = Category::all()->where('user_id', $user_id);
        foreach ($category as $value) {
            $cat_id = $value->category_id;
        }

        $sub_categories = Sub_Category::all()
            ->where('category_id', $cat_id);

        $product = Product::find($id);
        return view('public.editProducts', compact('product'))->with('sub_cat', $sub_categories);
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
            'product_name'  => 'required|min:4',
            'product_price'  => 'required|numeric|min:1',
            'product_desc'  => 'required|min:10|max:300',
            'product_sub_cat'  => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->product_image)) {
            $product = Product::find($id);
            $imageName = $product->product_image;
            if ($imageName !== 'no-image.png') {
                File::delete(public_path('images/' . $imageName));
            }
            $imageName = time() . '.' . request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'), $imageName);
        } else {
            $product = Product::find($id);
            $imageName = $product->product_image;
        }

        $var = new Product();
        $var->product_name = $request->input('product_name');
        $var->product_price = $request->input('product_price');
        $var->product_description = $request->input('product_desc');
        $var->sub_category_id = $request->input('product_sub_cat');
        $var->product_image = $imageName;
        $var->update();
        return redirect('/manage_products')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $imageName = $product->product_image;
        if ($imageName !== 'no-image.png') {
            File::delete(public_path('images/' . $imageName));
        }
        $product->delete();

        return back()->with('success', 'Product deleted successfully!');
    }
}
