<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\About;
use App\Visions;
use App\Blogs;
use App\Contactinfo;
use App\Marketing;
use App\Sliders;
use App\Clients;




class FrontController extends Controller
{
    public function index()
    {
        $clients = Clients::get();
        $sliders = Sliders::where('status', 1)->get();
        return view('frontend.home', compact('sliders', 'clients'));
    }

    public function about()
    {
        $abouts = About::where('status', 1)->first();
        return view('frontend.about', compact( 'abouts'));
    }

    public function visi()
    {
        $vision = Visions::where('type','vision')->where('status', 1)->first();
        $missions = Visions::where('type','mission')->where('status', 1)->get();
        return view('frontend.visi_misi', compact('vision', 'missions'));
    }

    public function blog()
    {
        $blogs = Blogs::latest()->get();
        return view('frontend.blog', compact('blogs'));
    }
    public function blogsDetail($id)
    {
        $blogs = Blogs::findOrFail($id);
        return view('frontend.blogs_detail', compact('blogs'));
    }

    public function contacts()
    {
        $marketings = Marketing::all();
        $contacts = Contactinfo::where('status',1)->first();
        return view('frontend.contact', compact('contacts', 'marketings'));
    }

    public function servicedetail($id)
    {
        $servicesdetail = Services::findOrFail($id);
        return view('frontend.service_detail', compact('servicesdetail'));
    }
    
}
