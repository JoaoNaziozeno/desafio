@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">

    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-0">Últimas Notícias</h2>
            <p class="text-sm text-muted">
                Fique por dentro das principais atualizações
            </p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">

                    <h2 class="card-title">
                        <a href="{{ route('noticias.show', $noticiaPrincipal->id) }}">
                            {{ $noticiaPrincipal->title }}
                        </a>
                    </h2>

                    <p class="text-muted">
                        {{ $noticiaPrincipal->created_at->format('d/m/Y') }}
                    </p>

                    <hr>

                    <p>
                        {{ \Illuminate\Support\Str::limit($noticiaPrincipal->content, 400) }}
                    </p>

                    <a href="{{ route('noticias.show', $noticiaPrincipal->id) }}"
                       class="btn btn-info btn-sm btn-round">
                        Ler mais
                    </a>

                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        @foreach($outrasNoticias as $noticia)
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column">

                        <h5>
                            <a href="{{ route('noticias.show', $noticia->id) }}">
                                {{ $noticia->title }}
                            </a>
                        </h5>

                        <p class="text-muted text-sm">
                            {{ $noticia->created_at->format('d/m/Y') }}
                        </p>

                        <p class="flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($noticia->content, 120) }}
                        </p>

                        <a href="{{ route('noticias.show', $noticia->id) }}"
                           class="btn btn-sm btn-info btn-round mt-auto">
                            Ler mais
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection