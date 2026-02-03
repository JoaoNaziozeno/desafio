<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Noticia;
use App\Models\Noticias;
use PhpParser\Node\Expr\New_;

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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Noticias::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id() //auth()->user()->id,
        ]);

        return redirect()
        ->route('noticias.index')
        ->with('success', 'Notícia criada com sucesso!');
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
    public function edit(Noticias $noticias)
    {
        $this->authorize('update', $noticias);

        return view('noticias.edit', compact('noticias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticias $noticias)
    {
        $this->authorize('update', $noticias);

        $request->validate([
            'title' => 'required|String|max255',
            'content' => 'required|string',
        ]);

        return redirect()
            ->route('noticias.index')
            ->with('success', 'Notícia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticias $noticias)
    {
        $this->authorize('delete', $noticias);

        $noticias->delete();

        return redirect()
            ->route('noticias.index')
            ->with('success', 'Notícia excluída com sucesso!');
    }
}