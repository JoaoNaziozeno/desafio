@extends('layouts.feed')

@section('content')

@if($noticias->count() > 0)

  @php $destaque = $noticias->first(); @endphp

    <div class="card">
        <div class="card-body p-5">
            <h2 class="card-title text-primary">
                {{ $destaque->titulo }}
            </h2>

            <p class="card-text text-muted">
                {{ \Illuminate\Support\Str::limit($destaque->conteudo, 250) }}
            </p>
        </div>
    </div>

    <div class="row">
        @foreach($noticias->skip(1) as $noticia)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $noticia->titulo }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($noticia->conteudo, 120) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="d-flex justify-content-center mt-4">
        {{ $noticias->links('pagination::bootstrap-5') }}
    </div>

@else
    <div class="alert alert-info text-center">
        Nenhuma notícia disponível no momento.
    </div>
@endif

@endsection