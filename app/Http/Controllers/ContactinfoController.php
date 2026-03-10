<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactinfo;

class ContactinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactinfo = Contactinfo::all();
        return view('contactinfo.index', compact('contactinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactinfo.create');
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
            'name' => 'required|string|max:255',
            'gmaps' => 'required|string',
            'email' => 'required',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        Contactinfo::create([
            'name' => $request->name,
            'gmaps' => $request->gmaps,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' =>$request->address,
        ]);
        return redirect()->route('contactinfo.index');
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
        $contactinfo= Contactinfo::find($id);
        return view('contactinfo.edit', compact('contactinfo'));
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
            'gmaps' => 'required|string',
            'email' => 'required',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        $contactinfo = Contactinfo::findOrFail($id);
        $contactinfo->update([
            'name' => $request->name,
            'gmaps' => $request->gmaps,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' =>$request->address,
        ]);
        return redirect()->route('contactinfo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contactinfo::where('contactfo_id', $id)->delete();
        return redirect()->route('contactinfo.index');
    }
    
    public function active($id)
    {
        Contactinfo::where('contactfo_id',$id)->update([
            'status' => 1
        ]);

        return back();
    }

    public function nonactive($id)
    {
        Contactinfo::where('contactfo_id',$id)->update([
            'status' => 0
        ]);

        return back();
    }
}
