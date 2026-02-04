@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">

    {{-- Cabeçalho --}}
    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-0">Minhas Notícias</h2>
            <p class="text-sm text-muted">
                Gerencie todas as notícias criadas por você
            </p>
        </div>

        <div class="col text-right">
            <a href="{{ route('noticias.create') }}" class="btn btn-info btn-round">
                <i class="tim-icons icon-simple-add"></i>
                Nova notícia
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('noticias.index') }}">
                <div class="row">
                    <div class="col-md-10">
                        <input 
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Pesquisar por título..."
                            value="{{ request('search') }}"
                        >
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-info btn-block">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabela --}}
    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Título</th>
                        <th>Criado em</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->title }}</td>

                            
                            <td>{{ $noticia->created_at->format('d/m/Y') }}</td>

                            <td class="text-right">
                                <a 
                                    href="{{ route('noticias.edit', $noticia->id) }}" 
                                    class="btn btn-sm btn-primary"
                                >
                                    Editar
                                </a>

                                <form 
                                    action="{{ route('noticias.destroy', $noticia->id) }}" 
                                    method="POST"
                                    style="display:inline"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Deseja excluir esta notícia?')"
                                    >
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-4">
                                Nenhuma notícia encontrada.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    {{-- Paginação --}}
    <div class="mt-3">
        {{ $noticias->links() }}
    </div>

</div>
@endsection
