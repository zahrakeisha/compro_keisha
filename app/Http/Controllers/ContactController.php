<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $contact = Contacts::all();
        return view('contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
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
            'email' => 'required',
            'message' => 'required|string',
        ]);
        Contacts::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' =>$request->message,
        ]);
        return redirect()->route('contact.index');
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
        $dataeditcontact = Contacts::find($id);
        return view('contact.edit', compact('dataeditcontact'));
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
            'name' => 'required|string|max:255|unique:contacts,name,' .$id. ',contact_id',
            'email' => 'required',
            'message' => 'required|string',
        ]);
        $dataupdatecontact = Contacts::findOrfail($id);
        $dataupdatecontact->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' =>$request->message,
        ]);
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacts::where('contact_id', $id)->delete();
        return redirect()->route('contact.index');
    }
}
