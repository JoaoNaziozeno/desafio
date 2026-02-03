<h1>Editar notícia</h1>

<form action="{{ route('noticias.update', $news->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Título</label>
        <input 
            type="text" 
            name="title" 
            value="{{ old('title', $news->title) }}"
        >
    </div>

    <div>
        <label>Conteúdo</label>
        <textarea name="content">{{ old('content', $news->content) }}</textarea>
    </div>

    <button type="submit">Atualizar</button>
</form>
