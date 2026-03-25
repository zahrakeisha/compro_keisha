<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'title'=> 'required|string|max:225|unique:services',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'description' => 'required|string',
        ]);

        //slug ambil otomatis dari title yg di isi di form
        $slug = Str::slug($request->title);

        //cek slug biar unik
        if(Services::where('slug', $slug)->exists()) {
            $slug = $slug .'-'. time();
        }
        //buat image
        $image = 'no_images.png'; 
        if ($request->hasFile('image')) { 
           $image = $request->file('image')->store('services', 'public');
        }

        Services::create([
            'title' => $request->title,
            'slug' => $slug,
            'image' => $image,
            'description' => $request->description
        ]);

        return redirect()->route('service.index')->with('success','Service added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataeditservice = Services::find($id);
        return view('services.edit', compact('dataeditservice'));
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
            'title'=> 'required|string|max:225|unique:services,title,' . $id . ',service_id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'description' => 'required|string',
        ]);

        $dataeditservice=Services::findOrFail($id);

        //slug keedit otomatis
        $slug=Str::slug($request->title);
        if(
            Services::where('slug',$slug)->where('service_id', '!=', $id)->exists()){
            $slug = $slug . '-' . time();
        }

        $image = $dataeditservice->image;
        if ($request->hasFile('image')){
           if ($dataeditservice->image){
              \Storage::disk('public')->delete($dataeditservice->image);
              }
            $image = $request->file('image')->store('services', 'public');
        }
        $dataeditservice->update([
        'title' => $request->title,
        'slug' => $slug,
        'image' => $image,
        'description' => $request->description
       ]);

       return redirect()->route('service.index')->with('success','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Services::where('service_id', $id)->delete();
        return redirect()->route('service.index');
    }
}
