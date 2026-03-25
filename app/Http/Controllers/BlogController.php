<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; //helper


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blogs::all();
        return view('blogs.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('blogs.create', compact('users'));
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
            'title' => 'required|string|max:225|unique:blogs',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'content' => 'required|string',
        ]);
        $slug = Str::slug($request->title);
        if(Blogs::where('slug', $slug)->exists()) {
            $slug = $slug .'-'. time();
        }
        $thumbnail = null; 
        if ($request->hasFile('thumbnail')) { 
           $thumbnail = $request->file('thumbnail')->store('blogs', 'public');
        }

        Blogs::create([
            'title' => $request->title,
            'slug' => $slug,
            'thumbnail' => $thumbnail,
            'content' => $request->content,
            'user_id' => Auth::id(),  //supaya ada nama user yg isi blog
        ]);

        return redirect()->route('blog.index')->with('success','Blog added successfully');

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
        $dataeditblog = Blogs::find($id);
        return view('blogs.edit', compact('dataeditblog'));
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
            'title' => 'required|string|max:225',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'content' => 'required|string',
        ]);
        $dataupdate = Blogs::findOrFail($id);

         $slug=Str::slug($request->title);
        if(
            Blogs::where('slug',$slug)->where('blog_id', '!=', $id)->exists()){
            $slug = $slug . '-' . time();
        }
        $thumbnail = $dataupdate->thumbnail;
        if ($request->hasFile('thumbnail')){
           if ($dataupdate->thumbnail){
              \Storage::disk('public')->delete($dataupdate->thumbnail);
              }
        $thumbnail = $request->file('thumbnail')->store('blogs', 'public');
        }
        $dataupdate->update([
            'title' => $request->title,
            'slug' => $slug,
            'thumbnail' => $thumbnail,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('blog.index')->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blogs::where('blog_id', $id)->delete();
        return redirect()->route('blog.index');
    }
}
