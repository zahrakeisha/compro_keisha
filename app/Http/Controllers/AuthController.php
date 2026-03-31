<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Visitor;
use App\Clients;
use App\Blogs;
use App\Contacts;

class AuthController extends Controller
{
    public function showformlogin()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => ' Oppes! you have entered invalid credentials',
        ])->withInput();

        return back()->withErrors(['email' => 'Oppes! you have entered invalid credentials']);
    }

    public function dashboard()
    {
        $totalvisitor = Visitor::count();
        $totalclient = Clients::count();
        $totalblog = Blogs::count();
        $totalmessage = Contacts::count();
        $visitorChart = Visitor::selectRaw('DAY(created_at) as day, COUNT(*) as total')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('day')
            ->orderBy('day')
            ->get();
        $visitorYear = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();

        // ✅ Nama bulan (ENGLISH)
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        // ✅ Isi default 0
        $visitorTotals = array_fill(0, 12, 0);

        foreach ($visitorYear as $data) {
            $visitorTotals[$data->month - 1] = $data->total;
        }
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $visitorWeek = Visitor::selectRaw('DAYOFWEEK(created_at) as day, COUNT(*) as total')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        // Nama hari
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        // Default 0
        $visitorWeekTotals = array_fill(0, 7, 0);

        // Isi data
        foreach ($visitorWeek as $data) {
            $visitorWeekTotals[$data->day - 1] = $data->total;
        }
        $donutData = [
            $totalvisitor,
            $totalmessage,
            $totalblog,
            $totalclient
        ];

                
        return view('auth.dashboard', compact('totalvisitor', 'totalclient', 'totalblog', 'totalmessage','visitorChart','visitorYear', 'months', 'visitorTotals', 'visitorWeek', 'days', 'visitorWeekTotals','donutData' ));
    }
    public function profile()
    {
        return view('auth.profile');
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
