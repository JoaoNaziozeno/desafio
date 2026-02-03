@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="card shadow">
                
                {{-- Cabeçalho --}}
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Criar nova notícia</h3>
                    <p class="text-sm text-muted mb-0">
                        Preencha os dados abaixo para publicar uma nova notícia
                    </p>
                </div>

                {{-- Corpo --}}
                <div class="card-body">

                    {{-- Mensagens de erro --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Ops!</strong> Verifique os campos abaixo:
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('noticias.store') }}" method="POST">
                        @csrf

                        {{-- Título --}}
                        <div class="form-group">
                            <label for="title">Título da notícia</label>
                            <input 
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                placeholder="Digite o título"
                                value="{{ old('title') }}"
                                required
                            >
                        </div>

                        {{-- Conteúdo --}}
                        <div class="form-group">
                            <label for="content">Conteúdo</label>
                            <textarea 
                                name="content"
                                id="content"
                                rows="6"
                                class="form-control"
                                placeholder="Escreva o conteúdo da notícia"
                                required
                            >{{ old('content') }}</textarea>
                        </div>

                        {{-- Status --}}
                        <div class="form-group">
                            <label for="status">Status da publicação</label>
                            <select name="status" id="status" class="form-control">
                                <option value="draft">Rascunho</option>
                                <option value="published">Publicado</option>
                            </select>
                        </div>

                        {{-- Rodapé --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('noticias.index') }}" class="btn btn-secondary">
                                Voltar
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Salvar notícia
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
