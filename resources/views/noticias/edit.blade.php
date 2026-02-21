@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Editar sua notícia</h3>
                    <p class="text-sm text-muted mb-0">
                        Preencha os dados abaixo para atualizar a notícia
                    </p>
                </div>
                
                <div class="card-body">
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

                    <form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="title">Título da notícia</label>
                            <input 
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                placeholder="Digite o título"
                                value="{{ old('title', $noticia->title) }}"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="content">Conteúdo</label>
                            <textarea 
                                name="content"
                                id="content"
                                class="form-control"
                                placeholder="Escreva o conteúdo da notícia"
                                required
                            >{{ old('content', $noticia->content) }}</textarea>
                        </div>
                        
                        <!--
                        <div class="form-group">
                            <label for="status">Status da publicação</label>
                            <select name="status" id="status" class="form-control">
                                <option value="draft">Rascunho</option>
                                <option value="published">Publicado</option>
                            </select>
                        </div>
                        -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('noticias.index') }}" class="btn btn-secondary">
                                Voltar
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Salvar alterações da notícia
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@push('js')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("content");

    function autoResize() {
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    }

    textarea.addEventListener("input", autoResize);

    // Ajusta caso já venha com texto (ex: edição)
    autoResize.call(textarea);
});
</script>
@endpush

@endsection
