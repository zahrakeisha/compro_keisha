<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use PDF;

class ReportController extends Controller
{
    public function generatePDF(Request $request)
    {
        // 🔹 ambil filter dari form
        $filter = $request->filter ?? 'all';

        // 🔹 ambil data sesuai filter
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

        // 🔥 bikin data jadi rapi (short browser & URL)
        foreach ($visitor as $v) {
            $v->browser_short = $this->getBrowser($v->user_agent);
            $v->url_short = parse_url($v->url, PHP_URL_PATH);
        }

        // 🔹 total data
        $total = $visitor->count();

        // 🔹 load view PDF
        $pdf = PDF::loadView('report.print_visitor', compact('visitor','filter','total'));

        // 🔹 tampilkan PDF
        return $pdf->stream('laporan_visitor.pdf');
    }

    // 🔥 function buat pendekin browser
    private function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'Edg') !== false) return 'Edge';
        elseif (strpos($userAgent, 'Chrome') !== false) return 'Chrome';
        elseif (strpos($userAgent, 'Firefox') !== false) return 'Firefox';
        elseif (strpos($userAgent, 'Safari') !== false) return 'Safari';
        else return 'Other';
    }
}
