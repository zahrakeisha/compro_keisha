<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketing;

class MarketingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marketings = Marketing::all();
        return view('marketings.index', compact('marketings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketings.create');
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
            'name' => 'required|string|max:255|unique:contacts',
            'phone' => 'required',
            'possition' => 'required|string',
        ]);
        Marketing::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'possition' =>$request->possition,
        ]);
        return redirect()->route('marketing.index')->with('success','Marketing added successfully');
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
        $marketings = Marketing::find($id);
        return view('marketings.edit', compact('marketings'));
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
            'name' => 'required|string|max:255|unique:contacts',
            'phone' => 'required',
            'possition' => 'required|string',
        ]);

        $marketings = Marketing::findOrFail($id);

        $marketings->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'possition' =>$request->possition,
        ]);
        return redirect()->route('marketing.index')->with('success','Marketing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marketing::where('marketing_id', $id)->delete();
        return redirect()->route('marketing.index');
    }
}
