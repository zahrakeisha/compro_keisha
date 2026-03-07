<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\About;
use App\Visions;
use App\Blogs;
use App\Contactinfo;



class FrontController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('frontend.home', compact('services'));
    }

    public function about()
    {
        $services = Services::all();
        return view('frontend.about', compact('services'));
    }

    public function visi()
    {
        $visi = Visions::where('type','vision')->first();
        $missions = Visions::where('type','mission')->get();
        $services = Services::all();
        return view('frontend.visi_misi', compact('services', 'visi', 'missions'));
    }

    public function blog()
    {
        $blogs = Blogs::latest()->get();
        $services = Services::all();
        return view('frontend.blog', compact('services','blogs'));
    }
    public function blogsDetail($id)
    {
        $blogs = Blogs::findOrFail($id);
        $services = Services::all();
        return view('frontend.blogs_detail', compact('services','blogs'));
    }

    public function contacts()
    {
        $contacts = Contactinfo::all()->first();
        $services = Services::all();
        return view('frontend.contact', compact('services','contacts'));
    }
}
