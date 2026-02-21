@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-body">

            <h1 class="card-title mb-3">
                <a href="{{ route('noticias.show', $noticia->id) }}">
                {{ $noticia->title }}
                </a>
            </h1>

            <p class="text-muted">
                Publicado em {{ $noticia->created_at->format('d/m/Y H:i') }}
            </p>

            <hr>

            <div style="font-size: 18px; line-height: 1.8;">
                {!! nl2br(e($noticia->content)) !!}
            </div>

        </div>

        <div class="card-footer bg-white">
            <a href="{{ url('/') }}" class="btn btn-secondary">
                ← Voltar
            </a>

            @can('update', $noticia)
                <a href="{{ route('noticias.edit', $noticia->id) }}" 
                   class="btn btn-primary">
                    Editar
                </a>
            @endcan

            @can('delete', $noticia)
                <form action="{{ route('noticias.destroy', $noticia->id) }}" 
                      method="POST" 
                      class="d-inline"
                      onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </form>                
            @endcan
        </div>

    </div>

</div>
@endsection