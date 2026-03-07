<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visions;

class VisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visions_missions = Visions::all();
        return view('visions.index', compact('visions_missions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visions.create');
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
            'type'=> 'required|string',
            'content' => 'required|string',
        ]);

        Visions::create([
            'type'=> $request->type,
            'content'=> $request->content,
        ]);

        return redirect()->route('visions.index');
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
        $visions_missions = Visions::find($id);
        return view('visions.edit', compact('visions_missions'));
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
            'type'=> 'required|string',
            'content' => 'required|string',
        ]);

        $visions_missions = Visions::findOrFail($id);

        $visions_missions->update([
            'type'=> $request->type,
            'content'=> $request->content,
        ]);

        return redirect()->route('visions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visions::where('vs_id', $id)->delete();
        return redirect()->route('visions.index');
    }
}
