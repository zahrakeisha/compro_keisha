<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;

class VisitorController extends Controller
{
    // 🔹 Function browser pendek
    private function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'Edg') !== false) {
            return 'Edge';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } else {
            return 'Other';
        }
    }
    // 🔹 Function URL pendek
    private function getUrlPath($url)
    {
        return parse_url($url, PHP_URL_PATH);
    }

    public function index(Request $request)
    {
        $visitor = Visitor::all();
        $totalvisitor = Visitor::count();

        $filter = $request->filter ?? 'all';

        if ($filter == 'week') {
            $visitor = Visitor::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
        } 
        elseif ($filter == 'month') {
            $visitor = Visitor::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();
        } 
        elseif ($filter == 'year') {
            $visitor = Visitor::whereYear('created_at', now()->year)->get();
        } 
        else {
            $visitor = Visitor::latest()->get();
        }
         $totalFiltered = $visitor->count();
        
        
         // 🔥 Tambahan: short data
        foreach ($visitor as $v) {
            $v->browser_short = $this->getBrowser($v->user_agent);
            $v->url_short = $this->getUrlPath($v->url);
        }


    return view('visitor.index', compact('visitor','filter', 'totalvisitor','totalFiltered'));
    }
}
