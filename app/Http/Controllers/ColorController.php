<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.color.index',['colors' => Color::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Color::storecolor($request);
        return redirect()->route('color.index')->with('message','color create sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('backend.color.edit',['color' => $color]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        Color::updatecolor($color,$request);
        return redirect()->route('color.index')->with('message','color update sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        Color::deletecolor($color);
        return redirect()->route('color.index')->with('message','color delete sucessfully');
    }
}
