<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = Organization::all();
        return view('organization.index', compact('organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organization.create');
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
            'image'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = null;
        if($request->hasFile('image')){
            $image = $request->file('image')->store('organization', 'public');
        }
        Organization::create([
            'image'=> $image,
        ]);
        return redirect()->route('organization.index');
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
        $organization = Organization::find($id);
        return view('organization.edit', compact('organization'));
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
            'image'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $organization = Organization::findOrFail($id);

        //default pakai gambar lama
        $image=$organization->image;

        //kalau uplod baru,hapus lama lalu simpan baru
        if($request->hasFile('image')){
            if($organization->image){
                \Storage::disk('public')->delete($organization->image);
            }
            $image=$request->file('image')->store('organization', 'public');
        }

        //update manual per field
        $organization->update([
            'image'=> $image,
        ]);
        return redirect()->route('organization.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Organization::where('org_id', $id)->delete();
        return redirect()->route('organization.index');
    }
}
