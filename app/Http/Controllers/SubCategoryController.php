<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.sub-category.manage',['sub_categories' => SubCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sub-category.create',['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'  =>  'required',
            'name'         => 'required',
        ],[
            'category_id.required' => 'category name field is required',
            'name.required' => 'subcategory name field is required',
        ]);
        SubCategory::storesubcategory($request);
        return redirect()->route('sub-category.index')->with('message','sub-Category Info Create sucessfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        return view('backend.sub-category.edit',['categories' => Category::all(),'sub_category' => $subCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        SubCategory::updatesubcategory($request,$subCategory);
        return redirect()->route('sub-category.index')->with('message','sub-Category Update sucessfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        SubCategory::deletesubcategory($subCategory);
        return redirect()->route('sub-category.index')->with('message','sub-Category Delete sucessfully...');
    }
}
