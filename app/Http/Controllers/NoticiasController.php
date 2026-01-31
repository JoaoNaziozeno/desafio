<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Noticia;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Noticias::where('user_id', Auth::id());

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'. $request->search . '%');
        }

        $noticias = $query->latest()->paginate(10);

        return view('noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticias $noticia)
    {
        return view('noticias.index', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
