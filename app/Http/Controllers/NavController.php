<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navprofile;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nav = Navprofile::all();
        return view('nav.index', compact('nav'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nav.create');
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
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);
        $logo = null; 
        if ($request->hasFile('logo')) { 
           $logo = $request->file('logo')->store('navlogo', 'public');
        }

        Navprofile::create([
            'company_name' => $request->name,
            'logo' => $logo,
        ]);
        return redirect()->route('nav.index')->with('success','Nav Profile added successfully');
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
        $dataeditnav = Navprofile::find($id);
        return view('nav.edit', compact('dataeditnav'));
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
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);
        $dataeditnav = Navprofile::findOrFail($id);
        $logo = $dataeditnav->logo;
        if ($request->hasFile('logo')){
           if ($dataeditnav->logo){
              \Storage::disk('public')->delete($dataeditnav->logo);
              }
            $logo = $request->file('logo')->store('navlogo', 'public');
        }
        $dataeditnav->update([
            'company_name' => $request->name,
            'logo' => $logo,
        ]);
        return redirect()->route('nav.index')->with('success','Nav Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Navprofile::where('nav_id', $id)->delete();
        return redirect()->route('nav.index');
    }
    public function active($id)
    {
        Navprofile::where('nav_id',$id)->update([
            'status' => 1
        ]);

        return back();
    }

    public function nonactive($id)
    {
        Navprofile::where('nav_id',$id)->update([
            'status' => 0
        ]);

        return back();
    }
}
