<?php
// ...existing code...
<h1>Notícias</h1>
@foreach($noticias as $n)
    <article>{{ $n->title }}</article>
@endforeach

{{ $noticias->links() }}
// ...existing code...