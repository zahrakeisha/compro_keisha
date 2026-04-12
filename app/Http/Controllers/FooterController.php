<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::all();
        return view('footprofile.index', compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('footprofile.create');
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
            'name' => 'required|string|max:255|unique:footer',
            'description' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'facebook' => 'nullable|string',
        ]);
        Footer::create([
            'name' => $request->name,
            'description' => $request->description,
            'instagram' =>$request->instagram,
            'youtube' =>$request->youtube,
            'facebook' =>$request->facebook,
        ]);
        return redirect()->route('footer.index')->with('success','footer added successfully');
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
        $dataeditfoot = Footer::find($id);
        return view('footprofile.edit', compact('dataeditfoot'));
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'facebook' => 'nullable|string',
        ]);
        $dataeditfoot = Footer::findOrFail($id);
        $dataeditfoot->update([
            'name' => $request->name,
            'description' => $request->description,
            'instagram' =>$request->instagram,
            'youtube' =>$request->youtube,
            'facebook' =>$request->facebook,
        ]);
        return redirect()->route('footer.index')->with('success','footer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Footer::where('footer_id', $id)->delete();
        return redirect()->route('footer.index');
    }

    public function active($id)
    {
        Footer::where('footer_id',$id)->update([
            'status' => 1
        ]);

        return back();
    }

    public function nonactive($id)
    {
        Footer::where('footer_id',$id)->update([
            'status' => 0
        ]);

        return back();
    }
}
