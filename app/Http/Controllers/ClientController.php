<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\Services;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Clients::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Services::all();
        return view('clients.create', compact('services'));
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
            'name'=> 'required|string|max:255',
            'description'=>'nullable|string',
            'logo'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'service_id'=>'required', 
        ]);

        $logo = null;
        if($request->hasFile('logo')){
            $logo = $request->file('logo')->store('clients', 'public');
        }
        Clients::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'logo'=> $logo,
            'service_id'=>$request->service_id, 
        ]);
        return redirect()->route('client.index')->with('success','Client added successfully');
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
        $clients = Clients::find($id);
        $services = Services::all();
        return view('clients.edit', compact('clients','services'));
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
            'name'=> 'required|string|max:255',
            'description'=>'nullable|string',
            'logo'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'service_id'=>'required|exists:services,service_id',
        ]);

        $clients = Clients::findOrFail($id);

        //default pakai gambar lama
        $logo=$clients->logo;

        //kalau uplod baru,hapus lama lalu simpan baru
        if($request->hasFile('logo')){
            if($clients->logo){
                \Storage::disk('public')->delete($clients->logo);
            }
            $logo=$request->file('logo')->store('clients', 'public');
        }

        //update manual per field
        $clients->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'logo'=> $logo,
            'service_id'=>$request->service_id, 
        ]);

        return redirect()->route('client.index')->with('success','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clients::where('clients_id', $id)->delete();
        return redirect()->route('client.index');
    }
}
