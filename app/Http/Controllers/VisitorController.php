<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $visitor = Visitor::all();
        $totalvisitor = Visitor::count();
        return view('visitor.index', compact('visitor', 'totalvisitor'));
    }
}
