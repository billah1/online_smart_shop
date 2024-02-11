<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.size.index',['sizes' => Size::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Size::storesize($request);
        return redirect()->route('size.index')->with('message','size create sucessfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('backend.size.edit',['size' => $size]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        Size::updatesize($size,$request);
        return redirect()->route('size.index')->with('message','size update sucessfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        Size::deletesize($size);
        return redirect()->route('size.index')->with('message','size delete sucessfully...');
    }
}
