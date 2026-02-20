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

            @auth
                <a href="{{ route('noticias.edit', $noticia->id) }}" 
                   class="btn btn-primary">
                    Editar
                </a>
            @endauth
        </div>

    </div>

</div>
@endsection