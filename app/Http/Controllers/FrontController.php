<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\About;
use App\Visions;
use App\Blogs;
use App\Contactinfo;
use App\Marketing;



class FrontController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('frontend.home', compact('services'));
    }

    public function about()
    {
        $abouts = About::where('status', 1)->first();
        $services = Services::all();
        return view('frontend.about', compact('services', 'abouts'));
    }

    public function visi()
    {
        $vision = Visions::where('type','vision')->where('status', 1)->first();
        $missions = Visions::where('type','mission')->where('status', 1)->get();
        $services = Services::all();
        return view('frontend.visi_misi', compact('services', 'vision', 'missions'));
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
        $marketings = Marketing::all();
        $contacts = Contactinfo::where('status',1)->first();
        $services = Services::all();
        return view('frontend.contact', compact('services','contacts', 'marketings'));
    }
}
