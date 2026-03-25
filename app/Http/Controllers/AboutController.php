<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abouts.create');
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
            'name' => 'required|string|max:225',
            'logo'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'=>'required|string',
            'image'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $logo = null;
        $image = null;
        if($request->hasFile('logo')){
            $logo = $request->file('logo')->store('abouts', 'public');
        }
        if($request->hasFile('image')){
            $image = $request->file('image')->store('abouts', 'public');
        }
        
        About::create([
            'name'=>$request->name,
            'logo'=> $logo,
            'description'=>$request->description,
            'image'=>$image,
        ]);
        return redirect()->route('about.index')->with('success','About Us added successfully');
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
        $abouts = About::find($id);
        return view('abouts.edit', compact('abouts'));
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
            'name' => 'required|string|max:225',
            'logo'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'=>'required|string',
            'image'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $abouts = About::findOrFail($id);

        //default pakai gambar lama
        $logo=$abouts->logo;
        $image=$abouts->image;

        //kalau uplod baru,hapus lama lalu simpan baru
        if($request->hasFile('logo')){
            if($abouts->logo){
                \Storage::disk('public')->delete($abouts->logo);
            }
            $logo=$request->file('logo')->store('abouts', 'public');
        }
        if($request->hasFile('image')){
            if($abouts->image){
                \Storage::disk('public')->delete($abouts->image);
            }
            $image=$request->file('image')->store('abouts', 'public');
        }

        //update manual per field
        $abouts->update([
            'name'=>$request->name,
            'logo'=> $logo,
            'description'=>$request->description,
            'image'=>$image,
        ]);

        return redirect()->route('about.index')->with('success','About Us updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::where('about_id', $id)->delete();
        return redirect()->route('about.index');
    }
    public function active($id)
    {
        About::where('about_id',$id)->update([
            'status' => 1
        ]);

        return back();
    }

    public function nonactive($id)
    {
        About::where('about_id',$id)->update([
            'status' => 0
        ]);

        return back();
    }
    
    
}
