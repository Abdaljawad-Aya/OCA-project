<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sub_Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $sub_cat_id = null)
    {
        $sub_categories = Sub_Category::all()
            ->where('category_id', $id);
        if ($sub_cat_id == null) {
            $products = new Product();
            $temp = new Product();
            $tempArr = [];
            foreach ($sub_categories as $sub) {
                $temp = Product::all()->where('sub_category_id', $sub->sub_category_id);
                foreach ($temp as $value) {
                    array_push($tempArr, $value);
                }
            }
        } else {
            $tempArr = Product::all()->where('sub_category_id', $sub_cat_id);

        }
        return view('public.products')->with('products', $tempArr)->with('sub_categories', $sub_categories)->with('cat_id', $id);
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
        //
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
        //
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
