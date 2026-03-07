<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Sliders::all();
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|string|max:225|unique:home_sliders',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'description' => 'required|string',
        ]);

        $image = null;
        if($request->hasFile('image')){
            $image = $request->file('image')->store('sliders', 'public');
        }

        Sliders::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description
        ]);

        return redirect()->route('sliders.index');
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
        $sliders = Sliders::find($id);
        return view('slider.edit', compact('sliders'));
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
            'title'=> 'required|string|max:225|unique:home_sliders',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'description' => 'required|string',
        ]);

        $sliders = Sliders::findOrFail($id);


        $image = $sliders->image;
        if ($request->hasFile('image')){
           if ($sliders->image){
              \Storage::disk('public')->delete($sliders->image);
              }
            $image = $request->file('image')->store('sliders', 'public');
        }

        $sliders->update([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description
        ]);

        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sliders::where('sliders_id', $id)->delete();
        return redirect()->route('sliders.index');
    }
}
