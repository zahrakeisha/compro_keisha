<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $visitor = Visitor::all();
        $totalvisitor = Visitor::count();

        $filter = $request->filter ?? 'all';

        if ($filter == 'week') {
            $visitor = Visitor::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
        } 
        elseif ($filter == 'month') {
            $visitor = Visitor::whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year)
                            ->get();
        } 
        elseif ($filter == 'year') {
            $visitor = Visitor::whereYear('created_at', now()->year)->get();
        } 
        else {
            $visitor = Visitor::latest()->get();
        }
         $totalFiltered = $visitor->count();


    return view('visitor.index', compact('visitor','filter', 'totalvisitor','totalFiltered'));
    }
}
