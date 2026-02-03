<?php

namespace App\Http\Controllers;

use App\Models\Noticias;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $noticias = Noticias::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('noticias.index', compact('noticias'));
    }
}
